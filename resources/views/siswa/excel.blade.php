<th></th><th></th><th></th><h1 class="text-center">Data Siswa</h1>
<?php $i = 1;?>
<table height="100px" id="example" class="table table-striped table-bordered" style="width:100%" >
  <thead>
      <tr>
          <th>Nama Depan</th>
          <th>Nama Belakang</th>
          <th>Email</th>
          <th>No Telp</th>
          <th>Jenis Kelamin</th>
          <th>Agama</th>
          <th>Alamat</th>
      </tr>
  </thead>
  <tbody>
      @foreach($items as $siswa)
      <tr>
          <th>{{$siswa->nama_depan}}</th>
          <th>{{$siswa->nama_belakang}}</th>
          <th>{{$siswa->email}}</th>
          <th>{{$siswa->no_telp}}</th>
          <th>{{$siswa->jenis_kelamin}}</th>
          <th>{{$siswa->agama}}</th>
          <th>{{$siswa->alamat}}</th>
      </tr>
      @endforeach
  </tbody>
</table>