@extends('layouts.app')

@section('content')

@include('admin.includes.errors')

<div class="card">
  <div class="card-header">Edit Map: {{ $map->title }}</div>
  <div class="card-body">
      <form action="{{ route('map.update', ['id' => $map->id ]) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="category">Map category</label>
          <select class="form-control" name="category_id" id="category" >
              @foreach($categories as $category)
                <option value="{{ $category->id }}"

                  @if($map->category->id == $category->id)
                    selected
                  @endif

                  >{{ $category->name }} </option>
              @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="tags">Select tags</label>
          @foreach($tags as $tag)
            <div class="checkbox">
              <label><input type="checkbox" name="tags[]" value="{{ $tag->id }}"

                  @foreach($map->tags as $t)
                    @if($tag->id == $t->id)
                       checked
                    @endif
                  @endforeach

                >{{ $tag->tag }}</label>
            </div>
          @endforeach
        </div>
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" name="title" value="{{ $map->title }}" required>
        </div>
        <div class="form-group">
          <label for="featured">Featured image</label>
          <input type="file" class="form-control" name="featured">
        </div>
        <div class="form-group">
          <label for="content">Content</label>
          <textarea id="content" cols="5" rows="10" class="form-control" name="content">{{ $map->content}}</textarea>
        </div>
        <div class="form-group">
          <div class="text-center">
            <button type="submit" class="btn btn-success">Update Map</button>
          </div>
        </div>
      </form>
  </div>
</div>

@endsection
