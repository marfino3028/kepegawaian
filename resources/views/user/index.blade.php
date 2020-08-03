@extends('layouts.index')
@section('content')
@if(Auth::user()->role == 'administrator' || Auth::user()->role == 'kepsek')
@php
$ar_user = App\User::all();
$ar_judul = ['No','Nama','Email','Action'];
$no = 1;
@endphp

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
   <i class="fas fa-user-plus">&nbsp;</i>Tambah Data
</button>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Kelola User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @include('user.form')
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<br/><br/>


<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
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
                  	@foreach($ar_user as $u)
                  	<tr>
                  		<td>{{ $no++ }}</td>
                  		<td>{{ $u->name }}</td>
                      <td>{{ $u->email }}</td>
                  		<td>
                  			<form action="{{  route('user.destroy', $u->id) }}" method="POST">
                        <!--a href="{{ route('user.show', $u->id) }}" class="btn btn-info"><i class="fas fa-eye"></i></a-->
                       <a href="{{ route('user.edit', $u->id) }}" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apa anda yakin ingin menghapus data?')"><i class="fas fa-eraser"></i></button>
                      </form>
                  		</td>
                  	</tr>
                  	@endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
@else
  @include('layouts.terlarang')
@endif  
@endsection