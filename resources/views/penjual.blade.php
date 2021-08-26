@extends('layouts.master')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12">
              <h1>&nbsp;Manajemen Penjual</h1>
            </div>
          </div>
        </div><!-- /.container-fluid -->
    </section>
  
      <!-- Main content -->
    <section class="content">
        <!-- @if (session('success'))
            <div class="alert alert-success">
            {{ session('success') }}
            </div>
        @endif -->
        <!-- Default box -->
        <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <div class="card">
                @if (!empty($penjual))
            
                <div class="card-body">
                <div><span><a href="{{ route('penjual.create') }}" class="btn btn-info float-right"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah Penjual</a></span></div>
                <div id="filter-jurusan" class="btn-group" role="group"></div><br><br>
                    <table id="penjual-table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Warung </th>
                                <th>Saldo</th>
                                <th><center>Aksi</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            @foreach($penjual as $penjual)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $penjual->nama_warung }}</td>
                                <td>{{ $penjual->saldo_penjual }}</td>
                                <td><center>
                                <a href="{{action('PenjualController@edit', $penjual['id'])}}" class="btn btn-warning mb-1" data-toggle="tooltip" data-placement="bottom" title="Edit Penjual"><i class="fas fa-edit"></i></a>
                                <a href="" onclick="if(confirm('Yakin Ingin Menghapus Penjual?'))event.preventDefault(); document.getElementById('delete-{{$penjual->id}}').submit();" class="btn btn-danger mb-1" data-toggle="tooltip" data-placement="bottom" title="Hapus Penjual">
                                    <form action="{{ route('penjual-delete',$penjual->id) }}" id="delete-{{ $penjual->id }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    </form>
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                        <p>Tidak Ada Data Penjual</p>
                    @endif
                </div>
                <div class="table-nav">
                    
               </div><br>
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
    $('#penjual-table').DataTable({
    "ordering": true,
    "lengthMenu": [
        [10,25,50,-1],
        [10,25,50, "All"]
    ],
    initComplete: function() {
        this.api().columns(1).every(function() {
            var column = this;
            var select = $('<select class="form-control"><option value="" selected="true">--Admin--</option></select>')
            .appendTo($('#filter-penjual'))
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

    $('#penjual').DataTable({
        "lengthMenu": [
           [10,25,50,-1],
        [10,25,50, "All" ]
        ],
        "responsive": true,
        "autowidth":false,
        "ordering":false,
        "info": true,
        "paging": true,
        "lengthChange": false,
    });
});

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
        </script>
@endsection

