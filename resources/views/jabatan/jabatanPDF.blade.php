@php
$ar_judul = ['No','Jabatan'];
$no = 1;
@endphp
<h3 align="center">Data Jabatan Pesantren YBM PLN</h3>

<div class="card shadow mb-4">
            <div class="card-header py-3">
            
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" border="1" align="center">
                  <thead>
                    <tr>
                  	@foreach($ar_judul as $jdl)
                      <th>{{ $jdl }}</th>
                    @endforeach
                    </tr>
                  </thead>
                  <tbody>
                  	@foreach($ar_jabatan as $kat)
                  	<tr>
                  		<td>{{ $no++ }}</td>
                  		<td>{{ $kat->nama }}</td>
                  		
                  	</tr>
                  	@endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>