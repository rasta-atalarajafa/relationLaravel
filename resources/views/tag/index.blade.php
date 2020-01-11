@extends('templates.base')

@section('title','Data Postingan')
    
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
                    <th>Post_ID</th>
                    <th>Tag</th>
                    <th>Tag_Clean</th>
                  </tr>
                </thead>
                <tbody>
                  @php($no = $data->perPage() * $data->currentPage() - $data->perPage() + 1)
                  @foreach ($data as $tag)
                  <tr>
                    <td>{{ $no }}</td>
                    <td>{{$tag->post->title}}</td>
                    <td>{{$tag->tag}}</td>
                    <td>{{$tag->tag_clean}}</td>
                    <td>
                      <form action="/tag/{{ $tag->id }}" method="post" class="d-inline">
                      <a href="/tag/{{ $tag->id }}/edit" type="submit" class="btn btn-primary">
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