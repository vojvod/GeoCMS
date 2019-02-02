@extends('layouts.app')

@section('content')

@include('admin.includes.errors')

<div class="card">
  <div class="card-header">New Service</div>
  <div class="card-body">
      <form action="{{ route('service.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="serviceUrl">Service Url</label>
          <input type="url" class="form-control" name="serviceUrl" required>
        </div>
        <div class="form-group">
          <label for="serviceType">Service Type</label>
          <select class="form-control" name="serviceType">
            <option>WMS</option>
            <option>WFS</option>
          </select>
        </div>
        <div class="form-group">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="authenticationCheck" id="authenticationCheck" onclick="showUserPass()">
            <label class="form-check-label" for="authenticationCheck">
              Require Authentication
            </label>
          </div>
        </div>
        <div id="authenticationBlock" style="display: none">
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" >
          </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" name="password" >
            </div>
        </div>
        <div class="form-group">
          <div class="text-center">
            <button type="submit" class="btn btn-success">Store Service</button>
          </div>
        </div>
      </form>
  </div>
</div>

<script>
  function showUserPass(){
    var checkbox = document.getElementById('authenticationCheck');
    var authenticationBlock = document.getElementById('authenticationBlock');
    if (checkbox.checked == true){
      authenticationBlock.style.display = "block";
    } else {
      authenticationBlock.style.display = "none";
    }
  }

</script>

@endsection
