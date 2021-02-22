@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($machineType->name) ? $machineType->name : 'Machine Type' }}</h4>
        </span>

      <div class="pull-right">

        <form method="POST" action="{!! route('machine_types.machine_type.destroy', $machineType->id) !!}"
              accept-charset="UTF-8">
          <input name="_method" value="DELETE" type="hidden">
          {{ csrf_field() }}
          <div class="btn-group btn-group-sm" role="group">
            <a href="{{ route('machine_types.machine_type.index') }}" class="btn btn-primary"
               title="Show All Machine Type">
              <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
            </a>

            <a href="{{ route('machine_types.machine_type.create') }}" class="btn btn-success"
               title="Create New Machine Type">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </a>

            <a href="{{ route('machine_types.machine_type.edit', $machineType->id ) }}" class="btn btn-primary"
               title="Edit Machine Type">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a>

            <button type="submit" class="btn btn-danger" title="Delete Machine Type"
                    onclick="return confirm(&quot;Click Ok to delete Machine Type.?&quot;)">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
          </div>
        </form>

      </div>

    </div>

    <div class="panel-body">
      <dl class="dl-horizontal">
        <dt>Name</dt>
        <dd>{{ $machineType->name }}</dd>
        <dt>Deleted At</dt>
        <dd>{{ $machineType->deleted_at }}</dd>
        <dt>Created At</dt>
        <dd>{{ $machineType->created_at }}</dd>
        <dt>Updated At</dt>
        <dd>{{ $machineType->updated_at }}</dd>

      </dl>

    </div>
  </div>

@endsection
