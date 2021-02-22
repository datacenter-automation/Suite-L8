@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($locationGroup->name) ? $locationGroup->name : 'Location Group' }}</h4>
        </span>

      <div class="pull-right">

        <form method="POST" action="{!! route('location_groups.location_group.destroy', $locationGroup->id) !!}"
              accept-charset="UTF-8">
          <input name="_method" value="DELETE" type="hidden">
          {{ csrf_field() }}
          <div class="btn-group btn-group-sm" role="group">
            <a href="{{ route('location_groups.location_group.index') }}" class="btn btn-primary"
               title="Show All Location Group">
              <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
            </a>

            <a href="{{ route('location_groups.location_group.create') }}" class="btn btn-success"
               title="Create New Location Group">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </a>

            <a href="{{ route('location_groups.location_group.edit', $locationGroup->id ) }}" class="btn btn-primary"
               title="Edit Location Group">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a>

            <button type="submit" class="btn btn-danger" title="Delete Location Group"
                    onclick="return confirm(&quot;Click Ok to delete Location Group.?&quot;)">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
          </div>
        </form>

      </div>

    </div>

    <div class="panel-body">
      <dl class="dl-horizontal">
        <dt>Name</dt>
        <dd>{{ $locationGroup->name }}</dd>
        <dt>Description</dt>
        <dd>{{ $locationGroup->description }}</dd>
        <dt>Deleted At</dt>
        <dd>{{ $locationGroup->deleted_at }}</dd>
        <dt>Created At</dt>
        <dd>{{ $locationGroup->created_at }}</dd>
        <dt>Updated At</dt>
        <dd>{{ $locationGroup->updated_at }}</dd>

      </dl>

    </div>
  </div>

@endsection
