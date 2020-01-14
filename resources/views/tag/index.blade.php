@extends('templates.base')

@section('content')
    
<section class="content-header">
  <h1>
    Tag
  </h1>
</section>

<!-- Main content -->
<section class="content">
  
<div class="box">
  <a href="/tag/create" class="btn btn-primary">+ Tambah data</a>
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
                    <th>Post</th>
                    <th>Tag</th>
                    <th>Tag Clean</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @php($no = $tag->perPage() * $tag->currentPage() - $tag->perPage() + 1)
                  @foreach ($tag as $item)
                  <tr>
                    <td>{{ $no }}</td>
                    <td> {{ $item->post->article }} </td>
                    <td> {{ $item->tag }} </td>
                    <td> {{ $item->tag_clean }} </td>
                    <td>
                      <form action="/tag/{{ $item->id }}" method="tag" class="d-inline">
                      <a href="/tag/{{ $item->id }}/edit" type="submit" class="btn btn-primary">
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
            {{$tag->links()}}
            <!-- /.box-body -->
          </div>
          @endsection