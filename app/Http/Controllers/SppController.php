<?php

namespace App\Http\Controllers;

use App\Models\SPP;
use Illuminate\Http\Request;

class SppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spp = SPP::latest()->get();
        return view('spp.spp', compact('spp'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $spp = SPP::orderBy('id_spp', 'DESC')->first();
        return view('spp.tambah_spp', compact('spp'));
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
            'required' => 'Belum diisi',
            'unique' => 'Tidak boleh sama!'
        ];

        $request->validate([
            'tahun' => 'required',
            'nominal' => 'required'
        ], $message);

        $nominal = preg_replace("/[^0-9]/", "", $request->nominal);

        SPP::create([
            'id_spp' => $request->id_spp,
            'tahun' => $request->tahun,
            'nominal' => $nominal
        ]);
        return redirect('/spp')->with('pesan', 'SPP berhasil ditambahkan');
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
        $spp = SPP::findorfail($id);
        return view('spp.edit_spp', compact('spp'));

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
            'required' => 'Belum diisi',
            'unique' => 'Tidak boleh sama!'
        ];

        $request->validate([
            'tahun' => 'required',
            'nominal' => 'required'
        ], $message);

        $user = SPP::find($id);

        $nominal = preg_replace("/[^0-9]/", "", $request->nominal);

        $user->update([
            'tahun' => $request->tahun,
            'nominal' => $nominal
        ]);
        return redirect('/spp')->with('pesan', 'SPP berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $spp = SPP::find($id);
        $spp->delete($id);
        return redirect('/spp')->with([
        'pesan'=> 'Data SPP ' . $spp->id_spp .  ' berhasil dihapus',
        ]);

    }
}
