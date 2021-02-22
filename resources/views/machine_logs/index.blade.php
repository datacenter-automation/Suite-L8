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
        <h4 class="mt-5 mb-5">Machine Logs</h4>
      </div>

      <div class="btn-group btn-group-sm pull-right" role="group">
        <a href="{{ route('machine_logs.machine_log.create') }}" class="btn btn-success" title="Create New Machine Log">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </a>
      </div>

    </div>

    @if(count($machineLogs) == 0)
      <div class="panel-body text-center">
        <h4>No Machine Logs Available.</h4>
      </div>
    @else
      <div class="panel-body panel-body-with-table">
        <div class="table-responsive">

          <table class="table table-striped ">
            <thead>
            <tr>
              <th>Machine</th>
              <th>User</th>

              <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($machineLogs as $machineLog)
              <tr>
                <td>{{ optional($machineLog->Machine)->name }}</td>
                <td>{{ optional($machineLog->User)->name }}</td>

                <td>

                  <form method="POST" action="{!! route('machine_logs.machine_log.destroy', $machineLog->id) !!}"
                        accept-charset="UTF-8">
                    <input name="_method" value="DELETE" type="hidden">
                    {{ csrf_field() }}

                    <div class="btn-group btn-group-xs pull-right" role="group">
                      <a href="{{ route('machine_logs.machine_log.show', $machineLog->id ) }}" class="btn btn-info"
                         title="Show Machine Log">
                        <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                      </a>
                      <a href="{{ route('machine_logs.machine_log.edit', $machineLog->id ) }}" class="btn btn-primary"
                         title="Edit Machine Log">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                      </a>

                      <button type="submit" class="btn btn-danger" title="Delete Machine Log"
                              onclick="return confirm(&quot;Click Ok to delete Machine Log.&quot;)">
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
        {!! $machineLogs->render() !!}
      </div>

    @endif

  </div>
@endsection
