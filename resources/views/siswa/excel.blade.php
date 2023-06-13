<th></th><th></th><th></th><h1 class="text-center">Data Siswa</h1>
<?php $i = 1;?>
<table height="100px" id="example" class="table table-striped table-bordered" style="width:100%" >
  <thead style="border: 1px solid;">
      <tr>
          <th style="border: 1px solid;">Nama Depan</th>
          <th style="border: 1px solid;">Nama Belakang</th>
          <th style="border: 1px solid;">Email</th>
          <th style="border: 1px solid;">No Telp</th>
          <th style="border: 1px solid;">Jenis Kelamin</th>
          <th style="border: 1px solid;">Agama</th>
          <th style="border: 1px solid;">Alamat</th>
      </tr>
  </thead>
  <tbody style="border: 1px solid;">
      @foreach($items as $siswa)
      <tr>
          <td style="border: 1px solid;">{{$siswa->nama_depan}}</td>
          <td style="border: 1px solid;">{{$siswa->nama_belakang}}</td>
          <td style="border: 1px solid;">{{$siswa->email}}</td>
          <td style="border: 1px solid;">{{$siswa->no_telp}}</td>
          <td style="border: 1px solid;">{{$siswa->jenis_kelamin}}</td>
          <td style="border: 1px solid;">{{$siswa->agama}}</td>
          <td style="border: 1px solid;">{{$siswa->alamat}}</td>
      </tr>
      @endforeach
  </tbody>
</table>