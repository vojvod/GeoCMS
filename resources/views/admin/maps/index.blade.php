@extends('layouts.app')

@section('content')

<div class="card">
  <div class="card-header">Maps</div>
  <div class="card-body">

    <table class="table table-hover">
      <thead>
        <th>
          Image
        </th>
          <th>
            Title
          </th>
        <th>
          Edit
        </th>
        <th>
          Trash
        </th>
      </thead>
      <tbody>
          @foreach($maps as $map)
            <tr>
              <td>
                <img src="{{ $map->getFeaturedAttribure($map->featured) }}" alt="{{ $map->title }}" width="80px" height="50px"/>
              </td>
              <td>
                {{ $map->title }}
              </td>
              <td>
                <a href="{{ route('map.edit', ['id' => $map->id]) }}" class="btn btn-sm btn-info">Edit</a>
              </td>
              <td>
                <a href="{{ route('map.delete', ['id' => $map->id]) }}" class="btn btn-sm btn-danger">Trash</a>
              </td>
            </tr>
          @endforeach
      </tbody>
    </table>
  </div>
</div>

@stop
