<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//tambahan
use DB;
use App\Kategori;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ar_kategori = DB::table('kategori')->get();
        //"SELECT * FROM kategori"
        return view('kategori.index', compact('ar_kategori') );
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
        DB::table('kategori')->insert(
        [
            'nama' => $request->nama,
        ]
        );
        return redirect('/kategori');
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
        $ar_kategori = DB::table('kategori')
        ->select('kategori.*')
        ->where('kategori.id', '=', $id)
        ->get();
        
        return view('kategori.show', compact('ar_kategori') );
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
        $data = Kategori::where('id', $id)->get();
        return view('kategori/form_edit',compact('data'));
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
        DB::table('kategori')->where('id',$request->id)->update(
        [
            'nama' => $request->nama,
        ]
        );
        return redirect('/kategori');
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
        DB::table('kategori')->where('id',$id)->delete();
        return redirect('/kategori');
    }
      public function apiKategori()
    {
        return Kategori::all();
    }
}
