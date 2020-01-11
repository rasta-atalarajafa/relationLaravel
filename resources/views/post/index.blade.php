@extends('templates.base')

@section('content')
    
<section class="content-header">
  <h1>
    Data Post
  </h1>
</section>

<!-- Main content -->
<section class="content">
  
<div class="box">
  <a href="/post/create" class="btn btn-primary"><i class="fa fa-plus"> Tambah data</i></a>
  @if (session('status'))
      <div class="alert alert-success">
        {{session('status')}}
      </div>
  @endif
  <!-- /.box-header -->
            <div class="box-body">
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
                        <i class="fa fa-edit">Edit</i>
                      </a>
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger">
                          <i class="fa fa-trash">Delete</i>
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