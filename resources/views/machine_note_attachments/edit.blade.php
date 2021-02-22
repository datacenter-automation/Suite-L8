@extends('layouts.app')

@section('content')

  <div class="panel panel-default">

    <div class="panel-heading clearfix">

      <div class="pull-left">
        <h4 class="mt-5 mb-5">{{ !empty($title) ? $title : 'Machine Note Attachment' }}</h4>
      </div>
      <div class="btn-group btn-group-sm pull-right" role="group">

        <a href="{{ route('machine_note_attachments.machine_note_attachment.index') }}" class="btn btn-primary"
           title="Show All Machine Note Attachment">
          <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
        </a>

        <a href="{{ route('machine_note_attachments.machine_note_attachment.create') }}" class="btn btn-success"
           title="Create New Machine Note Attachment">
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

      <form method="POST"
            action="{{ route('machine_note_attachments.machine_note_attachment.update', $machineNoteAttachment->id) }}"
            id="edit_machine_note_attachment_form" name="edit_machine_note_attachment_form" accept-charset="UTF-8"
            class="form-horizontal">
        {{ csrf_field() }}
        <input name="_method" type="hidden" value="PUT">
        @include ('machine_note_attachments.form', [
                                    'machineNoteAttachment' => $machineNoteAttachment,
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
