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
          Restore
        </th>
        <th>
          Destroy
        </th>
      </thead>
      <tbody>
        @if($maps->count() > 0)

          @foreach($maps as $map)
            <tr>
              <td>
                <img src="{{ $map->getFeaturedAttribure($map->featured) }}" alt="{{ $map->title }}" width="80px" height="50px"/>
              </td>
              <td>
                {{ $map->title }}
              </td>
              <td>
                <a href="{{ route('map.restore', ['id' => $map->id]) }}" class="btn btn-sm btn-success">Restore</a>
              </td>
              <td>
                <a href="{{ route('map.kill', ['id' => $map->id]) }}" class="btn btn-sm btn-danger">Delete</a>
              </td>
            </tr>
          @endforeach

        @else

          <tr>
            <th colspan="5" class="text-center">
              No trashed maps
            </th>
          </tr>

        @endif

      </tbody>
    </table>
  </div>
</div>

@stop
