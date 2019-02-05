@extends('layouts.app')

@section('content')

@include('admin.includes.errors')

<div class="card">
  <div class="card-header">Edit GeoCMS Settings</div>
  <div class="card-body">
      <form action="{{ route('settings.update') }}" method="post">
        @csrf
        <div class="form-group">
          <label for="site_name">Site name</label>
          <input type="text" class="form-control" name="site_name" value="{{ $settings->site_name }}">
        </div>
        <div class="form-group">
          <label for="address">Address</label>
          <input type="text" class="form-control" name="address" value="{{ $settings->address }}">
        </div>
        <div class="form-group">
          <label for="contact_number">Contact phone</label>
          <input type="text" class="form-control" name="contact_number" value="{{ $settings->contact_number }}">
        </div>
        <div class="form-group">
          <label for="contact_email">Contact email</label>
          <input type="email" class="form-control" name="contact_email" value="{{ $settings->contact_email }}">
        </div>
        <div class="form-group">
          <label for="about">Contact email</label>
          <textarea id="about" cols="5" rows="10" class="form-control" name="about">{{ $settings->about }}</textarea>
        </div>
        <div class="form-group">
          <div class="text-center">
            <button type="submit" class="btn btn-success">Update site settings</button>
          </div>
        </div>
      </form>
  </div>
</div>

@endsection

@section('styles')
  <link href="https://www.tiny.cloud/css/codepen.min.css" rel="stylesheet">
@endsection

@section('scripts')
  <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=qagffr3pkuv17a8on1afax661irst1hbr4e6tbv888sz91jc"></script>
  <script>
    tinymce.init({
      selector: 'textarea#about',
      height: 500,
      menubar: false,
      plugins: [
        'advlist autolink lists link image charmap print preview anchor textcolor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table paste code help wordcount'
      ],
      toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
      content_css: [
        '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
        '//www.tiny.cloud/css/codepen.min.css'
      ]
    });
  </script>
@endsection
