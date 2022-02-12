<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use Illuminate\Http\Request;

class CutiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cuti = Cuti::all();
        return view('cuti.index', compact('cuti'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cuti.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id',
            'tgl_cuti',
            'lama_cuti',
            'keterangan'
        ]);

        Cuti::create([
            'karyawan_id' => $request->karyawan_id,
            'tgl_cuti' => $request->tgl_cuti,
            'lama_cuti' => $request->lama_cuti,
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('cuti.index')
            ->with('success', 'Cuti Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cuti  $cuti
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cuti = Cuti::where('id', $id)->first;
        return view('cuti.index', compact('cuti'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cuti  $cuti
     * @return \Illuminate\Http\Response
     */
    public function edit(Cuti $cuti)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cuti  $cuti
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'karyawan_id' => 'required',
            'tgl_cuti' => 'required', 
            'lama_cuti' => 'required', 
            'keterangan' => 'required', 
         ]);
               
         $cuti = Cuti::find($id)->update($request->all()); 
         return redirect()->route('cuti.index')
            ->with('success', 'Cuti Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cuti  $cuti
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cuti = Cuti::find($id);
        $cuti->delete();
    }
}
