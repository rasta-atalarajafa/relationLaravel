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
            <form method="post" action="/post" role="form" enctype="multipart/form-data">
                @csrf
                <div class="box-body">
                    @include('post._form')
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

@push('css')
  {{-- select2 css --}}
  <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
  {{-- date-picker css --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha256-siyOpF/pBWUPgIcQi17TLBkjvNgNQArcmwJB8YvkAgg=" crossorigin="anonymous" />
  {{-- summernote --}}
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote.min.css" rel="stylesheet">
  <style>
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: darkseagreen;
        border: 1px solid #fff;
        border-radius: 4px;
        cursor: default;
        float: left;
        margin-right: 5px;
        margin-top: 5px;
        padding: 0 5px;
    }
    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
        color: white;
        cursor: pointer;
        display: inline-block;
        font-weight: bold;
        margin-right: 2px;
    }
    .btn-default {
        background-color: #8fbc8f;
        color: #fff;
        border-color: #fff;
    }
    .form-control {
        border-radius: 0;
        box-shadow: none;
        border-color: #aaaaaa;
    }
  </style>
@endpush

@push('js')
  {{-- select2 js --}}
  <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
  {{-- datepicker --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha256-bqVeqGdJ7h/lYPq6xrPv/YGzMEb6dNxlfiTUHSgRCp8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.id.min.js" integrity="sha256-NNMNW7d0OGoiO4RqoKSdLCcr+0E6rgu1hqzpYkh5BIM=" crossorigin="anonymous"></script>
  {{-- summernote --}}
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote.min.js"></script>
  {{-- filestyle --}}
  <script src="{{ asset('plugins/bootstrap-filestyle.min.js') }}"> </script>
  <script>
    // s
    $(document).ready(function() {
      // init select2
      $('.select2').select2();
      $('.select2-tag').select2({
        placeholder: 'Pilih Tag',
        tags: true
      });

      // init datepicker
      $('.datepicker').datepicker({
        language: 'id',
        format: 'dd MM yyyy',
        todayHighlight: true
      });

      // init summernote
      $('#article').summernote({
        placeholder: 'Silahkan Tulis Artikel Disini...',
        height: 200
      });

      // init filesttyle
      $(":file").filestyle({
        buttonText: "Pilih Cover"
      });
    });
  </script>
@endpush