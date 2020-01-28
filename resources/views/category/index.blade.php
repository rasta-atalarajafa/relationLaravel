@extends('templates.base')

@section('title','Data Category')

@section('content')
<section class="content-header">
    <h1>
        Data Category
        <small>it all starts here</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fas fa-tachometer-alt"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <div class="box-tools pull-right">
                <button type="submit" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
                    <i class="fa fa-minus"></i></button>
                {{-- <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button> --}}
            </div>
        </div>
        <div class="box-body">
            @include('category._form_modal')
            <a href="#" class="btn btn-success btn-add" data-toggle="modal" data-target="#modal-form">
                <i class="fas fa-plus"> Tambah Data</i>
            </a>

            <table id="tblAddRow" class="table table-bordered table-hover" style="margin-top: 1rem">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $category)
                    <tr data-id="{{ $category->id }}">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->name_clean}}</td>
                        <td>
                            <a href="#" class="btn btn-primary btn-edit" data-toggle="modal" data-target="#modal-form"
                                data-id="{{ $category->id }}">
                                @method('patch')
                                <i class="fas fa-edit"></i> Ubah
                            </a>
                            <a href="#" class="btn btn-danger btn-delete">
                                <i class="fas fa-trash"></i> Hapus
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.box-body -->
    </div>
</section>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endpush

@push('js')
<script src="{{ asset('plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $('.table').DataTable({
            language: {
                "sProcessing": "Sedang proses...",
                "sLengthMenu": "Tampilan _MENU_ entri",
                "sZeroRecords": "Tidak ditemukan data yang sesuai",
                "sInfo": "Tampilan _START_ sampai _END_ dari _TOTAL_ entri",
                "sInfoEmpty": "Tampilan 0 hingga 0 dari 0 entri",
                "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                "sInfoPostFix": "",
                "sSearch": "Cari:",
                "sUrl": "",
                "oPaginate": {
                "sFirst": "Awal",
                "sPrevious": "<i class='fa fa-arrow-left'></i> Kembali",
                "sNext": "Selanjutnya <i class='fa fa-arrow-right'></i>",
                "sLast": "Akhir"
                }
            }
        });
    });
</script>
<script>
    $(function () {
        $('.btn-add').on('click', function () {
            $('#input-name').val('');
            $('#input-slug').val('');
            $('.modal-title').html('Form Kategori');
            $('.modal-footer button[type=submit]').html('Simpan');
        });


        $('#btn-save').on('click', function (e) {
            e.preventDefault();

            const token = $('#modal-form').find('input[name=_token]').val();
            const name = $('#input-name').val();
            const slug = $('#input-slug').val();

            $.ajax({
                type: "POST",
                dataType: "json",
                url: "/category",
                data: "name=" + name + "&name_clean=" + slug + "&_token=" + token,
                success: function (response) {
                    $('#modal-form').modal('hide'); // sembunyikan modal
                    $('#tblAddRow').reload();
                    let $newRow = $('#tblAddRow tbody tr').clone(); // clone baris table pertama

                    //ubah data clone berdasar data dari response.data
                    $('#tblAddRow tbody').prepend(addNewRow($newRow)); //tambahkan data clone ke baris pertama tabel (pake prepend)
                    // ubah nomor baris baru yang lain jadi 2 dst (find)
                    function addNewRow($row) {
                        let name = $('#input-name').val();
                        let slug = $('#input-slug').val();

                        // set data baris baru
                        $row.find('td').eq(1).text(name);
                        $row.find('td').eq(2).text(slug);
                    }
                },
                error: function (err) {
                    alert('ada error!');
                }
            });
        });



        $('.btn-edit').on('click', function () {
            $('.modal-title').html('Ubah Kategori');
            $('.modal-footer button[type=submit]').html('Ubah');

            const id = $(this).data('id');

            $.ajax({
                method: "patch",
                dataType: "json",
                url: "/category/" + {
                    {
                        $category - > id
                    }
                } + "/edit",
                data: {
                    id: id
                },
                success: function (data) {
                    console.log(data)
                }
            })
        });
    });
</script>
@endpush
