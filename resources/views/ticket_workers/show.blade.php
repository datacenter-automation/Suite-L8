@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Ticket Worker' }}</h4>
        </span>

      <div class="pull-right">

        <form method="POST" action="{!! route('ticket_workers.ticket_worker.destroy', $ticketWorker->id) !!}"
              accept-charset="UTF-8">
          <input name="_method" value="DELETE" type="hidden">
          {{ csrf_field() }}
          <div class="btn-group btn-group-sm" role="group">
            <a href="{{ route('ticket_workers.ticket_worker.index') }}" class="btn btn-primary"
               title="Show All Ticket Worker">
              <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
            </a>

            <a href="{{ route('ticket_workers.ticket_worker.create') }}" class="btn btn-success"
               title="Create New Ticket Worker">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </a>

            <a href="{{ route('ticket_workers.ticket_worker.edit', $ticketWorker->id ) }}" class="btn btn-primary"
               title="Edit Ticket Worker">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a>

            <button type="submit" class="btn btn-danger" title="Delete Ticket Worker"
                    onclick="return confirm(&quot;Click Ok to delete Ticket Worker.?&quot;)">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
          </div>
        </form>

      </div>

    </div>

    <div class="panel-body">
      <dl class="dl-horizontal">
        <dt>Ticket</dt>
        <dd>{{ optional($ticketWorker->Ticket)->content }}</dd>
        <dt>User</dt>
        <dd>{{ optional($ticketWorker->User)->name }}</dd>
        <dt>Deleted At</dt>
        <dd>{{ $ticketWorker->deleted_at }}</dd>
        <dt>Created At</dt>
        <dd>{{ $ticketWorker->created_at }}</dd>
        <dt>Updated At</dt>
        <dd>{{ $ticketWorker->updated_at }}</dd>

      </dl>

    </div>
  </div>

@endsection
