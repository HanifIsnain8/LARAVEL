<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class AlternatifController extends Controller
{
    public function index(Request $request)
    {
        $alternatif = Alternatif::where('user_id', Auth::id())->get();
        return view('alternatif.index',compact('alternatif'));
    }

    public function create(){
        return view('alternatif.create');
    }

    public function edit($id){

        $alternatif = Alternatif::findOrFail($id);
        return view('alternatif.edit',compact('alternatif'));
    }

    public function store(Request $request){
        $request->validate([
            'user_id' => 'required',
            'nama' => 'required|string|max:255',
            'gender' => 'required|in:LAKI - LAKI,PEREMPUAN',
            'alamat' => 'required|string|max:100',
            'no_hp' => 'required|string|max:15',
            'email' => 'required|string|email|max:50',
            'semester' => 'required|string|max:2',
            'jurusan' => 'required|string|max:30',
            'asal_kampus' => 'required|string|max:50',
        ]);

        $alternatif = new Alternatif($request->all());

        if ($alternatif->save()) {
            return redirect()->route('alternatif.index')->with('success', 'Data berhasil ditambahkan.');
        } else {
            return redirect()->back()->withErrors('failed', 'Gagal menambahkan kriteria. Silakan coba lagi.');
        }
    }

    public function destroy($id)
    {
        $alternatif = Alternatif::find($id);
        if ($alternatif) {
            $alternatif->delete();
            return redirect()->route('alternatif.index')->with('success', 'Data berhasil dihapus.');
        } else {
            return redirect()->route('alternatif.index')->with('failed', 'Gagal.');
        }
    }

    public function update(Request $request, $id) {
        $request->validate([
            'user_id' => 'required',
            'nama' => 'required|string|max:255',
            'gender' => 'required|in:LAKI - LAKI,PEREMPUAN',
            'alamat' => 'required|string|max:100',
            'no_hp' => 'required|string|max:15',
            'email' => 'required|string|email|max:50',
            'semester' => 'required|string|max:2',
            'jurusan' => 'required|string|max:30',
            'asal_kampus' => 'required|string|max:50',
        ]);
    
        $alternatif = Alternatif::find($id);
    
        if ($alternatif->update($request->all())) {
            return redirect()->route('alternatif.index')->with('success', 'Data berhasil diperbarui.');
        } else {
            return redirect()->back()->withErrors('failed', 'Gagal.');
        }
    }
}
