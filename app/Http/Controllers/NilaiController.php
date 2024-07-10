<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Nilai;
use App\Models\Subs_kriteria;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    
    public function index() {
        $userId = auth()->id();
    
        $nilais = Nilai::where('user_id', $userId)
                        ->with(['alternatif', 'kriteria'])
                        ->get();
        
        $alternatifs = $nilais->pluck('alternatif')->unique('id');
        
        $kriterias = Kriteria::where('user_id', $userId)->get();
        
        return view('nilai.index', compact('nilais', 'alternatifs', 'kriterias'));
    }
    
    public function create(){
        $userId = auth()->id();
        $alternatifs = Alternatif::where('user_id', $userId)
                             ->whereDoesntHave('nilai')
                             ->get();
        $kriterias = Kriteria::where('user_id', $userId)->with('subsKriteria')->get();

        return view('nilai.create', compact('alternatifs', 'kriterias'));
    }

    public function store(Request $request){
        $request->validate([
            'alternatif_id' => 'required|exists:alternatifs,id',
            'subs_kriterias' => 'required|array',
            'subs_kriterias.*' => 'required|exists:subs_kriterias,id',
        ]);
    
        foreach ($request->subs_kriterias as $kriteria_id => $subs_kriteria_id) {
            Nilai::create([
                'user_id' => auth()->id(),
                'alternatif_id' => $request->alternatif_id,
                'kriteria_id' => $kriteria_id,
                'subs_kriteria_id' => $subs_kriteria_id,
                'nilai' => Subs_kriteria::find($subs_kriteria_id)->nilai,
            ]);
        }    

        return redirect()->route('nilai.index')->with('success', 'Nilai berhasil ditambahkan.');
    }

    public function destroy($id){
        $nilai = Nilai::where('alternatif_id', $id)->get();
    
        foreach ($nilai as $nilaiItem) {
            $nilaiItem->delete();
        }
    
        return redirect()->route('nilai.index')->with('success', 'Nilai berhasil dihapus');
    }

    public function edit($id){
        $userId = auth()->id();
        $nilai = Nilai::where('alternatif_id', $id)->get();
        $alternatif = Alternatif::all();
        $kriteria = Kriteria::where('user_id', $userId)->with('subsKriteria')->get();
        
    
        return view('nilai.edit', compact('nilai', 'alternatif', 'kriteria'));
    }
    

    public function update(Request $request, $id){
        $request->validate([
            'alternatif_id' => 'required',
            'penilaian.*.kriteria_id' => 'required',
            'penilaian.*.subs_kriteria_id' => 'required',
        ]);
    
        Nilai::where('alternatif_id', $id)->delete();
    
        foreach ($request->penilaian as $penilaian) {
            Nilai::create([
                'user_id' => auth()->id(),
                'alternatif_id' => $request->alternatif_id,
                'kriteria_id' => $penilaian['kriteria_id'],
                'subs_kriteria_id' => $penilaian['subs_kriteria_id'],
                'nilai' => Subs_Kriteria::find($penilaian['subs_kriteria_id'])->nilai,
            ]);
        }
    
        return redirect()->route('nilai.index')->with('success', 'Nilai berhasil diperbarui.');
    }

    public function hasil() {
        $userId = auth()->id();
        
        // Ambil semua nilai berdasarkan user_id
        $nilais = Nilai::where('user_id', $userId)
                       ->with(['alternatif', 'kriteria'])
                       ->get();
        
        // Ambil semua alternatif yang dimiliki user_id
        $alternatifs = $nilais->pluck('alternatif')->unique('id');
        
        // Ambil semua kriteria
        $kriterias = Kriteria::where('user_id', $userId)->get();
        
        // Inisialisasi matriks dan array lainnya
        $matrix = $nilais->groupBy('alternatif_id');
        $normalizedMatrix = [];
        $weightedNormalizedMatrix = [];
        $squaredSum = [];
        $divider = [];
        
        // Menghitung squared sum untuk normalisasi
        foreach ($kriterias as $kriteria) {
            $squaredSum[$kriteria->id] = $nilais->where('kriteria_id', $kriteria->id)->sum(function ($nilai) {
                return pow($nilai->nilai, 2);
            });
            $divider[$kriteria->id] = sqrt($squaredSum[$kriteria->id]);
        }
        
        // Normalisasi matriks
        foreach ($matrix as $alternatifId => $nilaisGroup) {
            foreach ($nilaisGroup as $nilai) {
                if (isset($squaredSum[$nilai->kriteria_id]) && $squaredSum[$nilai->kriteria_id] != 0) {
                    $normalizedMatrix[$alternatifId][$nilai->kriteria_id] = $nilai->nilai / $divider[$nilai->kriteria_id];
                } else {
                    $normalizedMatrix[$alternatifId][$nilai->kriteria_id] = 0;
                }
            }
        }
        
        // Dapatkan bobot dari setiap kriteria
        $weights = [];
        foreach ($kriterias as $kriteria) {
            $weights[$kriteria->id] = $kriteria->bobot;
        }
        
        // Normalisasi terbobot
        foreach ($normalizedMatrix as $alternatifId => $kriteriaGroup) {
            foreach ($kriteriaGroup as $kriteriaId => $normalizedValue) {
                $weightedNormalizedMatrix[$alternatifId][$kriteriaId] = $normalizedValue * $weights[$kriteriaId];
            }
        }
        
        // Menentukan solusi ideal positif dan negatif
        $idealPositive = [];
        $idealNegative = [];
        
        foreach ($kriterias as $kriteria) {
            $values = array_column($weightedNormalizedMatrix, $kriteria->id);
            
            if (!empty($values)) {
                if ($kriteria->tipe_kriteria == 'benefit') {
                    $idealPositive[$kriteria->id] = max($values);
                    $idealNegative[$kriteria->id] = min($values);
                } else {
                    $idealPositive[$kriteria->id] = min($values);
                    $idealNegative[$kriteria->id] = max($values);
                }
            } else {
                // Handle jika $values kosong
                $idealPositive[$kriteria->id] = 0; // Atau nilai default lainnya
                $idealNegative[$kriteria->id] = 0; // Atau nilai default lainnya
            }
        }
        
        // Menghitung jarak ke solusi ideal positif dan negatif
        $distancesToPositive = [];
        $distancesToNegative = [];
        
        foreach ($weightedNormalizedMatrix as $alternatifId => $kriteriaGroup) {
            $distancesToPositive[$alternatifId] = 0;
            $distancesToNegative[$alternatifId] = 0;
            
            foreach ($kriteriaGroup as $kriteriaId => $weightedValue) {
                $distancesToPositive[$alternatifId] += pow($weightedValue - $idealPositive[$kriteriaId], 2);
                $distancesToNegative[$alternatifId] += pow($weightedValue - $idealNegative[$kriteriaId], 2);
            }
            
            $distancesToPositive[$alternatifId] = sqrt($distancesToPositive[$alternatifId]);
            $distancesToNegative[$alternatifId] = sqrt($distancesToNegative[$alternatifId]);
        }
        
        // Menghitung nilai preferensi (V)
        $preferences = [];
        foreach ($alternatifs as $alternatif) {
            $alternatifId = $alternatif->id;
            if (($distancesToPositive[$alternatifId] + $distancesToNegative[$alternatifId]) != 0) {
                $preferences[$alternatifId] = $distancesToNegative[$alternatifId] / ($distancesToPositive[$alternatifId] + $distancesToNegative[$alternatifId]);
            } else {
                $preferences[$alternatifId] = 0;
            }
        }
        
        return view('hasil.index', compact('nilais', 'alternatifs', 'kriterias', 'divider', 'normalizedMatrix', 'weightedNormalizedMatrix', 'idealPositive', 'idealNegative', 'distancesToPositive', 'distancesToNegative', 'preferences'));
    }
    
    
}
