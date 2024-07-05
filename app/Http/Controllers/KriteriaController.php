<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;
use App\Models\Subs_kriteria;

class KriteriaController extends Controller
{
    public function index()
    {
        $userId = auth()->id();
        $kriterias = Kriteria::where('user_id', $userId)
                         ->with('subsKriteria')
                         ->get();
        return view('kriteria.index', compact('kriterias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'kode' => 'required|string|max:5',
            'nama' => 'required|string|max:100',
            'bobot' => 'required|numeric|between:0,5',
            'tipe_kriteria' => 'required|in:benefit,cost',
        ]);

        $kriteria = new Kriteria($request->all());

        if ($kriteria->save()) {

            $subKriteria = [
                ['nama' => 'sangat buruk', 'nilai' => 1],
                ['nama' => 'buruk', 'nilai' => 2],
                ['nama' => 'cukup', 'nilai' => 3],
                ['nama' => 'baik', 'nilai' => 4],
                ['nama' => 'sangat baik', 'nilai' => 5],
            ];
    
            foreach ($subKriteria as $sub) {
                Subs_kriteria::create([
                    'user_id' => $request->user_id,
                    'kriteria_id' => $kriteria->id,
                    'nama' => $sub['nama'],
                    'nilai' => $sub['nilai'],
                ]);
            }
            return redirect()->route('kriteria.index')->with('success', 'Kriteria berhasil ditambahkan.');
        } else {
            return redirect()->back()->with('failed', 'Gagal menambahkan kriteria. Silakan coba lagi.')->withInput();
        }
    }

    public function destroy($id)
    {
        $kriteria = Kriteria::find($id);
        if ($kriteria) {
            Subs_kriteria::where('kriteria_id', $kriteria->id)->delete();
            $kriteria->delete();
            return redirect()->route('kriteria.index')->with('success', 'Kriteria berhasil dihapus.');
        } else {
            return redirect()->route('kriteria.index')->with('failed', 'Kriteria tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode' => 'required|string|max:5',
            'nama' => 'required|string|max:100',
            'bobot' => 'required|numeric',
            'tipe_kriteria' => 'required|in:benefit,cost',
        ]);

        $kriteria = Kriteria::find($id);
        if ($kriteria->update($request->all())) {
            return redirect()->route('kriteria.index')->with('success', 'Data berhasil diperbarui.');
        } else {
            return redirect()->back()->withErrors('failed', 'Gagal memperbarui kriteria. Silakan coba lagi.');
        }
    }

    public function updatesubs(Request $request, $id)
    {
        $kriteria = Kriteria::findOrFail($id);


        $subs_nama = $request->input('subs_nama');


        foreach ($kriteria->subsKriteria as $index => $subKriteria) {

            $subKriteria->nama = $subs_nama[$index];
            $subKriteria->save();
        }
        

        return redirect()->route('kriteria.index')->with('success', 'Sub-kriteria berhasil diperbarui.');
    }
}
