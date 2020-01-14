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
        <form method="post" action="/author" role="form">
            @csrf
            <div class="box-body">
              <div class="form-group">
                <label for="display_name">Display_Name</label>
                <input type="text" name="display_name" class="form-control @error('display_name') is-invalid @enderror" id="display_name" placeholder="display_name" value="{{ old('display_name') }}" autocomplete="off">
                @error('display_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="first_name">First_Name</label>
                <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" id="first_name" placeholder="first_name" value="{{ old('first_name') }}" autocomplete="off">
                @error('first_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="last_name">Last_Name</label>
                <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" id="last_name" placeholder="last_name" value="{{ old('last_name') }}" autocomplete="off">
                @error('last_name')
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