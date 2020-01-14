@extends('templates.base')

@section('content')

<section class="content">
    <section class="content-header">
      <h1>
        Ubah Data
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>
      <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title"></h3>
    
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                      title="Collapse">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
           
          </div>
          
         
          <div class="box-body">
            <!-- form start -->
            <form method="POST" action="/post/{{ $post->id }}" role="form">
            @method('patch')
              @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Enter Title" name="title" value="{{ $post->title }}" >
                  @error('title')
                    <div class="invalid-feedback">{{$message}}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="article">Article</label>
                  <input type="text" class="form-control @error('article') is-invalid @enderror" id="article" placeholder="Enter Article" name="article" value="{{ $post->article, }}" >
                  @error('article')
                    <div class="invalid-feedback">{{$message}}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="title_clean">Title Clean</label>
                  <input type="text" class="form-control @error('title_clean') is-invalid @enderror" id="title_clean" placeholder="Enter Title_clean" name="title_clean" value="{{ $post->title_clean,}}">
                  @error('title_clean')
                    <div class="invalid-feedback">{{$message}}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="file">File</label>
                  <input type="text" class="form-control @error('file') is-invalid @enderror" id="file" placeholder="Enter file" name="file" value="{{ $post->file, }}">
                  @error('file')
                    <div class="invalid-feedback">{{$message}}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="author_id">Author ID</label>
                  <input type="text" class="form-control @error('author_id') is-invalid @enderror" id="author_id" placeholder="Enter author_id" name="author_id" value="{{ $post->author_id, }}">
                  @error('author_id')
                    <div class="invalid-feedback">{{$message}}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="banner_image">Banner Image</label>
                  <input type="text" class="form-control @error('banner_image') is-invalid @enderror" id="banner_image" placeholder="Enter banner_image" name="banner_image" value="{{ $post->banner_image, }}">
                  @error('banner_image')
                    <div class="invalid-feedback">{{$message}}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="views">Views</label>
                  <input type="text" class="form-control @error('views') is-invalid @enderror" id="views" placeholder="Enter views" name="views" value="{{ $post->views}}">
                  @error('views')
                    <div class="invalid-feedback">{{$message}}</div>
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
            Footer
          </div>
          <!-- /.box-footer-->
        </div>
  </section>
    
@endsection