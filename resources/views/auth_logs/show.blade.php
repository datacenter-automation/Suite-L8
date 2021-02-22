@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Auth Log' }}</h4>
        </span>

      <div class="pull-right">

        <form method="POST" action="{!! route('auth_logs.auth_log.destroy', $authLog->id) !!}" accept-charset="UTF-8">
          <input name="_method" value="DELETE" type="hidden">
          {{ csrf_field() }}
          <div class="btn-group btn-group-sm" role="group">
            <a href="{{ route('auth_logs.auth_log.index') }}" class="btn btn-primary" title="Show All Auth Log">
              <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
            </a>

            <a href="{{ route('auth_logs.auth_log.create') }}" class="btn btn-success" title="Create New Auth Log">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </a>

            <a href="{{ route('auth_logs.auth_log.edit', $authLog->id ) }}" class="btn btn-primary"
               title="Edit Auth Log">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a>

            <button type="submit" class="btn btn-danger" title="Delete Auth Log"
                    onclick="return confirm(&quot;Click Ok to delete Auth Log.?&quot;)">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
          </div>
        </form>

      </div>

    </div>

    <div class="panel-body">
      <dl class="dl-horizontal">
        <dt>User</dt>
        <dd>{{ optional($authLog->User)->name }}</dd>
        <dt>Blame On User</dt>
        <dd>{{ optional($authLog->User)->name }}</dd>
        <dt>Ip Address</dt>
        <dd>{{ $authLog->ip_address }}</dd>
        <dt>Session</dt>
        <dd>{{ optional($authLog->session)->id }}</dd>
        <dt>User Agent</dt>
        <dd>{{ $authLog->user_agent }}</dd>
        <dt>Killed From Console</dt>
        <dd>{{ ($authLog->killed_from_console) ? 'Yes' : 'No' }}</dd>
        <dt>Logged Out At</dt>
        <dd>{{ $authLog->logged_out_at }}</dd>
        <dt>Created At</dt>
        <dd>{{ $authLog->created_at }}</dd>
        <dt>Updated At</dt>
        <dd>{{ $authLog->updated_at }}</dd>

      </dl>

    </div>
  </div>

@endsection
