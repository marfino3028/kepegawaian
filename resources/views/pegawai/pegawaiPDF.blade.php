 <h1 align="center">Data Pegawai Pesantren YBM PLN</h1>
 <table align="center" width="100%" cellpadding="2" cellspacing="0" border="1">
                  <thead>
                    <tr>
                    	@php
                    $ar_judul = ['No','NIP','Nama','Gender','Kategori','Jabatan','Divisi'];
                    $no = 1;
                    @endphp
                  	@foreach($ar_judul as $jdl)
                      <th>{{ $jdl }}</th>
                    @endforeach
                    </tr>
                  </thead>
                  <tbody>
                  	@foreach($ar_pegawai as $peg)
                  	<tr>
                  		<td>{{ $no++ }}</td>
                      <td>{{ $peg->nip }}</td>
                  		<td>{{ $peg->nama }}</td>
                      <td>{{ $peg->gender }}</td>
                      <td>{{ $peg->jenis }}</td>
                      <td>{{ $peg->posisi }}</td>
                      <td>{{ $peg->bagian }}</td>
                   
                      <!--td >

                      	<center>
                      @if(!empty($peg->foto))
                        <img src="img/{{ ($peg->foto) }}" width="20%" />
                        @else
                       <img src="img/no-photo.jpg">
                        @endif
                      </center>
                      </td-->
                  		
                  	</tr>
                  	@endforeach
                  </tbody>
                </table>