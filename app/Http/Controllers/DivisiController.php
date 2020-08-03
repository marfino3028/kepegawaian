<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//tambahan
use DB;
use App\Divisi;

class DivisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ar_divisi = DB::table('divisi')->get();
        //"SELECT * FROM kategori"
        return view('divisi.index', compact('ar_divisi') );
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
         DB::table('divisi')->insert(
        [
            'nama' => $request->nama,
        ]
        );
        return redirect('/divisi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       //e
        $ar_divisi = DB::table('divisi')
        ->select('divisi.*')
        ->where('divisi.id', '=', $id)
        ->get();
        
        return view('divisi.show', compact('ar_divisi') );
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
        $data = divisi::where('id', $id)->get();
        return view('divisi/form_edit',compact('data'));
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
        DB::table('divisi')->where('id',$request->id)->update(
        [
            'nama' => $request->nama,
        ]
        );
        return redirect('/divisi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        DB::table('divisi')->where('id',$id)->delete();
        return redirect('/divisi');
    }
}
