@extends('layouts.index')
@section('content')
@php
$ar_judul = ['No','NIP','Nama','Kategori',
             'Jabatan','Divisi','Foto','Action'];
$no = 1;    
@endphp 

<a href="{{ route('pegawai.create') }}" 
  class="btn btn-primary btn-md">
<i class="fas fa-user-plus"></i>&nbsp;Tambah Data
</a>&nbsp;&nbsp;
<a href="{{ url('pegawai-pdf') }}" 
  class="btn btn-danger btn-md">
 <i class="fas fa-file-pdf"></i>&nbsp;Data Pegawai
</a>&nbsp;&nbsp;
<br/><br/>
<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Pegawai</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
            @foreach($ar_judul as $jdl)    
                <th>{{ $jdl }}</th>
            @endforeach
            </tr>
          </thead>
          <tbody>
          @foreach ($ar_pegawai as $peg)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $peg->nip }}</td>
                <td>{{ $peg->nama }}</td>
                <td>{{ $peg->jenis }}</td>
                <td>{{ $peg->posisi }}</td>
                <td>{{ $peg->bagian }}</td>
                <td>
                <center>  
                @if(!empty($peg->foto))
                  <img src="{{ asset('img')}}/{{ $peg->foto }}"
                       width="25%" />
                @else
                  <img src="{{asset('img/no-photo.png')}}"
                       width="25%" />    
                @endif 
                </center> 
                </td>
                <td>
                  <form action="{{  route('pegawai.destroy', $peg->id) }}" method="POST">
                   <a href="{{ route('pegawai.show', $peg->id) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                   <a href="{{ route('pegawai.edit', $peg->id) }}" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                 
                  @if(Auth::user()->role == 'administrator' || Auth::user()->role == 'kepsek')    
                    @csrf
                    @method('DELETE')
                     <button type="submit" class="btn btn-danger" onclick="return confirm('Apa anda yakin ingin menghapus data?')"><i class="fas fa-trash"></i></button>
                    </button>
                  @endif  
                 </form>  
                </td>
            </tr>
          @endforeach   
          </tbody>    
          
        </table>
      </div>
    </div>
  </div>
@endsection