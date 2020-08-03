@extends('layouts.index')
@section('content')
@php
$ar_judul = ['No','Nama','Materi','Tempat Pelakasanan','Tanggal Mulai','Tanggal Akhir','Keterangan','Action'];
$no = 1;
@endphp
<!-------awal modal tambah data---------->
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  <i class="fas fa-user-plus">&nbsp;</i>Tambah Data
</button>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Pelatihan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @include('pelatihan.form')
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
&nbsp;
<!-------Akhir modal data-------->

<a href="{{ url('pelatihan-pdf') }}" 
  class="btn btn-danger btn-md">
 <i class="fas fa-file-pdf"></i>&nbsp;Data Pelatihan
</a>&nbsp;&nbsp;

<br/><br/>

<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Pelatihan</h6>
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
                  	@foreach($ar_pelatihan as $pel)
                  	<tr>
                  		<td>{{ $no++ }}</td> 
                  		<td>{{ $pel->nama }}</td>
                      <td>{{ $pel->tema }}</td>
                      <td>{{ $pel->tempat }}</td>
                      <td>{{ $pel->tgl_mulai }}</td>
                      <td>{{ $pel->tgl_akhir }}</td>
                      <td>{{ $pel->keterangan }}</td>
                  		<td>
                      <form action="{{  route('pelatihan.destroy', $pel->id) }}" method="POST">
                  			<a href="{{ route('pelatihan.show', $pel->id) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                  			<a href="{{ route('pelatihan.edit', $pel->id) }}" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                         @if(Auth::user()->role == 'administrator' || Auth::user()->role == 'kepsek') 
                        @csrf
                        @method('DELETE')
                  			<button class="btn btn-danger" onclick="return confirm('Apa anda yakin ingin menghapus data?')"><i class="fas fa-trash"></i></button>
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