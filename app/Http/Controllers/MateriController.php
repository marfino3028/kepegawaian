<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//tambahan
use DB;
use App\Materi;


class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ar_materi = DB::table('materi')->get();
       
        return view('materi.index', compact('ar_materi') );
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
        DB::table('materi')->insert(
        [
            'nama' => $request->nama,
        ]
        );
        return redirect('/materi');
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
        $ar_materi = DB::table('materi')
        ->select('materi.*')
        ->where('materi.id', '=', $id)
        ->get();
        
        return view('materi.show', compact('ar_materi') );
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
        $data = Materi::where('id', $id)->get();
        return view('materi/form_edit',compact('data'));
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
        DB::table('materi')->where('id',$request->id)->update(
        [
            'nama' => $request->nama,
        ]
        );
        return redirect('/materi');
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
        DB::table('materi')->where('id',$id)->delete();
        return redirect('/materi');
        
    }
   
}
