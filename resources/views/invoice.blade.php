@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">

            <!-- About Me Box -->
            <br>
            <br>
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Bukti Top Up Saldo</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="../../assets/images/ceklis.png"
                       alt="User profile picture">
                </div>

                <hr>

                <div class="form-group row">
                    <label class="col-sm-3 control-label text-right">Nama <span class="text-danger"></span></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control"  value="{{ $mhs_mnj->nama_mhs }}" readonly>
                    </div>
                </div>

                <hr>

                <div class="form-group row">
                    <label class="col-sm-3 control-label text-right">Jumlah Top Up <span class="text-danger"></span></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control"  value="Rp. " >
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label text-right">Metode Pembayaran <span class="text-danger"></span></label>
                    <div class="col-sm-9">
                    <select class="form-control select2bs4" name="status">
                          <option value="" disabled selected>--pilih--</option>
                          <option value="">Cash</option>
                          <option value="">Dana</option>
                        </select>
                    </div>
                </div>
              


                <hr>
                <button onclick="window.print();" class="noPrint btn btn-primary btn-block">
                    Print
                    </button>
                    

              </div>
              <!-- /.card-body -->
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

  <style>
  @media print {
  .noPrint{
    display:none;
  }
}

</style>


@endsection