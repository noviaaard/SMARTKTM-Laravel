@extends('layouts.master')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>&nbsp;Manajemen Penjual</h1>
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
                  <div><h4>Edit Penjual</h4></div>
                  <form method="post" action="{{route('penjual.update', $penjual->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                      <div class="form-group">
                        <label for="nama_warung">Nama Warung :</label>
                        <input type="text" class="form-control" name="nama_warung" value="{{$penjual->nama_warung}}">
                        @if ($errors->has('nama_warung'))
                            <span class="text-danger">{{ $errors->first('nama_warung') }}</span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="saldo">Saldo :</label>
                        <input type="integer" class="form-control" name="saldo" value="{{$penjual->saldo}}">
                        @if ($errors->has('saldo'))
                            <span class="text-danger">{{ $errors->first('saldo') }}</span>
                        @endif
                      </div>
                    </div>
                      
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <a href="{{ url('penjual') }}" type="submit" class="btn btn-secondary mb-1">Batal</a>
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

