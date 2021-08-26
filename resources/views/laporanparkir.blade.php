@extends('layouts.master')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12">
              <h1>&nbsp;Laporan Parkir</h1>
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
                @if (!empty($dataparkirs))
                <form action="" method="POST">
                        @csrf
                        <br>
                        <div class="container">
                            <div class="row">
                                <div class="container-fluid">
                                    <div class="form-group row">
                                        <label for="date" class="col-form-label com-sm-2">Dari Tanggal</label>
                                        <div class="col-sm-3">
                                            <input type="date" class="form-control input-sm" id="fromDate" name="fromDate" required/>
                                        </div>
                                        <label for="date" class="col-form-label com-sm-2">Sampai Tanggal</label>
                                        <div class="col-sm-3">
                                            <input type="date" class="form-control input-sm" id="toDate" name="toDate" required/>
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="submit" class="btn btn-primary" name="search" title="Cari"><i class="fas fa-search"></i></button>
                                            <a href="" class="btn btn-warning" style="font-weight: bold">Reset</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
            
                <div class="card-body">
                    <div><h6>Filter</h6><span><div id="filter-laparkir" class="btn-group" role="group"></div><br><br>
                    <table id="parkir-table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Mahasiswa</th>
                                <th>Jurusan</th>
                                <th>Jam Masuk</th>
                                <th>Jam Keluar</th>
                                <th>Tarif Parkir</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;?>
                            @foreach($dataparkirs as $laparkir)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $laparkir->mahasiswa->nama_mhs }}</td>
                                <td>{{ $laparkir->mahasiswa->jurusan }}</td>
                                <td>{{ $laparkir->jam_masuk }}</td>
                                <td>{{ $laparkir->jam_keluar }}</td>
                                <td>Rp. 3000</td>
                            </tr>
                            <?php $no++ ;?>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                        <p>Tidak Ada Laporan Parkir</p>
                    @endif
                </div>
                    <!-- /.row -->
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer')
    <!-- page script -->
    <script>

$(".swal-confirm").click(function(e) {
        id = e.target.dataset.id;
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: 'Data yang sudah dihapus tidak dapat dikembalikan lagi!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya!',
            cancelButtonText: 'Tidak'
            }).then((result) => {
            if (result.value) {
                Swal.fire(
                'Deleted!',
                'Data Berhasil Di Hapus',
                'success'
                );
                $(`#delete${id}`).submit();
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire(
                'Cancelled',
                'Data Batal Di Hapus',
                'error'
                )
            }
        });
    });
    

    $(document).ready(function() {
    $('#parkir-table').DataTable({
    "ordering": true,
    dom: '<"html5buttons">Blfrtip',
                buttons : [
                    {extend:'print',
                         title: 'Laporan Parkir', 
                        exportOptions: { 
                            columns: [ 0, 1, 2, 3, 4, 5]
                        }
                    },
                ],
    "columnDefs": [
        { "width": "5%", "targets": 0 },
        { "width": "30%", "targets": 2 },
        { "width": "12%", "targets": 1 },
        { "width": "10%", "targets": 3 },
        { "width": "20%", "targets": 4 },
        { "width": "15%", "targets": 5 }
    ],
    "lengthMenu": [
        [10,25,50,-1],
        [10,25,50, "All"]
    ],
    initComplete: function() {
       this.api().columns(2).every(function() {
           var column = this;
           var select = $('<select class="form-control"><option value="" selected="true">--Jurusan--</option></select>')
           .appendTo($('#filter-laparkir'))
           .on('change', function() {
               var val = $.fn.dataTable.util.escapeRegex(
                   $(this).val()
               );

               column
                   .search(val ? '^' + val + '$' : '', true,false)
                   .draw();
           });

           column.data().unique().sort().each(function(d, j) {
               select.append('<option value="' + d + '">' + d + '</option')
           });
       });
   },
});

   $('#parkir').DataTable({
       "lengthMenu": [
          [10,25,50,-1],
       [10,25,50, "All" ]
       ],
       "responsive": true,
       "autowidth":false,
       "ordering":false,
   });
});

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
        </script>
@endsection

