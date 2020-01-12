@extends('templates.base')

@section('title','Create')

@section('content')
<section class="content-header">
    <h1>
      Create Tables
      <small>it all starts here</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Examples</a></li>
      <li class="active">Tables</li>
    </ol>
  </section>
  
  <!-- Main content -->
  <section class="content">
  
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                  title="Collapse">
            <i class="fa fa-minus"></i></button>
          {{-- <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button> --}}
        </div>
      </div>
      <div class="box-body">
        <!-- form start -->
        <form method="post" action="/post" role="form">
            @csrf
            <div class="box-body">
              <div class="form-group">
                <label for="title">title</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Title" value="{{ old('title') }}" autocomplete="off">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="article">Article</label>
                <input type="text" name="article" class="form-control @error('article') is-invalid @enderror" id="article" placeholder="article" value="{{ old('article') }}" autocomplete="off">
                @error('article')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="title_clean">Title_Clean</label>
                <input type="text" name="title_clean" class="form-control @error('title_clean') is-invalid @enderror" id="title_clean" placeholder="title_clean" value="{{ old('title_clean') }}" autocomplete="off">
                @error('title_clean')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="file">File</label>
                <input type="text" name="file" class="form-control @error('file') is-invalid @enderror" id="file" placeholder="file" value="{{ old('file') }}" autocomplete="off">
                @error('file')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="author_id">Author</label>
                <input type="text" name="author_id" class="form-control @error('author_id') is-invalid @enderror" id="author_id" placeholder="author_id" value="{{ old('author_id') }}" autocomplete="off">
                @error('author_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="banner_image">Banner_Image</label>
                <input type="text" name="banner_image" class="form-control @error('banner_image') is-invalid @enderror" id="banner_image" placeholder="banner_image" value="{{ old('banner_image') }}" autocomplete="off">
                @error('banner_image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="views">Views</label>
                <input type="text" name="views" class="form-control @error('views') is-invalid @enderror" id="views" placeholder="views" value="{{ old('views') }}" autocomplete="off">
                @error('views')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        
      </div>
      <!-- /.box-footer-->
    </div>
    <!-- /.box -->
  
  </section>
@endsection