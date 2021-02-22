@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Machine Note Attachment' }}</h4>
        </span>

      <div class="pull-right">

        <form method="POST"
              action="{!! route('machine_note_attachments.machine_note_attachment.destroy', $machineNoteAttachment->id) !!}"
              accept-charset="UTF-8">
          <input name="_method" value="DELETE" type="hidden">
          {{ csrf_field() }}
          <div class="btn-group btn-group-sm" role="group">
            <a href="{{ route('machine_note_attachments.machine_note_attachment.index') }}" class="btn btn-primary"
               title="Show All Machine Note Attachment">
              <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
            </a>

            <a href="{{ route('machine_note_attachments.machine_note_attachment.create') }}" class="btn btn-success"
               title="Create New Machine Note Attachment">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </a>

            <a href="{{ route('machine_note_attachments.machine_note_attachment.edit', $machineNoteAttachment->id ) }}"
               class="btn btn-primary" title="Edit Machine Note Attachment">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a>

            <button type="submit" class="btn btn-danger" title="Delete Machine Note Attachment"
                    onclick="return confirm(&quot;Click Ok to delete Machine Note Attachment.?&quot;)">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
          </div>
        </form>

      </div>

    </div>

    <div class="panel-body">
      <dl class="dl-horizontal">
        <dt>Machine Note</dt>
        <dd>{{ optional($machineNoteAttachment->MachineNote)->content }}</dd>
        <dt>File Name</dt>
        <dd>{{ $machineNoteAttachment->file_name }}</dd>
        <dt>Created At</dt>
        <dd>{{ $machineNoteAttachment->created_at }}</dd>
        <dt>Updated At</dt>
        <dd>{{ $machineNoteAttachment->updated_at }}</dd>

      </dl>

    </div>
  </div>

@endsection
