@extends('layouts.master')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Manajemen Penjual</h1>
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
                  <div><h4>Tambah Penjual Baru</h4></div>
                  <form method="post" action="{{url('penjual')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                      <div class="form-group">
                        <label for="nama_warung">Nama Warung :</label>
                        <input type="text" class="form-control" name="nama_warung" value="{{ old('nama_warung') }}" placeholder="Nama Warung">
                        @if ($errors->has('nama_warung'))
                            <span class="text-danger">{{ $errors->first('nama_warung') }}</span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="saldo_penjual">Saldo :</label>
                        <input type="text" class="form-control" name="saldo_penjual" value="{{ old('saldo_penjual') }}" placeholder="saldo">
                        @if ($errors->has('saldo_penjual'))
                            <span class="text-danger">{{ $errors->first('saldo_penjual') }}</span>
                        @endif
                      </div>
                      
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <a href="{{ url('penjual') }}" type="submit" class="btn btn-danger mb-1">Batal</a>
                      <button type="submit" class="btn btn-primary mb-1 float-right">Tambah</button>
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
  
  </script>
@endsection

