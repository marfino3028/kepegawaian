<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//tambahan
//panggil model
use App\Pegawai;
use App\Kategori;
use App\Divisi;
use App\Jabatan;
//panggil pustaka/library/vendor
use DB;
use Validator,File,Redirect,Response;
use PDF;
use App\Exports\PegawaiExport;
use Maatwebsite\Excel\Facades\Excel;

class PegawaiController extends Controller
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
         $ar_pegawai = DB::table('pegawai')
            ->join('kategori', 'kategori.id', '=', 'pegawai.kategori_id')
            ->join('jabatan', 'jabatan.id', '=', 'pegawai.jabatan_id')
            ->join('divisi', 'divisi.id', '=', 'pegawai.divisi_id')
            ->select('pegawai.*', 'kategori.nama AS jenis', 
                     'jabatan.nama AS posisi','divisi.nama AS bagian')
            ->get();
         /*
         SELECT pegawai.*, kategori.nama AS jenis, jabatan.nama AS posisi, 
         divisi.nama AS bagian
         FROM pegawai
         INNER JOIN kategori ON kategori.id = pegawai.kategori_id
         INNER JOIN jabatan ON jabatan.id = pegawai.jabatan_id
         INNER JOIN divisi ON divisi.id = pegawai.divisi_id
         */
         return view('pegawai.index', compact('ar_pegawai'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         //arahkan ke form input data baru
         return view('pegawai.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {       
        //validasi data
        $validator = Validator::make(request()->all(),[
            'nip'=>'required|unique:pegawai|max:10',
            'nama'=>'required|max:45',
            'jk'=>'required',
            'tempat'=>'required',
            'tanggal'=>'required',
            'kategori'=>'required',
            'jabatan'=>'required',
            'divisi'=>'required',
            'alamat'=>'required',
            'hp'=>'required',
            'email'=>'nullable|email',
            'foto' => 'image|mimes:jpg,jpeg,png,gif|max:2048',
         ],[
             'nip.required'=>'NIP Wajib untuk diisi',
             'nip.unique'=>' NIP ini sudah ada',
             'nip.max'=>' NIP ini melebihi 10 karakter',
             'nama.required'=>'Nama Wajib untuk diisi',
             'nama.max'=>' Nama ini melebihi 45 karakter',
             'jk.required'=>'Jenis Kelamin Wajib untuk dipilih',
             'tempat.required'=>'Tempat Lahir Wajib untuk diisi',
             'tanggal.required'=>'Tanggal Lahir Wajib untuk diisi',
             'kategori.required'=>'Kategori Wajib untuk dipilih',
             'jabatan.required'=>'Jabatan Wajib untuk dipilih',
             'divisi.required'=>'Divisi Wajib untuk dipilih',
             'alamat.required'=>'Alamat Wajib untuk diisi',
             'hp.required'=>'HP Wajib untuk diisi',
             'email.email'=>'email harus berformat email',
             'foto.image'=>'Ektensi File Foto Hanya Boleh .jpg, .png, .gif',
             'foto.max' =>'File Foto Melebihi 2048 KB',
         ])->validate();
        
        //2. proses upload,dicek pas input ada upload file/tidak
        if(!empty($request->foto)){
            /*
            $request->validate([
                'foto' => 'image|mimes:jpg,jpeg,png,giff|max:2048',
            ]);
            */
            //$fileName = $request->nip.'.'.$request->foto->extension();
            $fileName = $request->nip.'.jpg';   
            $request->foto->move(public_path('img'), $fileName);
        }else{
            $fileName = '';
        } 

        
        //1. tangkap request form
        DB::table('pegawai')->insert(
            [
                'nip'=>$request->nip,
                'nama'=>$request->nama,
                'gender'=>$request->jk,
                'tempat_lahir'=>$request->tempat,
                'tanggal_lahir'=>$request->tanggal,
                'kategori_id'=>$request->kategori,
                'jabatan_id'=>$request->jabatan,
                'divisi_id'=>$request->divisi,
                'alamat'=>$request->alamat,
                'hp'=>$request->hp,
                'email'=>$request->email,
                'foto'=>$fileName,
            ]
        );


        //landing page
        return redirect ('/pegawai');
        //return redirect('/pegawai/'.$idx.'/show');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ar_pegawai = DB::table('pegawai')
            ->join('kategori', 'kategori.id', '=', 'pegawai.kategori_id')
            ->join('jabatan', 'jabatan.id', '=', 'pegawai.jabatan_id')
            ->join('divisi', 'divisi.id', '=', 'pegawai.divisi_id')
            ->select('pegawai.*', 'kategori.nama AS jenis', 
                     'jabatan.nama AS posisi','divisi.nama AS bagian')
            ->where('pegawai.id','=',$id)          
            ->get();

            return view('pegawai.show', compact('ar_pegawai'));
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
        $data = DB::table('pegawai')->where('id',$id)->get();
        return view('pegawai/form_edit',compact('data'));
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
        //3.validasi data
        //validasi data
        $validator = Validator::make(request()->all(),[
            'nip'=>'required|max:10',
            'nama'=>'required|max:45',
            'jk'=>'required',
            'tempat'=>'required',
            'tanggal'=>'required',
            'kategori'=>'required',
            'jabatan'=>'required',
            'divisi'=>'required',
            'alamat'=>'required',
            'hp'=>'required',
            'email'=>'nullable|email',
            'foto' => 'image|mimes:jpg,jpeg,png,gif|max:2048',
         ],[
             'nip.required'=>'NIP Wajib untuk diisi',
             'nip.unique'=>' NIP ini sudah ada',
             'nip.max'=>' NIP ini melebihi 10 karakter',
             'nama.required'=>'Nama Wajib untuk diisi',
             'nama.max'=>' Nama ini melebihi 45 karakter',
             'jk.required'=>'Jenis Kelamin Wajib untuk dipilih',
             'tempat.required'=>'Tempat Lahir Wajib untuk diisi',
             'tanggal.required'=>'Tanggal Lahir Wajib untuk diisi',
             'kategori.required'=>'Kategori Wajib untuk dipilih',
             'jabatan.required'=>'Jabatan Wajib untuk dipilih',
             'divisi.required'=>'Divisi Wajib untuk dipilih',
             'alamat.required'=>'Alamat Wajib untuk diisi',
             'hp.required'=>'HP Wajib untuk diisi',
             'email.email'=>'email harus berformat email',
             'foto.image'=>'Ektensi File Foto Hanya Boleh .jpg, .png, .gif',
             'foto.max' =>'File Foto Melebihi 2048 KB',
         ])->validate();

        //2.proses upload,dicek pas input ada upload file/tidak
        if(!empty($request->foto)){
            //proses ganti foto lama dgn baru
            //$fileName = $request->nip.'.'.$request->foto->extension();
            $fileName = $request->nip.'.jpg';  
            $request->foto->move(public_path('img'), $fileName);
        }else{
            $fileName ='';
        }
        
        //1.proses ubah data
        DB::table('pegawai')->where('id',$id)->update(
            [
                'nip'=>$request->nip,
                'nama'=>$request->nama,
                'gender'=>$request->jk,
                'tempat_lahir'=>$request->tempat,
                'tanggal_lahir'=>$request->tanggal,
                'kategori_id'=>$request->kategori,
                'jabatan_id'=>$request->jabatan,
                'divisi_id'=>$request->divisi,
                'alamat'=>$request->alamat,
                'hp'=>$request->hp,
                'email'=>$request->email,
                //'foto'=>$request->foto,
                'foto'=>$fileName,
            ]
        );
        //landing page ke detail pegawai / show.blade.php
        return redirect ('/pegawai'.'/'.$id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //ambil isi kolom foto lalu hapus file fotonya 
        //di folder img
        $foto = DB::table('pegawai')->select('foto')
                ->where('id','=',$id)->get();
        foreach($foto as $f){
            $namaFile = $f->foto;
        }
        File::delete(public_path('img/'.$namaFile));
        //hapus data
        DB::table('pegawai')->where('id',$id)->delete();
        //landing page ke hal pegawai / index.blade.php
        return redirect ('/pegawai');
    }

    public function generatePDF()
    {
        $data = ['title' => 'Welcome to cetak PDF'];
        $pdf = PDF::loadView('pegawai.myPDF', $data);
        return $pdf->download('filePDF.pdf');
    }

    public function pegawaiPDF()
    {
        $ar_pegawai = DB::table('pegawai')
            ->join('kategori', 'kategori.id', '=', 'pegawai.kategori_id')
            ->join('jabatan', 'jabatan.id', '=', 'pegawai.jabatan_id')
            ->join('divisi', 'divisi.id', '=', 'pegawai.divisi_id')
            ->select('pegawai.*', 'kategori.nama AS jenis', 
                     'jabatan.nama AS posisi','divisi.nama AS bagian')
            ->get();
        $pdf = PDF::loadView('pegawai.pegawaiPDF', ['ar_pegawai'=>$ar_pegawai])
               ->setPaper('f4','potrait');
        return $pdf->download('data_pegawai.pdf');
    }

    public function export() 
    {
        return Excel::download(new PegawaiExport, 'data_pegawai.xlsx');
    }

    public function apiPegawai(){
        return DB::table('pegawai')
        ->join('kategori', 'kategori.id', '=', 'pegawai.kategori_id')
        ->join('jabatan', 'jabatan.id', '=', 'pegawai.jabatan_id')
        ->join('divisi', 'divisi.id', '=', 'pegawai.divisi_id')
        ->select('pegawai.*', 'kategori.nama AS jenis', 
                 'jabatan.nama AS posisi','divisi.nama AS bagian')
        ->get();
    }

    public function callApiPegawai()
    {
        //panggil server
        $url = "http://dummy.restapiexample.com/api/v1/employees";
        //panggil web service menggunakan lib php-curl
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $timeout = 10;
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout); 
        $output = curl_exec($ch); 
        curl_close($ch);  
        //sebelum ditampilkan ubah format JSON dari server menjadi data array php biasa di sisi klien
        $arr = json_decode($output); 
        
        return view('pegawai.callApiPegawai', compact('arr'));

    }
}