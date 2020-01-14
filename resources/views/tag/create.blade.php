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
        <form method="post" action="/tag" role="form">
            @csrf
            <div class="box-body">
              <div class="form-group">
                <label for="post_id">Post_ID</label>
                <input type="text" name="post_id" class="form-control @error('post_id') is-invalid @enderror" id="post_id" placeholder="post_id" value="{{ old('post_id') }}" autocomplete="off">
                @error('post_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="tag">Tag</label>
                <input type="text" name="tag" class="form-control @error('tag') is-invalid @enderror" id="tag" placeholder="tag" value="{{ old('tag') }}" autocomplete="off">
                @error('tag')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="tag_clean">Tag_Clean</label>
                <input type="text" name="tag_clean" class="form-control @error('tag_clean') is-invalid @enderror" id="tag_clean" placeholder="tag_clean" value="{{ old('tag_clean') }}" autocomplete="off">
                @error('tag_clean')
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