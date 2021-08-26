@extends('layouts.master')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12">
              <h1>&nbsp;Laporan Kantin</h1>
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
                @if (!empty($kantins))
                <div class="card-body">
                    <div><h6>Filter</h6><span><div id="filter-kantin" class="btn-group" role="group"></div><br><br>
                    <table id="kantin-table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Mahasiswa</th>
                                <th>Jurusan</th>
                                <th>Jam Transaksi</th>
                                <th>Bayar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;?>
                            @foreach($kantins as $lakantin)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $lakantin->mahasiswa->nama_mhs }}</td>
                                <td>{{ $lakantin->mahasiswa->jurusan }}</td>
                                <td>{{ $lakantin->jam_transaksi }}</td>
                                <td>Rp. 10000</td>
                            </tr>
                            <?php $no++ ;?>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                        <p>Tidak Ada Laporan Kantin</p>
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
    $('#kantin-table').DataTable({
    "ordering": true,
    dom: '<"html5buttons">Blfrtip',
                buttons : [
                    {extend:'print',
                         title: 'Laporan Kantin', 
                        exportOptions: { 
                            columns: [ 0, 1, 2, 3, 4]
                        }
                    },
                ],
    "columnDefs": [
        { "width": "5%", "targets": 0 },
        { "width": "30%", "targets": 2 },
        { "width": "12%", "targets": 1 },
        { "width": "10%", "targets": 3 },
        { "width": "20%", "targets": 4 }
    ],
    "lengthMenu": [
        [10,25,50,-1],
        [10,25,50, "All"]
    ],
    initComplete: function() {
       this.api().columns(2).every(function() {
           var column = this;
           var select = $('<select class="form-control"><option value="" selected="true">--Jurusan--</option></select>')
           .appendTo($('#filter-kantin'))
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

   $('#kantin').DataTable({
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

