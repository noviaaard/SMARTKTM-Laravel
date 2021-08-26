@extends('layouts.master')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>&nbsp;Manajemen Mahasiswa</h1>
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
                  <div><h4>Edit Mahasiswa</h4></div>
                  <form method="post" action="{{route('manjmhs.update', $mhs_mnj->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                    <div class="form-group">
                        <label for="nim">NIM :</label>
                        <input type="text" class="form-control" name="nim" value="{{$mhs_mnj->nim}}">
                        @if ($errors->has('nim'))
                            <span class="text-danger">{{ $errors->first('nim') }}</span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="nama_mhs">Nama Mahasiswa :</label>
                        <input type="text" class="form-control" name="nama_mhs" value="{{$mhs_mnj->nama_mhs}}">
                        @if ($errors->has('nama_mhs'))
                            <span class="text-danger">{{ $errors->first('nama_mhs') }}</span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir :</label>
                        <input type="text" class="form-control" name="tempat_lahir" value="{{$mhs_mnj->tempat_lahir}}">
                        @if ($errors->has('tempat_lahir'))
                            <span class="text-danger">{{ $errors->first('tempat_lahir') }}</span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir :</label>
                        <input type="date" class="form-control" name="tgl_lahir" value="{{$mhs_mnj->tgl_lahir}}">
                        @if ($errors->has('tgl_lahir'))
                            <span class="text-danger">{{ $errors->first('tgl_lahir') }}</span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="kelas">Kelas :</label>
                        <input type="text" class="form-control" name="kelas" value="{{$mhs_mnj->kelas}}">
                        @if ($errors->has('kelas'))
                            <span class="text-danger">{{ $errors->first('kelas') }}</span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="jurusan">Jurusan :</label>
                        <input type="text" class="form-control" name="jurusan" value="{{$mhs_mnj->jurusan}}">
                        @if ($errors->has('jurusan'))
                            <span class="text-danger">{{ $errors->first('jurusan') }}</span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="alamat">Alamat :</label>
                        <input type="text" class="form-control" name="alamat" value="{{$mhs_mnj->alamat}}">
                        @if ($errors->has('alamat'))
                            <span class="text-danger">{{ $errors->first('alamat') }}</span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="email">Email :</label>
                        <input type="text" class="form-control" name="email" value="{{$mhs_mnj->email}}">
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="no_telfon">No. Telfon :</label>
                        <input type="no_telfon" class="form-control" name="no_telfon" value="{{$mhs_mnj->no_telfon}}">
                        @if ($errors->has('no_telfon'))
                            <span class="text-danger">{{ $errors->first('no_telfon') }}</span>
                        @endif
                      </div>
                    </div>
                      
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <a href="{{ url('profile') }}" type="submit" class="btn btn-secondary mb-1">Batal</a>
                      <button type="submit" class="btn btn-primary mb-1">Ubah</button>
                    </div>
                  </form>
                </div>
            </div>
            </div>
        </div>
        @include('sweetalert::alert')
    </section>
@endsection

@section('footer')
  <!-- page script -->
  <script>

    $(".swal-confirm").click(function(e) {
    id = e.target.dataset.id;
    Swal.fire(
      'Good job!',
      'Data Berhasil Diubah!',
      'success'
    );
  });
  
  </script>
@endsection

