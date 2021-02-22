@extends('layouts.app')

@section('content')

  @if(Session::has('success_message'))
    <div class="alert alert-success">
      <span class="glyphicon glyphicon-ok"></span>
      {!! session('success_message') !!}

      <button type="button" class="close" data-dismiss="alert" aria-label="close">
        <span aria-hidden="true">&times;</span>
      </button>

    </div>
  @endif

  <div class="panel panel-default">

    <div class="panel-heading clearfix">

      <div class="pull-left">
        <h4 class="mt-5 mb-5">Auth Logs</h4>
      </div>

      <div class="btn-group btn-group-sm pull-right" role="group">
        <a href="{{ route('auth_logs.auth_log.create') }}" class="btn btn-success" title="Create New Auth Log">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </a>
      </div>

    </div>

    @if(count($authLogs) == 0)
      <div class="panel-body text-center">
        <h4>No Auth Logs Available.</h4>
      </div>
    @else
      <div class="panel-body panel-body-with-table">
        <div class="table-responsive">

          <table class="table table-striped ">
            <thead>
            <tr>
              <th>User</th>
              <th>Blame On User</th>
              <th>Ip Address</th>
              <th>Session</th>

              <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($authLogs as $authLog)
              <tr>
                <td>{{ optional($authLog->User)->name }}</td>
                <td>{{ optional($authLog->User)->name }}</td>
                <td>{{ $authLog->ip_address }}</td>
                <td>{{ optional($authLog->session)->id }}</td>

                <td>

                  <form method="POST" action="{!! route('auth_logs.auth_log.destroy', $authLog->id) !!}"
                        accept-charset="UTF-8">
                    <input name="_method" value="DELETE" type="hidden">
                    {{ csrf_field() }}

                    <div class="btn-group btn-group-xs pull-right" role="group">
                      <a href="{{ route('auth_logs.auth_log.show', $authLog->id ) }}" class="btn btn-info"
                         title="Show Auth Log">
                        <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                      </a>
                      <a href="{{ route('auth_logs.auth_log.edit', $authLog->id ) }}" class="btn btn-primary"
                         title="Edit Auth Log">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                      </a>

                      <button type="submit" class="btn btn-danger" title="Delete Auth Log"
                              onclick="return confirm(&quot;Click Ok to delete Auth Log.&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                      </button>
                    </div>

                  </form>

                </td>
              </tr>
            @endforeach
            </tbody>
          </table>

        </div>
      </div>

      <div class="panel-footer">
        {!! $authLogs->render() !!}
      </div>

    @endif

  </div>
@endsection
