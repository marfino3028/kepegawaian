 <h1 align="center">Data Pelatihan Pesantren YBM PLN</h1>
 <table align="center" width="100%" cellpadding="10" cellspacing="0" border="1">
                  <thead>
                    <tr>
                    	@php
                   $ar_judul = ['No','Nama','Materi','Tempat Pelakasanan','Tanggal Mulai','Tanggal Akhir','Keterangan'];
                    $no = 1;
                    @endphp
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
                      <td>{{ $pel->tgl_mulai }}</td>
                      <td>{{ $pel->tgl_akhir }}</td>
                      <td>{{ $pel->tempat }}</td>
                      <td>{{ $pel->keterangan }}</td>
                  		
                  	</tr>
                  	@endforeach
                  </tbody>
                </table>