<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use App\Models\Karyawan;
use DateTime;
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

    public function index2()
    {
        // $cuti = Cuti::;
        $idKaryawan = Cuti::groupby('karyawan_id')
        ->selectRaw('count(karyawan_id) as total, karyawan_id')->get();
        $total = $idKaryawan->filter(function ($value, $key) {
            // dd($value);
            return $value->total > 2;
        });
        dd($idKaryawan, $total[1]->karyawan, $total[1]->karyawan->cuti);
        return view('cuti.index2', compact('total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $karyawan = Karyawan::all();
        // dd($karyawan);
        return view('cuti.create', compact('karyawan'));
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
            'akhir_cuti',
            'keterangan'
        ]);
        $total = Cuti::where('karyawan_id', $request->karyawan_id)->get()->sum('lama_cuti');

        $fdate = $request->tgl_cuti;
        $ldate = $request->akhir_cuti;
        $datetime1 = new DateTime($fdate);
        $datetime2 = new DateTime($ldate);
        $interval = $datetime1->diff($datetime2);
        $days = $interval->format('%a');//now do whatever you like with $days

        // dd($days);

        if ($total != 12){
            Cuti::create([
                'karyawan_id' => $request->karyawan_id,
                'tgl_cuti' => $request->tgl_cuti,
                'akhir_cuti' => $request->akhir_cuti,
                'lama_cuti' => $days,
                'keterangan' => $request->keterangan
            ]);
            $message = 'Cuti Berhasil Ditambahkan';
        }
        else{
            $message = 'Kuota Cuti Sudah Penuh!!';
        }
        
        return redirect()->route('cuti.index')
            ->with('success', $message);
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

    public function getKaryawan(Request $request)
    {
        $data = Karyawan::find($request->id);
        return $data;
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
            'akhir_cuti' => 'required', 
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
