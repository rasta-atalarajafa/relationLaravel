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
  <a href="/post/create" class="btn btn-primary">+ Tambah data</a>
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
                    <th>Title Clean</th>
                    <th>File</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @php($no = $post->perPage() * $post->currentPage() - $post->perPage() + 1)
                  @foreach ($post as $item)
                  <tr>
                    <td>{{ $no }}</td>
                    <td> {{ $item->title }} </td>
                    <td> {{ $item->article }} </td>
                    <td> {{ $item->title_clean }} </td>
                    <td> {{ $item->file }} </td>
                    <td>
                      <form action="/post/{{ $item->id }}" method="post" class="d-inline">
                      <a href="/post/{{ $item->id }}/edit" type="submit" class="btn btn-primary">
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
            {{$post->links()}}
            <!-- /.box-body -->
          </div>
          @endsection