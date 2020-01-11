@extends('templates.base')

@section('title','Author')
    
@section('content')
<section class="content-header">
    <h1>
      Data Author
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
        <a href="{{ url('/post/create') }}" class="btn btn-success"><i class="fas fa-plus"> Tambah Author</i></a>        
        <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Display_Name</th>
                    <th>First_Name</th>
                    <th>Last_Name</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @php($no = $data->perPage() * $data->currentPage() - $data->perPage() + 1)
                  @foreach ($data as $author)
                  <tr>
                    <td>{{ $no }}</td>
                    <td>{{$author->display_name}}</td>
                    <td>{{$author->first_name}}</td>
                    <td>{{$author->last_name}}</td>
                    <td>
                      <form action="/author/{{ $author->id }}" method="post" class="d-inline">
                      <a href="/author/{{ $author->id }}/edit" type="submit" class="btn btn-primary">
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