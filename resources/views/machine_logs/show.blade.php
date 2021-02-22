@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Machine Log' }}</h4>
        </span>

      <div class="pull-right">

        <form method="POST" action="{!! route('machine_logs.machine_log.destroy', $machineLog->id) !!}"
              accept-charset="UTF-8">
          <input name="_method" value="DELETE" type="hidden">
          {{ csrf_field() }}
          <div class="btn-group btn-group-sm" role="group">
            <a href="{{ route('machine_logs.machine_log.index') }}" class="btn btn-primary"
               title="Show All Machine Log">
              <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
            </a>

            <a href="{{ route('machine_logs.machine_log.create') }}" class="btn btn-success"
               title="Create New Machine Log">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </a>

            <a href="{{ route('machine_logs.machine_log.edit', $machineLog->id ) }}" class="btn btn-primary"
               title="Edit Machine Log">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a>

            <button type="submit" class="btn btn-danger" title="Delete Machine Log"
                    onclick="return confirm(&quot;Click Ok to delete Machine Log.?&quot;)">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
          </div>
        </form>

      </div>

    </div>

    <div class="panel-body">
      <dl class="dl-horizontal">
        <dt>Machine</dt>
        <dd>{{ optional($machineLog->Machine)->name }}</dd>
        <dt>User</dt>
        <dd>{{ optional($machineLog->User)->name }}</dd>
        <dt>Content</dt>
        <dd>{{ $machineLog->content }}</dd>
        <dt>Deleted At</dt>
        <dd>{{ $machineLog->deleted_at }}</dd>
        <dt>Created At</dt>
        <dd>{{ $machineLog->created_at }}</dd>
        <dt>Updated At</dt>
        <dd>{{ $machineLog->updated_at }}</dd>

      </dl>

    </div>
  </div>

@endsection
