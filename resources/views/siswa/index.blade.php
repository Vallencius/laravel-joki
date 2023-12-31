@extends('layouts.master')
@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Data Siswa</h3>
                        <div class="right">
                            <button type="button" class="btn" data-toggle="modal" data-target="#tambahData">Tambah Data Siswa <i class="lnr lnr-plus-circle"></i></button>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if(session('sukses'))
                        <div class="alert alert-success" role="alert">
                            {{session('sukses')}}
                        </div>
                        @endif
                        @error('nama_depan')
                            <div class="alert alert-danger">
                            {{ $message }}
                            </div>
                        @enderror
                        @error('nama_belakang')
                            <div class="alert alert-danger">
                            {{ $message }}
                            </div>
                        @enderror
                        @error('email')
                            <div class="alert alert-danger">
                            {{ $message }}
                            </div>
                        @enderror
                        @error('no_telp')
                            <div class="alert alert-danger">
                            {{ $message }}
                            </div>
                        @enderror
                        @error('jenis_kelamin')
                            <div class="alert alert-danger">
                            {{ $message }}
                            </div>
                        @enderror
                        @error('agama')
                            <div class="alert alert-danger">
                            {{ $message }}
                            </div>
                        @enderror
                        @error('angkatan')
                            <div class="alert alert-danger">
                            {{ $message }}
                            </div>
                        @enderror
                        @error('alamat')
                            <div class="alert alert-danger">
                            {{ $message }}
                            </div>
                        @enderror
                        <a href="/siswa/export-excel" class="btn btn-success btn-sm" target="_blank">Excel</a>
                        <a href="/siswa/export-pdf" class="btn btn-danger btn-sm" target="_blank">PDF</a>
                        <a href="/siswa/charts" class="btn btn-info btn-sm" target="_blank">Chart</a>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nama Depan</th>
                                    <th>Nama Belakang</th>
                                    <th>Email</th>
                                    <th>No Telp</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Agama</th>
                                    <th>Alamat</th>
                                    <th>Angkatan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data_siswa as $siswa)
                                <tr>
                                    <th><a href="siswa/{{$siswa->id }}/profile">{{$siswa->nama_depan}}</a></th>
                                    <th><a href="siswa/{{$siswa->id }}/profile">{{$siswa->nama_belakang}}</a></th>
                                    <th><a href="siswa/{{$siswa->id }}/profile">{{$siswa->email}}</a></th>
                                    <th><a href="siswa/{{$siswa->id }}/profile">{{$siswa->no_telp}}</a></th>
                                    <th><a href="siswa/{{$siswa->id }}/profile">{{$siswa->jenis_kelamin}}</a></th>
                                    <th><a href="siswa/{{$siswa->id }}/profile">{{$siswa->agama}}</a></th>
                                    <th><a href="siswa/{{$siswa->id }}/profile">{{$siswa->alamat}}</a></th>
                                    <th><a href="siswa/{{$siswa->id }}/profile">{{$siswa->angkatan}}</a></th>
                                    <th>
                                        <a href="/siswa/{{$siswa->id}}/edit" class="btn btn-warning btnsm">Edit</a>
                                        <a href="/siswa/{{$siswa->id}}/delete" class="btn btn-danger btnsm" onclick="return confirm('Apakah yakin ingin dihapus?')">Delete</a>
                                    </th>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="tambahData" tabindex="-1" role="dialog" arialabelledby="tambahData" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="tambahData">Tambah Data Siswa</h5>
                                <button onclick="location.reload();" type="button" class="close" datadismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="siswa_form" method="POST" action="/siswa/buat">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label for="nama_depan">Nama Depan</label>
                                        <input type="text" class="form-control" name="nama_depan" id="nama_depan" aria-describedby="nama_depan" placeholder="Nama Depan">
                                        <span class="text-danger">{{ $errors->first('nama_depan')}}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_belakang">Nama Belakang</label>
                                        <input type="text" class="form-control" name="nama_belakang" id="nama_belakang" aria-describedby="nama_belakang" placeholder="Nama Belakang">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" name="email" id="email" ariadescribedby="email" placeholder="Email">
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="no_telp">No Telp</label>
                                        <input type="text" class="form-control" name="no_telp" id="no_telp" aria-describedby="no_telp" placeholder="Nomor Telepon">
                                        <span class="text-danger">{{ $errors->first('no_telp') }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="jenis_kelamin">Pilih Jenis Kelamin</label>
                                        <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                            <option value="L">Laki-laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="agama">Agama</label>
                                        <input type="text" class="form-control" name="agama" id="agama" aria-describedby="nama_depan" placeholder="Agama">
                                    </div>
                                    <div class="form-group">
                                        <label for="angkatan">Angkatan</label>
                                        <input type="text" class="form-control" name="angkatan" id="angkatan" aria-describedby="nama_depan" placeholder="Angkatan">
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <textarea class="form-control" name="alamat" id="alamat" rows="3"></textarea>
                                    </div>
                            </div>
                            <div class="alert alert-success d-none" id="msg_div">
                                <span id="res_message"></span>
                            </div>
                            <div class="modal-footer">
                                <button onclick="location.reload();" type="button" class="btn btnsecondary" data-dismiss="modal">Close</button>
                                <button type="submit" id="send_form" class="btn btnprimary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryvalidate/1.19.0/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additionalmethods.min.js"></script>
<script>
    $('#msg_div').hide();
    if ($("#siswa_form").length > 0) {
        $("#siswa_form").validate({

            rules: {
                nama_depan: {
                    required: true,
                    minlength: 3,
                    maxlength: 50
                },
                no_telp: {
                    required: true,
                    digits: true,
                    minlength: 10,
                    maxlength: 13,
                },
                email: {
                    required: true,
                    maxlength: 50,
                    email: true,
                },
            },
            messages: {
                nama_depan: {
                    required: "Tolong isi Nama Depan",
                    minlength: "Nama depan minimal 3 karakter",
                    maxlength: "Nama depan maksmial 50 karakter."
                },
                no_telp: {
                    required: "Isi nomor telepon",
                    digits: "Diisi hanya angka",
                    minlength: "Nomor telepon minimal 10 digit",
                    maxlength: "Nomor telepon maksimal 13 digit",
                },
                email: {
                    required: "Email harus diisi.",
                    email: "Isi dengan struktur email yang benar",
                    maxlength: "Email maksimal 50 Karakter",
                },
            },
            submitHandler: function(form) {
                $('#send_form').html('Sending..');
                $.ajax({
                    url: "/siswa/create",
                    type: "POST",
                    data: $('#siswa_form').serialize(),
                    success: function(response) {
                        $('#send_form').html('Submit');
                        $('#msg_div').show();
                        $('#res_message').show();
                        $('#res_message').html(response.msg);
                        $('#msg_div').removeClass('d-none');
                        document.getElementById("siswa_form").reset();
                        setTimeout(function() {
                            $('#msg_div').hide();
                            $('#res_message').hide();
                            location.reload();
                        }, 5000);
                    }
                });
            }
        })
    }
</script>
@stop