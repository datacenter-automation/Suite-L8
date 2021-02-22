@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Ticket' }}</h4>
        </span>

      <div class="pull-right">

        <form method="POST" action="{!! route('tickets.ticket.destroy', $ticket->id) !!}" accept-charset="UTF-8">
          <input name="_method" value="DELETE" type="hidden">
          {{ csrf_field() }}
          <div class="btn-group btn-group-sm" role="group">
            <a href="{{ route('tickets.ticket.index') }}" class="btn btn-primary" title="Show All Ticket">
              <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
            </a>

            <a href="{{ route('tickets.ticket.create') }}" class="btn btn-success" title="Create New Ticket">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </a>

            <a href="{{ route('tickets.ticket.edit', $ticket->id ) }}" class="btn btn-primary" title="Edit Ticket">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a>

            <button type="submit" class="btn btn-danger" title="Delete Ticket"
                    onclick="return confirm(&quot;Click Ok to delete Ticket.?&quot;)">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
          </div>
        </form>

      </div>

    </div>

    <div class="panel-body">
      <dl class="dl-horizontal">
        <dt>User</dt>
        <dd>{{ optional($ticket->User)->name }}</dd>
        <dt>Status</dt>
        <dd>{{ optional($ticket->TicketStatus)->name }}</dd>
        <dt>Content</dt>
        <dd>{{ $ticket->content }}</dd>
        <dt>Read</dt>
        <dd>{{ $ticket->read }}</dd>
        <dt>Deleted At</dt>
        <dd>{{ $ticket->deleted_at }}</dd>
        <dt>Created At</dt>
        <dd>{{ $ticket->created_at }}</dd>
        <dt>Updated At</dt>
        <dd>{{ $ticket->updated_at }}</dd>

      </dl>

    </div>
  </div>

@endsection
