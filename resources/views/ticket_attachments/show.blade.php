@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Ticket Attachment' }}</h4>
        </span>

      <div class="pull-right">

        <form method="POST"
              action="{!! route('ticket_attachments.ticket_attachment.destroy', $ticketAttachment->id) !!}"
              accept-charset="UTF-8">
          <input name="_method" value="DELETE" type="hidden">
          {{ csrf_field() }}
          <div class="btn-group btn-group-sm" role="group">
            <a href="{{ route('ticket_attachments.ticket_attachment.index') }}" class="btn btn-primary"
               title="Show All Ticket Attachment">
              <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
            </a>

            <a href="{{ route('ticket_attachments.ticket_attachment.create') }}" class="btn btn-success"
               title="Create New Ticket Attachment">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </a>

            <a href="{{ route('ticket_attachments.ticket_attachment.edit', $ticketAttachment->id ) }}"
               class="btn btn-primary" title="Edit Ticket Attachment">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a>

            <button type="submit" class="btn btn-danger" title="Delete Ticket Attachment"
                    onclick="return confirm(&quot;Click Ok to delete Ticket Attachment.?&quot;)">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
          </div>
        </form>

      </div>

    </div>

    <div class="panel-body">
      <dl class="dl-horizontal">
        <dt>Ticket</dt>
        <dd>{{ optional($ticketAttachment->Ticket)->content }}</dd>
        <dt>File Name</dt>
        <dd>{{ $ticketAttachment->file_name }}</dd>
        <dt>Created At</dt>
        <dd>{{ $ticketAttachment->created_at }}</dd>
        <dt>Updated At</dt>
        <dd>{{ $ticketAttachment->updated_at }}</dd>

      </dl>

    </div>
  </div>

@endsection
