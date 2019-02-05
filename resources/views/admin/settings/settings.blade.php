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
          <div class="text-center">
            <button type="submit" class="btn btn-success">Update site settings</button>
          </div>
        </div>
      </form>
  </div>
</div>


@endsection
