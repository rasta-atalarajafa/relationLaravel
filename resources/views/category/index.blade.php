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
            {{-- Search --}}
            <div class="input-group input-group-sm hidden-xs" style="width: 175px;">
                <input type="text" name="search" id="search" class="form-control pull-right" placeholder="search">
                <div class="input-group-btn">
                    @csrf
                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                </div>
            </div>
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
            <a href="#" class="btn btn-primary" onclick="showData()"><i class="fas fa-check"> Cobain Ajax</i></a>
            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="csrf-token">

            <table id="example2" class="table table-bordered table-hover" style="margin-top: 1rem">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>slug</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php($no = $data->perPage() * $data->currentPage() - $data->perPage() + 1)
                    @foreach ($data as $category)
                    {{-- $row = $(this).parent().parent() --}}
                    {{-- $id = $row.attr('data-id') --}}
                    {{-- url = '/category/'+ id --}}
                    {{-- $('#modal-form').find('input[name=_token]').val('PUT'); atau 'delete' kalo hapus --}}
                    <tr data-id="{{ $category->id }}">
                        <td>{{ $no }}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->name_clean}}</td>
                        <td>
                            <a href="#" class="btn btn-primary btn-edit" data-toggle="modal" data-target="#modal-form">
                                <i class="fas fa-edit"></i> Ubah
                            </a>
                            <a href="#" class="btn btn-danger btn-delete">
                                <i class="fas fa-trash"></i> Hapus
                            </a>
                        </td>
                    </tr>
                    @php($no++)
                    @endforeach
                </tbody>
            </table>
        </div>
        {{$data->links()}}
        <!-- /.box-body -->
    </div>
    @endsection
    @push('js')


<script>
    $(function () {
        $('.btn-add').on('click', function () {
        $('#formModalLabel').html('Tambah Data Kategori');
        $('#btn-save').html('Tambah Data');
        $('#input-name').val('');
        $('#input-slug').val('');
    });

    $('#btn-save').on('click', function () {

        const token = $('#modal-form').find('input[name=_token]').val();
        const name = $('#input-name').val();
        const slug = $('#input-slug').val();   

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "/category",
            data: "name=" + name + "&name_clean=" + slug + "&_token=" + token,
            success: function (response) {
                // sembunyikan modal
                $('#modal-form').modal('hide');
            },
            error: function (err) {
                alert('ada error!');
            }
        });

    });

    $('#btn-save').on('click', function() {
        $('#formModalLabel').html('Ubah Data Kategori');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('#modal-form').html('');
        $('#modal-form').find('input[name=_method]').val('PUT');

        $.ajax({
          type: "POST",
          url: "/category/"+id+"/edit",
          dataType: "json",
          success: function(html) {
              $('#modal-form').modal('hide')
              $('#input-name').val(html.data.input-name);
              $('#input-slug').val(html.data.input-slug);
          },
          error: function(err) {
            alert('ada error!');
          }
        });
    });

});



        // clone baris table pertama
        //ubah data clone berdasar data dari response.data
        //tambahkan data clone ke baris pertama tabel (pake prepend)
        // ubah nomor baris baru yang lain jadi 2 dst (find)

        //         $(document).on('click', 'edit', function() {
        //             let id = $(this).attr('id');
        //             $('#modal-form').html('');
        //             $.ajax({
        //                 url: "/category/"+id+"/edit",
        //                 dataType: "json",
        //                 success: function(html) {
        //                     ('#input-name').val(html.data.input-name);
        //                     ('#input-slug').val(html.data.input-slug);
        //                 }
        //             });
        //         });

        //         $("#but").click(function() {
        //                  var $clone = $("#test").clone();
        //                  $clone.find("tr:not(:first-child)").remove();    
        //                  $("#target").html($clone);
        // });

</script>
    @endpush
