@extends('templates.base')

@section('content')
    
<section class="content-header">
  <h1>
    Data Penulis
  </h1>
</section>

<!-- Main content -->
<section class="content">
  
<div class="box">
  <a href="/author/create" class="btn btn-primary">+ Tambah data</a>
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
                    <th>Display Name</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @php($no = $author->perPage() * $author->currentPage() - $author->perPage() + 1)
                  @foreach ($author as $item)
                  <tr>
                    <td>{{ $no }}</td>
                    <td> {{ $item->display_name }} </td>
                    <td> {{ $item->first_name }} </td>
                    <td> {{ $item->last_name }} </td>
                    <td>
                      <form action="/author/{{ $item->id }}" method="author" class="d-inline">
                      <a href="/author/{{ $item->id }}/edit" type="submit" class="btn btn-primary">
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
            {{$author->links()}}
            <!-- /.box-body -->
          </div>
          @endsection