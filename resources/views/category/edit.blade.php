@extends('templates.base')

@section('content')
<section class="content-header">
    <h1>
      Ubah Data Penulis
    </h1>
  </section>
  
  <!-- Main content -->
  <section class="content">
  <form method="POST" action="/category/{{$category->id}}" role="form">
    @method('patch')
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter Name" name="name" value="{{ $category->name }}">
        @error('name')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="name_clean">Name Clean</label>
        <input type="text" class="form-control @error('name_clean') is-invalid @enderror" id="name clean" placeholder="Enter Name" name="name clean" value="{{ $category->name_clean }}">
        @error('name_clean')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Ubah Data!</button>
</form>
@endsection