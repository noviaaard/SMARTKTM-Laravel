@extends('layouts.master')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Manajemen Mahasiswa</h1>
            </div>
            <div class="col-sm-6">
              
            </div>
          </div>
        </div><!-- /.container-fluid -->
    </section>
  
      <!-- Main content -->
    <section class="content">
      
        <!-- Default box -->
        <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <div class="card">
                <div class="card-header">
                  <div><h4>Tambah Mahasiswa Baru</h4></div>
                  <form method="post" action="{{url('manjmhs')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                    <div class="form-group">
                        <label for="nim">NIM :</label>
                        <input type="text" class="form-control" name="nim" value="{{ old('nim') }}" placeholder="NIM">
                        @if ($errors->has('nim'))
                            <span class="text-danger">{{ $errors->first('nim') }}</span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="nama_mhs">Nama Mahasiswa :</label>
                        <input type="text" class="form-control" name="nama_mhs" value="{{ old('nama_mhs') }}" placeholder="Nama Mahasiswa">
                        @if ($errors->has('nama_mhs'))
                            <span class="text-danger">{{ $errors->first('nama_mhs') }}</span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="nama_mhs">No. Kartu:</label>
                        <input type="text" class="form-control" name="nama_mhs" value="{{ old('nama_mhs') }}" placeholder="No. Kartu">
                        @if ($errors->has('nama_mhs'))
                            <span class="text-danger">{{ $errors->first('nama_mhs') }}</span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="foto">Upload Foto :</label>
                        <input type="file" class="form-control-file" name="foto" id="foto" placeholder="Masukkan Foto">
                        @if ($errors->has('foto'))
                            <span class="text-danger">{{ $errors->first('foto') }}</span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir :</label>
                        <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir" value="{{ old('tempat_lahir') }}">
                        @if ($errors->has('tempat_lahir'))
                            <span class="text-danger">{{ $errors->first('tempat_lahir') }}</span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir :</label>
                        <input type="date" class="form-control" name="tgl_lahir" placeholder="tgl_lahir" value="{{ old('tgl_lahir') }}">
                        @if ($errors->has('tgl_lahir'))
                            <span class="text-danger">{{ $errors->first('tgl_lahir') }}</span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="kelas">Kelas :</label>
                        <input type="text" class="form-control" name="kelas" placeholder="Kelas" value="{{ old('kelas') }}">
                        @if ($errors->has('kelas'))
                            <span class="text-danger">{{ $errors->first('kelas') }}</span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="jurusan">Jurusan :</label>
                        <input type="text" class="form-control" name="jurusan" placeholder="Jurusan" value="{{ old('jurusan') }}">
                        @if ($errors->has('jurusan'))
                            <span class="text-danger">{{ $errors->first('jurusan') }}</span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="alamat">Alamat :</label>
                        <input type="text" class="form-control" name="alamat" value="{{ old('alamat') }}" placeholder="Alamat" >
                        @if ($errors->has('alamat'))
                            <span class="text-danger">{{ $errors->first('alamat') }}</span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="email">Email :</label>
                        <input type="text" class="form-control" name="email"  value="{{ old('email') }}" placeholder="Email">
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="no_telfon">No. Telfon :</label>
                        <input type="no_telfon" class="form-control" name="no_telfon" value="{{ old('no_telfon') }}" placeholder="No. Telfon">
                        @if ($errors->has('no_telfon'))
                            <span class="text-danger">{{ $errors->first('no_telfon') }}</span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="saldo">Saldo :</label>
                        <input type="saldo" class="form-control" name="saldo" value="0" placeholder="Saldo" readonly>
                        @if ($errors->has('saldo'))
                            <span class="text-danger">{{ $errors->first('saldo') }}</span>
                        @endif
                      </div>
                      
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <a href="{{ url('manjmhs') }}" type="submit" class="btn btn-danger mb-1">Batal</a>
                      <button type="submit" class="btn btn-primary mb-1 float-right">Tambah</button>
                    </div>
                  </form>
                </div>
            </div>
            </div>
        </div>
    </section>
@endsection

@section('footer')
  <!-- page script -->
  <script>
  
  </script>
@endsection

