@extends('templates.base')

@section('title','Daftar Barang')
    
@section('content')
<section class="content-header">
    <h1>
      Data Postingan
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
          <button type="submit" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fa fa-minus"></i></button>
          {{-- <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button> --}}
        </div>
      </div>
      <div class="box-body">
        <a href="{{ url('/post/create') }}" class="btn btn-success"><i class="fas fa-plus"> Tambah Postingan</i></a>        
        <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Article</th>
                    <th>Title_Clean</th>
                    <th>File</th>
                    <th>Author</th>
                    <th>Banner_Image</th>
                    <th>Views</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @php($no = $data->perPage() * $data->currentPage() - $data->perPage() + 1)
                  @foreach ($data as $post)
                  <tr>
                    <td>{{ $no }}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->article}}</td>
                    <td>{{$post->title_clean}}</td>
                    <td>{{$post->file}}</td>
                    <td>{{$post->author->display_name}}</td>
                    <td>{{$post->banner_image}}</td>
                    <td>{{$post->views}}</td>
                    <td>
                      <form action="/post/{{ $post->id }}" method="post" class="d-inline">
                      <a href="/post/{{ $post->id }}/edit" type="submit" class="btn btn-primary">
                        <i class="fas fa-edit">Edit</i>
                      </a>
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger">
                          <i class="fas fa-trash">Delete</i>
                        </button>
                      </form>
                    </td>
                  </tr>
                  @php($no++)
                  @endforeach
                </table>
            </div>
              {{$data->links()}}
            <!-- /.box-body -->
          </div>
          @endsection