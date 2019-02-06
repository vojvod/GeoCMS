@extends('layouts.app')

@section('content')

@include('admin.includes.errors')

<div class="card">
  <div class="card-header">Edit Service: {{ $service->serviceUrl }}</div>
  <div class="card-body">
      <form action="{{ route('service.update', ['id' => $service->id ]) }}" method="post">
        @csrf
        <div class="form-group">
          <label for="serviceUrl">Service Url</label>
          <input type="text" class="form-control" name="serviceUrl" value="{{ $service->serviceUrl }}" required>
        </div>
        <div class="form-group">
          <label for="serviceType">Service Type</label>
          <input type="text" class="form-control" name="serviceType" value="{{ $service->serviceType }}" required>
        </div>
        <div class="form-group">
          <label for="username">Service Username</label>
          <input type="text" class="form-control" name="username" value="{{ $service->username }}" >
        </div>
        <div class="form-group">
          <label for="password">Service Password</label>
          <input type="password" class="form-control" name="password" value="{{ $service->password }}" >
        </div>
        <div class="form-group">
          <div class="text-center">
            <button type="submit" class="btn btn-success">Update Service</button>
          </div>
        </div>
      </form>
  </div>
</div>

@endsection
