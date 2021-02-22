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
        <h4 class="mt-5 mb-5">Ticket Comment Attachments</h4>
      </div>

      <div class="btn-group btn-group-sm pull-right" role="group">
        <a href="{{ route('ticket_comment_attachments.ticket_comment_attachment.create') }}" class="btn btn-success"
           title="Create New Ticket Comment Attachment">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </a>
      </div>

    </div>

    @if(count($ticketCommentAttachments) == 0)
      <div class="panel-body text-center">
        <h4>No Ticket Comment Attachments Available.</h4>
      </div>
    @else
      <div class="panel-body panel-body-with-table">
        <div class="table-responsive">

          <table class="table table-striped ">
            <thead>
            <tr>
              <th>Ticket Comment</th>
              <th>File Name</th>

              <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($ticketCommentAttachments as $ticketCommentAttachment)
              <tr>
                <td>{{ optional($ticketCommentAttachment->TicketComment)->content }}</td>
                <td>{{ $ticketCommentAttachment->file_name }}</td>

                <td>

                  <form method="POST"
                        action="{!! route('ticket_comment_attachments.ticket_comment_attachment.destroy', $ticketCommentAttachment->id) !!}"
                        accept-charset="UTF-8">
                    <input name="_method" value="DELETE" type="hidden">
                    {{ csrf_field() }}

                    <div class="btn-group btn-group-xs pull-right" role="group">
                      <a
                        href="{{ route('ticket_comment_attachments.ticket_comment_attachment.show', $ticketCommentAttachment->id ) }}"
                        class="btn btn-info" title="Show Ticket Comment Attachment">
                        <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                      </a>
                      <a
                        href="{{ route('ticket_comment_attachments.ticket_comment_attachment.edit', $ticketCommentAttachment->id ) }}"
                        class="btn btn-primary" title="Edit Ticket Comment Attachment">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                      </a>

                      <button type="submit" class="btn btn-danger" title="Delete Ticket Comment Attachment"
                              onclick="return confirm(&quot;Click Ok to delete Ticket Comment Attachment.&quot;)">
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
        {!! $ticketCommentAttachments->render() !!}
      </div>

    @endif

  </div>
@endsection
