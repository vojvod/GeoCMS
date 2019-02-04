@extends('layouts.app')

@section('content')

@include('admin.includes.errors')

<div class="card">
  <div class="card-header">Create a new user</div>
  <div class="card-body">
      <form action="{{ route('user.store') }}" method="post">
        @csrf
        <div class="form-group">
          <label for="name">User</label>
          <input type="text" class="form-control" name="name" required>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" required>
        </div>
        <div class="form-group">
          <div class="text-center">
            <button type="submit" class="btn btn-success">Add User</button>
          </div>
        </div>
      </form>
  </div>
</div>


@endsection
