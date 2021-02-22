@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Ticket Comment' }}</h4>
        </span>

      <div class="pull-right">

        <form method="POST" action="{!! route('ticket_comments.ticket_comment.destroy', $ticketComment->id) !!}"
              accept-charset="UTF-8">
          <input name="_method" value="DELETE" type="hidden">
          {{ csrf_field() }}
          <div class="btn-group btn-group-sm" role="group">
            <a href="{{ route('ticket_comments.ticket_comment.index') }}" class="btn btn-primary"
               title="Show All Ticket Comment">
              <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
            </a>

            <a href="{{ route('ticket_comments.ticket_comment.create') }}" class="btn btn-success"
               title="Create New Ticket Comment">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </a>

            <a href="{{ route('ticket_comments.ticket_comment.edit', $ticketComment->id ) }}" class="btn btn-primary"
               title="Edit Ticket Comment">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a>

            <button type="submit" class="btn btn-danger" title="Delete Ticket Comment"
                    onclick="return confirm(&quot;Click Ok to delete Ticket Comment.?&quot;)">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
          </div>
        </form>

      </div>

    </div>

    <div class="panel-body">
      <dl class="dl-horizontal">
        <dt>Ticket</dt>
        <dd>{{ optional($ticketComment->Ticket)->content }}</dd>
        <dt>User</dt>
        <dd>{{ optional($ticketComment->User)->name }}</dd>
        <dt>Content</dt>
        <dd>{{ $ticketComment->content }}</dd>
        <dt>Deleted At</dt>
        <dd>{{ $ticketComment->deleted_at }}</dd>
        <dt>Created At</dt>
        <dd>{{ $ticketComment->created_at }}</dd>
        <dt>Updated At</dt>
        <dd>{{ $ticketComment->updated_at }}</dd>

      </dl>

    </div>
  </div>

@endsection
