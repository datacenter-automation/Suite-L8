@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($ticketStatus->name) ? $ticketStatus->name : 'Ticket Status' }}</h4>
        </span>

      <div class="pull-right">

        <form method="POST" action="{!! route('ticket_statuses.ticket_status.destroy', $ticketStatus->id) !!}"
              accept-charset="UTF-8">
          <input name="_method" value="DELETE" type="hidden">
          {{ csrf_field() }}
          <div class="btn-group btn-group-sm" role="group">
            <a href="{{ route('ticket_statuses.ticket_status.index') }}" class="btn btn-primary"
               title="Show All Ticket Status">
              <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
            </a>

            <a href="{{ route('ticket_statuses.ticket_status.create') }}" class="btn btn-success"
               title="Create New Ticket Status">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </a>

            <a href="{{ route('ticket_statuses.ticket_status.edit', $ticketStatus->id ) }}" class="btn btn-primary"
               title="Edit Ticket Status">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a>

            <button type="submit" class="btn btn-danger" title="Delete Ticket Status"
                    onclick="return confirm(&quot;Click Ok to delete Ticket Status.?&quot;)">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
          </div>
        </form>

      </div>

    </div>

    <div class="panel-body">
      <dl class="dl-horizontal">
        <dt>Name</dt>
        <dd>{{ $ticketStatus->name }}</dd>
        <dt>Color</dt>
        <dd>{{ $ticketStatus->color }}</dd>
        <dt>Created At</dt>
        <dd>{{ $ticketStatus->created_at }}</dd>
        <dt>Updated At</dt>
        <dd>{{ $ticketStatus->updated_at }}</dd>

      </dl>

    </div>
  </div>

@endsection
