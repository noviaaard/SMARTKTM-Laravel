@extends('layouts.master')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>&nbsp;Manajemen Admin</h1>
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
                  <div><h4>Edit Admin</h4></div>
                  <form method="post" action="{{route('manjadmin.update', $users_list->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                      <div class="form-group">
                        <label for="name">Nama Admin :</label>
                        <input type="text" class="form-control" name="name" value="{{$users_list->name}}">
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="email">Email :</label>
                        <input type="text" class="form-control" name="email" value="{{$users_list->email}}">
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="no_telfon">No.Telfon :</label>
                        <input type="text" class="form-control" name="no_telfon" value="{{$users_list->no_telfon}}">
                        @if ($errors->has('no_telfon'))
                            <span class="text-danger">{{ $errors->first('no_telfon') }}</span>
                        @endif
                      </div>
                    </div>
                      
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <a href="{{ url('manjadmin') }}" type="submit" class="btn btn-secondary mb-1">Batal</a>
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

