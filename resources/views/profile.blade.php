@extends('layouts.master')

@section('content')
 
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
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
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              

                <hr>

                <div class="form-group row">
                    <label class="col-sm-3 control-label text-right">NIM <span class="text-danger"></span></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control"  value="{{ $mhs_mnj->nim }}" readonly>
                    </div>
                </div>

                <hr>

                <div class="form-group row">
                    <label class="col-sm-3 control-label text-right">Jurusan <span class="text-danger"></span></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control"  value="{{ $mhs_mnj->jurusan }}" readonly>
                    </div>
                </div>

                <hr>

                <div class="form-group row">
                    <label class="col-sm-3 control-label text-right">Kelas <span class="text-danger"></span></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control"  value="{{ $mhs_mnj->kelas }}" readonly>
                    </div>
                </div>

                <hr>

                <div class="form-group row">
                    <label class="col-sm-3 control-label text-right">Tempat, Tanggal Lahir  <span class="text-danger"></span></label>
                    <div class="col-sm-9">
                        <input type="text"  class="form-control"  value="{{ $mhs_mnj->tempat_lahir }}, {{ $mhs_mnj->tgl_lahir }}" readonly>
                    </div>
                </div>

                <hr>

                <div class="form-group row">
                    <label class="col-sm-3 control-label text-right">Alamat  <span class="text-danger"></span></label>
                    <div class="col-sm-9">
                        <textarea  class="form-control" readonly>{{ $mhs_mnj->alamat }}</textarea>
                    </div>
                </div>

                <hr>

                <div class="form-group row">
                    <label class="col-sm-3 control-label text-right">Email  <span class="text-danger"></span></label>
                    <div class="col-sm-9">
                        <input type="text"  class="form-control"  value="{{ $mhs_mnj->email }}" readonly>
                    </div>
                </div>

                <hr>

                <div class="form-group row">
                    <label class="col-sm-3 control-label text-right">No. Telfon  <span class="text-danger"></span></label>
                    <div class="col-sm-9">
                        <input type="text"  class="form-control"  value="{{ $mhs_mnj->no_telfon }}" readonly>
                    </div>
                </div>

                <hr>

                <div class="form-group row">
                    <label class="col-sm-3 control-label text-right">Saldo  <span class="text-danger"></span></label>
                    <div class="col-sm-9">
                        <input type="text"  class="form-control" value="{{ $mhs_mnj->saldo }}" readonly>
                    </div>
                </div>

                <hr>

                <a href="{{action('ManjMhsController@edit', $mhs_mnj['id'])}}" class="btn btn-primary btn-block"><b>Edit</b></a>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-6">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#eParking" data-toggle="tab">e-Parking</a></li>
                  <li class="nav-item"><a class="nav-link" href="#eCanteen" data-toggle="tab">e-Canteen</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="eParking">
                    <!-- Post -->
                    <div class="post">
                      <div class="tab-pane" id="eParking">
                      <table id="profile-table" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                                <th>No</th>
                                <th>Jam Masuk</th>
                                <th>Jam Keluar</th>
                                <th>Bayar</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1;?>
                            @foreach($dataparkirs as $dataparkir)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $dataparkir->jam_masuk }}</td>
                                <td>{{ $dataparkir->jam_keluar }}</td>
                                <td>Rp. 3000</td>
                            </tr>
                            <?php $no++ ;?>
                            @endforeach
                        </tbody>
                    </table>
                      </div>
                    </div>
                    <!-- /.post -->
                  </div>

                  <!-- /.e-Canteen -->
                  <div class="tab-pane" id="eCanteen">
                  <table id="profile-table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jam Transaksi</th>
                                <th>Bayar</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1;?>
                            @foreach($kantins as $kantin)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $kantin->jam_transaksi }}</td>
                                <td>Rp. 10000</td>
                            </tr>
                            <?php $no++ ;?>
                            @endforeach
                        </tbody>
                    </table>
                    
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