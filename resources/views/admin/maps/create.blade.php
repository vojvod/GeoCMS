@extends('layouts.app')

@section('content')

@include('admin.includes.errors')

<div class="card">
  <div class="card-header">Create New Map</div>
  <div class="card-body">
      <form action="{{ route('map.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="category">Map category</label>
          <select class="form-control" name="category_id" id="category" >
              @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }} </option>
              @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="tags">Select tags</label>
          @foreach($tags as $tag)
            <div class="checkbox">
              <label><input type="checkbox" name="tags[]" value="{{ $tag->id }}" />{{ $tag->tag }}</label>
            </div>
          @endforeach
        </div>
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" name="title" required>
        </div>
        <div class="form-group">
          <label for="featured">Featured image</label>
          <input type="file" class="form-control" name="featured" required>
        </div>
        <div class="form-group">
          <label for="content">Content</label>
          <textarea id="content" cols="5" rows="10" class="form-control" name="content"></textarea>
        </div>
        <div class="form-group">
          <div class="text-center">
            <button type="submit" class="btn btn-success">Store Map</button>
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
      selector: 'textarea#content',
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
