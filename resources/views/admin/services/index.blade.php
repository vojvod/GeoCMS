@extends('layouts.app')

@section('content')

<div class="card">
  <div class="card-header">Services</div>
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
          Edit
        </th>
        <th>
          Trash
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
                <a href="{{ route('service.edit', ['id' => $service->id]) }}" class="btn btn-sm btn-info">Edit</a>
              </td>
              <td>
                <a href="{{ route('service.delete', ['id' => $service->id]) }}" class="btn btn-sm btn-danger">Trash</a>
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
