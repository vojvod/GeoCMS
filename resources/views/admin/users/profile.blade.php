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
