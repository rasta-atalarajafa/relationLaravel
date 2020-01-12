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
                    <th>Name</th>
                    <th>Name_clean</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @php($no =$category->perPage() *$category->currentPage() -$category->perPage() + 1)
                  @foreach ($category as $item)
                  <tr>
                    <td>{{ $no }}</td>
                    <td> {{ $item->name }} </td>
                    <td> {{ $item->name_clean }} </td>
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
            {{$category->links()}}
            <!-- /.box-body -->
          </div>
          @endsection