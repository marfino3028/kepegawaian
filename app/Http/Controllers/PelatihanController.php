<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//tambahan
//panggil model
use App\Pelatihan;
use App\Pegawai;
use App\Materi;
//panggil pustaka/library/vendor
use DB;
use Validator,File,Redirect,Response;
use PDF;
use App\Exports\PelatihanExport;
use Maatwebsite\Excel\Facades\Excel;

class PelatihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //$ar_pegawai = Pegawai::orderBy('id')->get(); 
         //$ar_pegawai = DB::table('pegawai')->get(); 
         //"SELECT * FROM pegawai
         $ar_pelatihan = DB::table('pelatihan')
            ->join('pegawai', 'pegawai.id', '=', 'pelatihan.pegawai_id')
            ->join('materi', 'materi.id', '=', 'pelatihan.materi_id')
            ->select('pelatihan.*', 'pegawai.nama','materi.nama AS tema')
            ->get();
        
        return view('pelatihan.index', compact('ar_pelatihan'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         //arahkan ke form input data baru
         return view('pelatihan.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {       
       $validator = Validator::make(request()->all(),[
           
            'nama'=>'required',
            'tema'=>'required',
            'tempat'=>'required',
            'tgl_mulai'=>'required',
            'tgl_akhir'=>'required',
            
            
         ],[
             'nama.required'=>'Nama wajib diisi',
             'tema.required'=>'Materi wajib diisi',
             'tempat.required'=> 'Tempat Pelaksaan wajib diisi',
             'tgl_mulai.required'=>' Tanggal Mulai wajib diisi',
             'tgl_akhir.required'=>' Tanggal Akhir wajib diisi',
             ])->validate();

        DB::table('pelatihan')->insert(
        [
           
            'pegawai_id' => $request->nama,
            'materi_id'=> $request->tema,
            'tempat'=> $request->tempat,
            'tgl_mulai'=> $request->tgl_mulai,
            'tgl_akhir'=> $request->tgl_akhir,
            'keterangan'=> $request->keterangan,
        ]
        );
        return redirect('/pelatihan');
    }
        //return redirect('/pegawai/'.$idx.'/show');


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $ar_pelatihan = DB::table('pelatihan')
            ->join('pegawai', 'pegawai.id', '=', 'pelatihan.pegawai_id')
            ->join('materi', 'materi.id', '=', 'pelatihan.materi_id')
            ->select('pelatihan.*','pegawai.nama AS nama','materi.nama AS tema')
             ->where('pelatihan.id','=',$id) 
            ->get();

            return view('pelatihan.show', compact('ar_pelatihan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //tampilkan form untuk menampilkan
        //data lama yg mau diedit sebanyak 1 baris data
        $data = DB::table('pelatihan')->where('id',$id)->get();
        return view('pelatihan/form_edit',compact('data'));
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
        //validasi data
        $validator = Validator::make(request()->all(),[
           
            'nama'=>'required',
            'tema'=>'required',
            'tempat'=>'required',
            'tgl_mulai'=>'required',
            'tgl_akhir'=>'required',
            
            
         ],[
             'nama.required'=>'Nama wajib diisi',
             'tema.required'=>'Materi wajib diisi',
             'tempat.required'=> 'Tempat Pelaksaan wajib diisi',
             'tgl_mulai.required'=>' Tanggal Mulai wajib diisi',
             'tgl_akhir.required'=>' Tanggal Akhir wajib diisi',
             ])->validate();
      
        DB::table('pelatihan')->where('id',$id)->update(
        [
           
            'pegawai_id' => $request->nama,
            'materi_id'=> $request->tema,
            'tempat'=> $request->tempat,
            'tgl_mulai'=> $request->tgl_mulai,
            'tgl_akhir'=> $request->tgl_akhir,
            'keterangan'=> $request->keterangan,
        ]
        );
        return redirect('/pelatihan'.'/'.$id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('pelatihan')->where('id',$id)->delete();
        return redirect('/pelatihan');
    }



    public function pelatihanPDF()
    {
        $ar_pelatihan = DB::table('pelatihan')
             ->join('pegawai', 'pegawai.id', '=', 'pelatihan.pegawai_id')
            ->join('materi', 'materi.id', '=', 'pelatihan.materi_id')
            ->select('pelatihan.*', 'pegawai.nama','materi.nama AS tema')
            ->get();
            
        $pdf = PDF::loadView('pelatihan.pelatihanPDF', ['ar_pelatihan'=>$ar_pelatihan])
               ->setPaper('f4','landscape');
        return $pdf->download('data_pelatihan.pdf');
    }

   
   
} 