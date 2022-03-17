<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $petugas = Petugas::where('id', '!=', Auth::user()->id)->latest()->get();
        return view('petugas.petugas', compact('petugas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $petugas = Petugas::orderBy('id_petugas', 'DESC')->first();
        return view('petugas.tambah_petugas', compact('petugas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = [
            'required' => 'Tidak boleh kosong',
            'min' => 'Terlalu pendek',
            'max' => 'Terlalu panjang',
            'unique' => 'Tidak boleh sama'
        ];
        $request->validate([
            'id_petugas' => 'required|unique:petugas',
            'username' => 'required|min:4|max:10|unique:petugas',
            'nama_petugas' => 'required',
            'level' => 'required',
            'password' => 'required|min:4|max:12'
        ], $message);

        Petugas::create([
            'id_petugas' => $request->id_petugas,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'nama_petugas' => $request->nama_petugas,
            'level' => $request->level,
        ]);

        return redirect('/petugas')->with('pesan', 'Petugas berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $petugas = Petugas::findorfail($id);
        return view('petugas.edit_petugas', compact('petugas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $message = [
            'required' => 'Tidak boleh kosong',
            'min' => 'Terlalu pendek',
            'max' => 'Terlalu panjang',
            'unique' => 'Tidak boleh sama'
        ];
        $request->validate([
            'id_petugas' => 'required|unique:petugas,id_petugas,' . $id,
            'username' => 'required|min:4|max:10|unique:petugas,username,' . $id,
            'nama_petugas' => 'required',
            'level' => 'required'
        ], $message);

        $user = Petugas::find($id);

        $user->update([
            'id_petugas' => $request->id_petugas,
            'username' => $request->username,
            'password' => $user->password,
            'nama_petugas' => $request->nama_petugas,
            'level' => $request->level,
        ]);

        return redirect('/petugas')->with('pesan', 'Petugas berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Petugas::find($id);
        $user ->delete($id);
        return redirect('/petugas')->with([
            'pesan' => 'Petugas ' . $user->nama_petugas. ' berhasil dihapus',
        ]);
    }
}
