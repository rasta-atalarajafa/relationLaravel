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
  <a href="/penulis/create" class="btn btn-primary">+ Tambah data</a>
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
                    <th>Display_name</th>
                    <th>Fist_name</th>
                    <th>Last_name</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @php($no = $authors->perPage() * $authors->currentPage() - $authors->perPage() + 1)
                  @foreach ($authors as $item)
                  <tr>
                    <td>{{ $no }}</td>
                    <td> {{ $item->display_name }} </td>
                    <td> {{ $item->first_name }} </td>
                    <td> {{ $item->last_name }} </td>
                    <td>

                     

                      <form action="/penulis/{{ $item->id }}" method="post" class="d-inline">
                        <a href="/penulis/{{ $item->id }}/edit" type="submit" class="btn btn-primary">
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
            {{$authors->links()}}
            <!-- /.box-body -->
          </div>
          @endsection