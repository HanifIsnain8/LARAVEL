<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Nilai;
use App\Models\Subs_kriteria;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index()
    {
        $userId = auth()->id();
        $nilais = Nilai::where('user_id', $userId)
                        ->with(['alternatif', 'kriteria'])
                        ->get();
    
        $alternatifs = $nilais->pluck('alternatif')->unique('id');
        $kriterias = Kriteria::all();
    
        $matrix = $nilais->groupBy('alternatif_id');
        $normalizedMatrix = [];
        $squaredSum = [];
    
        foreach ($kriterias as $kriteria) {
            $squaredSum[$kriteria->id] = $nilais->where('kriteria_id', $kriteria->id)->sum(function ($nilai) {
                return pow($nilai->nilai, 2);
            });
        }
    
        foreach ($matrix as $alternatifId => $nilaisGroup) {
            foreach ($nilaisGroup as $nilai) {
                $normalizedMatrix[$alternatifId][$nilai->kriteria_id] = $nilai->nilai / sqrt($squaredSum[$nilai->kriteria_id]);
            }
        }
    
        return view('nilai.index', compact('nilais', 'alternatifs', 'kriterias', 'normalizedMatrix'));
    }
    public function create()
    {
        $alternatifs = Alternatif::all();
        $kriterias = Kriteria::with('subsKriterias')->get();

        return view('nilai.create', compact('alternatifs', 'kriterias'));
    }

    public function store(Request $request)
    {
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

    public function edit($id)
    {
        $nilai = Nilai::findOrFail($id);
        $alternatifs = Alternatif::all();
        $kriterias = Kriteria::with('subsKriterias')->get();

        return view('nilai.edit', compact('nilai', 'alternatifs', 'kriterias'));
    }

    public function update(Request $request, $alternatif_id)
    {
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

    public function destroy($id)
    {
        $nilai = Nilai::find($id);
        if ($nilai) {
            $nilai->delete();
            return redirect()->route('nilai.index')->with('success', 'Nilai berhasil dihapus.');
        } else {
            return redirect()->route('nilai.index')->with('failed', 'Nilai tidak ditemukan.');
        }
    }

    

    // public function create()
    // {
    //     $alternatifs = Alternatif::all();
    //     $kriterias = Kriteria::all();
    //     $subs_kriterias = Subs_kriteria::all();

    //     return view('nilai.create', compact('alternatifs', 'kriterias', 'subs_kriterias'));
    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'alternatif_id' => 'required|exists:alternatifs,id',
    //         'kriteria_id' => 'required|exists:kriterias,id',
    //         'subs_kriteria_id' => 'required|exists:subs_kriterias,id',
    //         'nilai' => 'required|integer|min:1|max:5',
    //     ]);

    //     $nilai = new Nilai([
    //         'user_id' => auth()->id(),
    //         'alternatif_id' => $request->alternatif_id,
    //         'kriteria_id' => $request->kriteria_id,
    //         'subs_kriteria_id' => $request->subs_kriteria_id,
    //         'nilai' => $request->nilai,
    //     ]);

    //     if ($nilai->save()) {
    //         return redirect()->route('nilai.create')->with('success', 'Nilai berhasil ditambahkan.');
    //     } else {
    //         return redirect()->back()->with('failed', 'Gagal menambahkan nilai. Silakan coba lagi.')->withInput();
    //     }
    // }
}
