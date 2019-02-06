@extends('layouts.app')

@section('content')

<div class="card">
  <div class="card-header">Trashed Services</div>
  <div class="card-body">

    <table class="table table-hover">
      <thead>
        <th>
          Service Url
        </th>
          <th>
            Service Type
          </th>
        <th>
          Restore
        </th>
        <th>
          Delete
        </th>
      </thead>
      <tbody>
        @if($services->count() > 0)

          @foreach($services as $service)
            <tr>
              <td>
                {{ $service->serviceUrl }}
              </td>
              <td>
                {{ $service->serviceType }}
              </td>
              <td>
                <a href="{{ route('service.restore', ['id' => $service->id]) }}" class="btn btn-sm btn-success">Restore</a>
              </td>
              <td>
                <a href="{{ route('service.kill', ['id' => $service->id]) }}" class="btn btn-sm btn-danger">Delete</a>
              </td>
            </tr>
          @endforeach

        @else

          <tr>
            <th colspan="5" class="text-center">
              No services
            </th>
          </tr>

        @endif

      </tbody>
    </table>
  </div>
</div>

@stop
