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
          @foreach($maps as $map)
            <tr>
              <td>
                <img src="{{ $map->featured }}" alt="{{ $map->title }}" width="50px" height="80px"/>
              </td>
              <td>
                {{ $map->title }}
              </td>
              <td>
                <a href="{{ route('map.restore', ['id' => $map->id]) }}" class="btn btn-xs btn-success">Restore</a>
              </td>
              <td>
                <a href="{{ route('map.kill', ['id' => $map->id]) }}" class="btn btn-xs btn-danger">Delete</a>
              </td>
            </tr>
          @endforeach
      </tbody>
    </table>
  </div>
</div>

@stop
