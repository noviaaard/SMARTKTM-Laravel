@extends('layouts.master')

@section('content')
 
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>TOP UP</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Top Up</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-5">

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Mahasiswa</h3>
              </div>
              <!-- /.card-header -->
              <form method="post" action="{{route('topup.update', $mhs_mnj->id)}}" enctype="multipart/form-data">
                 @csrf
                 @method('PUT')
                <div class="card-body">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle"
                        src="{{ asset('img/'.$mhs_mnj->foto) }}"
                        alt="User profile picture">
                </div>
                <h1 class="profile-username text-center"></h1>

                  <p class="text-muted text-center"></p>

                  <hr>

                  <div class="form-group row">
                      <label class="col-sm-3 control-label text-right">Nama <span class="text-danger"></span></label>
                      <div class="col-sm-9">
                          <input type="text" class="form-control" name="nama_mhs" value="{{ $mhs_mnj->nama_mhs }}" readonly>
                      </div>
                  </div>

                  <hr>

                  <div class="form-group row">
                      <label class="col-sm-3 control-label text-right">NIM <span class="text-danger"></span></label>
                      <div class="col-sm-9">
                          <input type="text" class="form-control" name="nim" value="{{ $mhs_mnj->nim }}" readonly>
                      </div>
                  </div>

                  <hr>

                  <div class="form-group row">
                      <label class="col-sm-3 control-label text-right">Jurusan <span class="text-danger"></span></label>
                      <div class="col-sm-9">
                          <input type="text" class="form-control" name="jurusan" value="{{ $mhs_mnj->jurusan }}" readonly>
                      </div>
                  </div>

                  <hr>

                  <div class="form-group row">
                      <label class="col-sm-3 control-label text-right">Kelas <span class="text-danger"></span></label>
                      <div class="col-sm-9">
                          <input type="text" class="form-control" name="kelas" value="{{ $mhs_mnj->kelas }}" readonly>
                      </div>
                  </div>

                  <hr>

                  <div class="form-group row">
                      <label class="col-sm-3 control-label text-right">Saldo <span class="text-danger"></span></label>
                      <div class="col-sm-9">
                          <input type="text" class="form-control" name="saldo" value="{{ $mhs_mnj->saldo }}" >
                      </div>
                  </div>

                  <hr>

                <button type="submit" class="btn btn-primary mb-1">Ubah</button>
              </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          
                      <!-- END timeline item -->
                      
                    </div>
                  </div>
                  <!-- /.tab-pane -->

                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection