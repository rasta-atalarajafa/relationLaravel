@extends('templates.base')

@section('content')
<section class="content-header">
    <h1>
      Ubah Data Tag
    </h1>
  </section>
  
  <!-- Main content -->
  <section class="content">
  <form method="POST" action="/author/{{$author->id}}" role="form">
    @method('patch')
    @csrf
    <div class="form-group">
        <label for="display_name">Display Name</label>
        <input type="text" class="form-control @error('display_name') is-invalid @enderror" id="display_name" placeholder="Enter Name" name="display name" value="{{ $author->display_name }}">
        @error('display_name')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="first_name">First name</label>
        <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="First name" placeholder="Enter Name" name="first name" value="{{ $author->first_name }}">
        @error('first_name')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="last_name">Last name</label>
        <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" placeholder="Enter Name" name="last name" value="{{ $author->last_name }}">
        @error('last_name')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Tambah Data!</button>
</form>
@endsection