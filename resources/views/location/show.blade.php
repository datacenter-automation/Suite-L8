<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ isset($location->name) ? $location->name : 'Location' }}
    </h2>
  </x-slot>
  <div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($location->name) ? $location->name : 'Location' }}</h4>
        </span>

      <div class="pull-right">

        <form method="POST" action="{!! route('location.destroy', $location->id) !!}" accept-charset="UTF-8">
          <input name="_method" value="DELETE" type="hidden">
          {{ csrf_field() }}
          <div class="btn-group btn-group-sm" role="group">
            <a href="{{ route('location.index') }}" class="btn btn-primary" title="Show All Location">
              <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
            </a>

            <a href="{{ route('location.create') }}" class="btn btn-success" title="Create New Location">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </a>

            <a href="{{ route('location.edit', $location->id ) }}" class="btn btn-primary" title="Edit Location">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a>

            <button type="submit" class="btn btn-danger" title="Delete Location"
                    onclick="return confirm(&quot;Click Ok to delete Location.?&quot;)">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
          </div>
        </form>

      </div>

    </div>

    <div class="panel-body">
      <dl class="dl-horizontal">
        <dt>Location Group</dt>
        <dd>{{ optional($location->LocationGroup)->name }}</dd>
        <dt>Name</dt>
        <dd>{{ $location->name }}</dd>
        <dt>Description</dt>
        <dd>{{ $location->description }}</dd>
        <dt>Deleted At</dt>
        <dd>{{ $location->deleted_at }}</dd>
        <dt>Created At</dt>
        <dd>{{ $location->created_at }}</dd>
        <dt>Updated At</dt>
        <dd>{{ $location->updated_at }}</dd>

      </dl>

    </div>
  </div>
</x-app-layout>
