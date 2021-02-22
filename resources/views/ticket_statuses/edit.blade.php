@extends('layouts.app')

@section('content')

  <div class="panel panel-default">

    <div class="panel-heading clearfix">

      <div class="pull-left">
        <h4 class="mt-5 mb-5">{{ !empty($ticketStatus->name) ? $ticketStatus->name : 'Ticket Status' }}</h4>
      </div>
      <div class="btn-group btn-group-sm pull-right" role="group">

        <a href="{{ route('ticket_statuses.ticket_status.index') }}" class="btn btn-primary"
           title="Show All Ticket Status">
          <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
        </a>

        <a href="{{ route('ticket_statuses.ticket_status.create') }}" class="btn btn-success"
           title="Create New Ticket Status">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </a>

      </div>
    </div>

    <div class="panel-body">

      @if ($errors->any())
        <ul class="alert alert-danger">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      @endif

      <form method="POST" action="{{ route('ticket_statuses.ticket_status.update', $ticketStatus->id) }}"
            id="edit_ticket_status_form" name="edit_ticket_status_form" accept-charset="UTF-8" class="form-horizontal">
        {{ csrf_field() }}
        <input name="_method" type="hidden" value="PUT">
        @include ('ticket_statuses.form', [
                                    'ticketStatus' => $ticketStatus,
                                  ])

        <div class="form-group">
          <div class="col-md-offset-2 col-md-10">
            <input class="btn btn-primary" type="submit" value="Update">
          </div>
        </div>
      </form>

    </div>
  </div>

@endsection
