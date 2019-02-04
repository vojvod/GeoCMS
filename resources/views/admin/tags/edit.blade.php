@extends('layouts.app')

@section('content')

@include('admin.includes.errors')

<div class="card">
  <div class="card-header">Edit tag: {{ $tag->tag }}</div>
  <div class="card-body">
      <form action="{{ route('tag.update', ['id' => $tag->id]) }}" method="post">
        @csrf
        <div class="form-group">
          <label for="tag">Tag</label>
          <input type="text" class="form-control" name="tag" value="{{$tag->tag}}">
        </div>
        <div class="form-group">
          <div class="text-center">
            <button type="submit" class="btn btn-success">Update Tag</button>
          </div>
        </div>
      </form>
  </div>
</div>


@endsection
