@extends('layouts.master')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12">
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
                @if (!empty($mhs_mnj))
            
                <div class="card-body">
                    <div><h6>Filter</h6><span><a href="http://localhost/rfid-nodemcu/registration.php" class="btn btn-info float-right"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah Mahasiswa</a></span></div>
                    <div id="filter-jurusan" class="btn-group" role="group"></div><br><br>
                    <table id="manjmhs-table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIM </th>
                                <th>Nama Mahasiswa</th>
                                <th>Jurusan</th>
                                <th>Kelas</th>
                                <th>No. Whatsapp</th>
                                <th><center>Aksi</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;?>
                            @foreach($mhs_mnj as $mnj_mhs)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $mnj_mhs->nim }}</td>
                                <td>{{ $mnj_mhs->nama_mhs }}</td>
                                <td>{{ $mnj_mhs->jurusan }}</td>
                                <td>{{ $mnj_mhs->kelas }}</td>
                                <td><a href="{{ $mnj_mhs->no_telfon }}"><i class="fab fa-whatsapp-square"></i></a></td>
                                <td><center>
                                <a href="{{action('ManjMhsController@invoice', $mnj_mhs['id'])}}" class="btn btn-info mb-1" data-toggle="tooltip" data-placement="bottom" title="Invoice"><i class="fas fa-print"></i></a>
                               <a href="{{action('ManjMhsController@show', $mnj_mhs['id'])}}" class="btn btn-warning mb-1" data-toggle="tooltip" data-placement="bottom" title="Detail Mahasiswa"><i class="fas fa-edit"></i></a>
                                <a href="#" class="btn btn-danger mb-1 swal-confirm" data-id="{{ $mnj_mhs->id}}" data-toggle="tooltip" data-placement="bottom" title="Hapus Mahasiswa"><i class="fas fa-trash-alt"></i>
                                    <form action="{{ route('mhs-delete',$mnj_mhs->id) }}" id="delete{{ $mnj_mhs->id }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    </form>
                                </a>
                                </td>
                            </tr>
                            <?php $no++ ;?>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                        <p>Tidak Ada Data Mahasiswa</p>
                    @endif
                </div>
                <div class="table-nav">
                    <div class="total-useraktif">
                       <div align="center">
                        <strong> Total Mahasiswa : {{ $total_mhs }} </strong>
                       </div>
                    </div>
               </div><br>
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
    $('#manjmhs-table').DataTable({
    "ordering": true,
    "columnDefs": [
        { "width": "5%", "targets": 0 },
        { "width": "30%", "targets": 2 },
        { "width": "12%", "targets": 1 },
        { "width": "10%", "targets": 3 },
        { "width": "10%", "targets": 4 },
        { "width": "10%", "targets": 5 }
    ],
    "lengthMenu": [
        [10,25,50,-1],
        [10,25,50, "All"]
    ],
    initComplete: function() {
       this.api().columns(3).every(function() {
           var column = this;
           var select = $('<select class="form-control"><option value="" selected="true">--Jurusan--</option></select>')
           .appendTo($('#filter-jurusan'))
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

   $('#jurusan').DataTable({
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

