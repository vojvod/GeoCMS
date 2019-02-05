@extends('layouts.app')

@section('content')

@include('admin.includes.errors')

<div class="card">
  <div class="card-header">Edit your profile</div>
  <div class="card-body">
      <form action="{{ route('user.profile.update') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" name="name" value="{{ $user->name }}">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" value="{{ $user->email }}">
        </div>
        <div class="form-group">
          <label for="password">New Password</label>
          <input type="password" class="form-control" name="password" >
        </div>
        <div class="form-group">
          <label for="avatar">Upload new avatar</label>
          <input type="file" class="form-control" name="avatar" >
        </div>
        <div class="form-group">
          <label for="facebook">Facebook profile</label>
          <input type="text" class="form-control" name="facebook" value="{{ $user->profile->facebook }}">
        </div>
        <div class="form-group">
          <label for="youtube">Youtube profile</label>
          <input type="text" class="form-control" name="youtube" value="{{ $user->profile->youtube }}">
        </div>
        <div class="form-group">
          <label for="about">About you</label>
          <textarea id="about" cols="6" rows="6" type="text" class="form-control" name="about" >{{ $user->profile->about }}</textarea>
        </div>
        <div class="form-group">
          <div class="text-center">
            <button type="submit" class="btn btn-success">Update Profile</button>
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
