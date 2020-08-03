<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//tambahan
use DB;
use App\Jabatan;
use PDF;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ar_jabatan = DB::table('jabatan')->get();
        //"SELECT * FROM kategori"
        return view('jabatan.index', compact('ar_jabatan') );
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
        DB::table('jabatan')->insert(
        [
            'nama' => $request->nama,
        ]
        );
        return redirect('/jabatan');
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
        $ar_jabatan = DB::table('jabatan')
        ->select('jabatan.*')
        ->where('jabatan.id', '=', $id)
        ->get();
        
        return view('jabatan.show', compact('ar_jabatan') );
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
        $data = Jabatan::where('id', $id)->get();
        return view('jabatan/form_edit',compact('data'));
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
        DB::table('jabatan')->where('id',$request->id)->update(
        [
            'nama' => $request->nama,
        ]
        );
        return redirect('/jabatan');
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
        DB::table('jabatan')->where('id',$id)->delete();
        return redirect('/jabatan');
        
    }
    public function jabatanPDF()
    {
        $ar_jabatan = DB::table('jabatan')->get();
        //"SELECT * FROM kategori"
        $pdf = PDF::loadView('jabatan.jabatanPDF', ['ar_jabatan'=>$ar_jabatan]);
        return $pdf->download('jabatan.pdf');
    }
}
