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
        <h4 class="mt-5 mb-5">Ticket Logs</h4>
      </div>

      <div class="btn-group btn-group-sm pull-right" role="group">
        <a href="{{ route('ticket_logs.create') }}" class="btn btn-success" title="Create New Ticket Log">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </a>
      </div>

    </div>

    @if(count($ticketLogs) == 0)
      <div class="panel-body text-center">
        <h4>No Ticket Logs Available.</h4>
      </div>
    @else
      <div class="panel-body panel-body-with-table">
        <div class="table-responsive">

          <table class="table table-striped ">
            <thead>
            <tr>
              <th>Ticket</th>
              <th>User</th>

              <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($ticketLogs as $ticketLog)
              <tr>
                <td>{{ optional($ticketLog->Ticket)->content }}</td>
                <td>{{ optional($ticketLog->User)->name }}</td>

                <td>

                  <form method="POST" action="{!! route('ticket_logs.ticket_log.destroy', $ticketLog->id) !!}"
                        accept-charset="UTF-8">
                    <input name="_method" value="DELETE" type="hidden">
                    {{ csrf_field() }}

                    <div class="btn-group btn-group-xs pull-right" role="group">
                      <a href="{{ route('ticket_logs.ticket_log.show', $ticketLog->id ) }}" class="btn btn-info"
                         title="Show Ticket Log">
                        <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                      </a>
                      <a href="{{ route('ticket_logs.ticket_log.edit', $ticketLog->id ) }}" class="btn btn-primary"
                         title="Edit Ticket Log">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                      </a>

                      <button type="submit" class="btn btn-danger" title="Delete Ticket Log"
                              onclick="return confirm(&quot;Click Ok to delete Ticket Log.&quot;)">
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
        {!! $ticketLogs->render() !!}
      </div>

    @endif

  </div>
@endsection
