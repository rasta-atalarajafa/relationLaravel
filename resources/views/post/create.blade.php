@extends('templates.base')

@section('content')
<section class="content-header">
    <h1>
      Tambah Data Postingan
    </h1>
  </section>
  
  <!-- Main content -->
  <section class="content">
<form method="POST" action="/post" role="form">
    @csrf
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Enter Title" name="title" value="{{ old('title') }}">
        @error('title')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="article">Article</label>
        <input type="text" class="form-control @error('article') is-invalid @enderror" id="First name" placeholder="Enter Article" name="article" value="{{ old('article') }}">
        @error('article')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="title_clean">Title Clean</label>
        <input type="text" class="form-control @error('title_clean') is-invalid @enderror" id="title_clean" placeholder="Enter Title Clean" name="title_clean" value="{{ old('title_clean') }}">
        @error('title_clean')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="file">File</label>
        <input type="text" class="form-control @error('file') is-invalid @enderror" id="file" placeholder="Enter File" name="file" value="{{ old('file') }}">
        @error('file')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="author_id">Author Id</label>
        <input type="text" class="form-control @error('author_id') is-invalid @enderror" id="author_id" placeholder="Enter Author Id" name="author_id" value="{{ old('author_id') }}">
        @error('author_id')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="banner_image">Banner Image</label>
        <input type="text" class="form-control @error('banner_image') is-invalid @enderror" id="banner_image" placeholder="Enter Banner Image" name="banner_image" value="{{ old('banner_image') }}">
        @error('banner_image')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="views">Views</label>
        <input type="text" class="form-control @error('views') is-invalid @enderror" id="views" placeholder="Enter Views" name="views" value="{{ old('views') }}">
        @error('views')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Tambah Data!</button>
</form>
@endsection