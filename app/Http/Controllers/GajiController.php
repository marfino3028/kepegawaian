<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//tambahan
use DB;
use App\Gaji;
use App\Pegawai;
use Validator,File,Redirect,Response;

class GajiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       $ar_gaji = DB::table('gaji')
            ->join('pegawai', 'pegawai.id', '=', 'gaji.pegawai_id')
            ->join('kategori', 'kategori.id', '=', 'pegawai.kategori_id')
            ->join('jabatan', 'jabatan.id', '=', 'pegawai.jabatan_id')
            ->join('divisi', 'divisi.id', '=', 'pegawai.divisi_id')
            ->select('gaji.*','pegawai.nama')
            ->get();
             return view('gaji.index', compact('ar_gaji'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make(request()->all(),[
           
            'pegawai_id'=>'unique:pegawai_id',
            
            
         ],[
            
             'pegawai_id.unique'=>'Nama ini sudah ada',
             
             ])->validate();
        DB::table('gaji')->insert(
        [
            'pegawai_id' => $request->nama,
            'gapok' => $request->gapok,
            'tunjab' => $request->tunjab,
            'bpjs' => $request->bpjs,
            'bonus' => $request->bonus,
        ]
        );
        return redirect('/gaji');
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
        $ar_gaji = DB::table('gaji')
        ->select('gaji.*')
        ->where('gaji.id', '=', $id)
        ->get();
        
        return view('gaji.show', compact('ar_gaji') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //ambil data 1 naris untuk diedit
        $data = Gaji::where('id', $id)->get();
        return view('gaji/form_edit',compact('data'));
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
         //update data
         $validator = Validator::make(request()->all(),[
           
            'nama'=>'unique:pegawai',
            
            
         ],[
            
             'nama.unique'=>'Nama ini sudah ada',
             
             ])->validate();
         DB::table('gaji')->where('id',$id)->update(
            [
                
            'pegawai_id' => $request->nama,
            'gapok' => $request->gapok,
            'tunjab' => $request->tunjab,
            'bpjs' => $request->bpjs,
            'bonus' => $request->bonus,
            ]
        );
        //landing page ke detail gaji / show.blade.php
        return redirect ('/gaji'.'/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //menghapus data
        DB::table('gaji')->where('id',$id)->delete();
        return redirect('/gaji');
    }
}
