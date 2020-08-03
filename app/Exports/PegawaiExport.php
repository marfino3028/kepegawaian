<?php

namespace App\Exports;

use App\Pegawai;
use Maatwebsite\Excel\Concerns\FromCollection;
use DB;

class PegawaiExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //return Pegawai::all();
        $ar_pegawai = DB::table('pegawai')
            ->join('kategori', 'kategori.id', '=', 'pegawai.kategori_id')
            ->join('jabatan', 'jabatan.id', '=', 'pegawai.jabatan_id')
            ->join('divisi', 'divisi.id', '=', 'pegawai.divisi_id')
            ->select('pegawai.*', 'kategori.nama AS jenis', 
                     'jabatan.nama AS posisi','divisi.nama AS bagian')
            ->get();

        return $ar_pegawai;
    }
}
