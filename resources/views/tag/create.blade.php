@extends('templates.base')

@section('content')
<section class="content-header">
    <h1>
      Tambah Data Tag
    </h1>
  </section>
  
  <!-- Main content -->
  <section class="content">
<form method="post" action="/author">
    @csrf
    <div class="form-group">
        <label for="post_id">Post Id</label>
        <input type="text" class="form-control @error('post_id') is-invalid @enderror" id="post_id" placeholder="Post Id" name="post id" value="{{ old('post_id') }}">
        @error('post_id')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="tag">Tag</label>
        <input type="text" class="form-control @error('tag') is-invalid @enderror" id="tag" placeholder="Enter Tag" name="tag" value="{{ old('tag') }}">
        @error('tag')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="tag_clean">Tag Clean</label>
        <input type="text" class="form-control @error('tag_clean') is-invalid @enderror" id="tag_clean" placeholder="Enter Tag" name="tag clean" value="{{ old('tag_clean') }}">
        @error('tag_clean')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Tambah Data!</button>
</form>
@endsection