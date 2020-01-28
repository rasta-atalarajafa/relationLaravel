@extends('templates.base')

@section('title','Data Postingan')
    
@section('content')
<section class="content-header">
    <h1>
        Postingan
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
            <h3 class="box-title">Data Postingan</h3>
            <div class="box-tools pull-right">
                <button type="submit" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
                    <i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
            <a href="{{ url('/post/create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Tambah Postingan</a>
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Cover</th>
                        <th>Title</th>
                        <th>Article</th>
                        <th>Author</th>
                        <th>Category</th>
                        <th>Tags</th>
                        <th>Date</th>
                        <th>Views</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @php($no = $data->perPage() * $data->currentPage() - $data->perPage() + 1) --}}
                    @foreach ($data as $post)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><img src="{{ url('storage/'.$post->file) }}" class="thumbnail" style="max-width:100px"></td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->article }}</td>
                        <td>{{ $post->author->display_name }}</td>
                        <td>{{ $post->category->name_clean }}</td>
                        <td>
                            @foreach ($post->tags as $tag)
                                <span class="label label-success">{{$tag->name}}</span>
                            @endforeach
                        </td>
                        <td>{{ $post->date }}</td>
                        <td>{{ $post->views }}</td>
                        <td>
                            <form action="/post/{{ $post->id }}" method="post" class="d-inline">
                                <a href="/post/{{ $post->id }}/edit" class="btn btn-primary"><i class="fas fa-edit">
                                        Edit</i></a>
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Anda yakin ingin menghapus data ?');"><i
                                        class="fas fa-trash"> Delete</i></button>
                            </form>
                        </td>
                    </tr>
                    {{-- @php($no++) --}}
                    @endforeach
            </table>
        </div>
        {{-- {{$data->links()}} --}}
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
@endpush
  