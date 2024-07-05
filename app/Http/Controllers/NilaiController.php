<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Nilai;
use App\Models\Subs_kriteria;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    
    public function index(){
        $userId = auth()->id();
        $nilais = Nilai::where('user_id', $userId)
                        ->with(['alternatif', 'kriteria'])
                        ->get();
    
        $alternatifs = $nilais->pluck('alternatif')->unique('id');
        $kriterias = Kriteria::all();
    
        return view('nilai.index', compact('nilais', 'alternatifs', 'kriterias'));
    }
    
    public function create(){
        $alternatifs = Alternatif::all();
        $kriterias = Kriteria::with('subsKriterias')->get();

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

    public function edit($id){
        $nilai = Nilai::with(['kriteria', 'subsKriteria'])->findOrFail($id);
        $alternatifs = Alternatif::all();
        $kriterias = Kriteria::with('subsKriteria')->get();
    

        return view('nilai.edit', compact('nilai', 'alternatifs', 'kriterias'));
    }

    public function update(Request $request, $alternatif_id){
        $request->validate([
            'nilai' => 'required|array',
            'nilai.*' => 'required|integer',
        ]);

        $userId = auth()->id();
        
        foreach ($request->nilai as $kriteria_id => $nilai) {
            $nilaiModel = Nilai::where('user_id', $userId)
                               ->where('alternatif_id', $alternatif_id)
                               ->where('kriteria_id', $kriteria_id)
                               ->first();
            if ($nilaiModel) {
                $nilaiModel->update(['nilai' => $nilai]);
            } else {
                Nilai::create([
                    'user_id' => $userId,
                    'alternatif_id' => $alternatif_id,
                    'kriteria_id' => $kriteria_id,
                    'nilai' => $nilai,
                ]);
            }
        }

        return redirect()->route('nilai.index')->with('success', 'Nilai berhasil diperbarui.');
    }

    public function destroy($id){
        $nilai = Nilai::find($id);
        if ($nilai) {
            $nilai->delete();
            return redirect()->route('nilai.index')->with('success', 'Nilai berhasil dihapus.');
        } else {
            return redirect()->route('nilai.index')->with('failed', 'Nilai tidak ditemukan.');
        }
    }

    public function hasil(){
        $userId = auth()->id();
        $nilais = Nilai::where('user_id', $userId)
                        ->with(['alternatif', 'kriteria'])
                        ->get();
    
        $alternatifs = $nilais->pluck('alternatif')->unique('id');
        $kriterias = Kriteria::all();
    
        $matrix = $nilais->groupBy('alternatif_id');
        $normalizedMatrix = [];
        $weightedNormalizedMatrix = [];
        $squaredSum = [];
        
        foreach ($kriterias as $kriteria) {
            $squaredSum[$kriteria->id] = $nilais->where('kriteria_id', $kriteria->id)->sum(function ($nilai) {
                return pow($nilai->nilai, 2);
            });
        }
    
        // Normalisasi matriks
        foreach ($matrix as $alternatifId => $nilaisGroup) {
            foreach ($nilaisGroup as $nilai) {
                if (isset($squaredSum[$nilai->kriteria_id]) && $squaredSum[$nilai->kriteria_id] != 0) {
                    $normalizedMatrix[$alternatifId][$nilai->kriteria_id] = $nilai->nilai / sqrt($squaredSum[$nilai->kriteria->id]);
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
    
            if ($kriteria->tipe_kriteria == 'benefit') {
                $idealPositive[$kriteria->id] = max($values);
                $idealNegative[$kriteria->id] = min($values);
            } else {
                $idealPositive[$kriteria->id] = min($values);
                $idealNegative[$kriteria->id] = max($values);
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
            $preferences[$alternatifId] = $distancesToNegative[$alternatifId] / ($distancesToPositive[$alternatifId] + $distancesToNegative[$alternatifId]);
        }
    
        return view('hasil.index', compact('nilais', 'alternatifs', 'kriterias', 'normalizedMatrix', 'weightedNormalizedMatrix', 'idealPositive', 'idealNegative', 'distancesToPositive', 'distancesToNegative', 'preferences'));
    }
}
