@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Machine Note' }}</h4>
        </span>

      <div class="pull-right">

        <form method="POST" action="{!! route('machine_notes.machine_note.destroy', $machineNote->id) !!}"
              accept-charset="UTF-8">
          <input name="_method" value="DELETE" type="hidden">
          {{ csrf_field() }}
          <div class="btn-group btn-group-sm" role="group">
            <a href="{{ route('machine_notes.machine_note.index') }}" class="btn btn-primary"
               title="Show All Machine Note">
              <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
            </a>

            <a href="{{ route('machine_notes.machine_note.create') }}" class="btn btn-success"
               title="Create New Machine Note">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </a>

            <a href="{{ route('machine_notes.machine_note.edit', $machineNote->id ) }}" class="btn btn-primary"
               title="Edit Machine Note">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a>

            <button type="submit" class="btn btn-danger" title="Delete Machine Note"
                    onclick="return confirm(&quot;Click Ok to delete Machine Note.?&quot;)">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
          </div>
        </form>

      </div>

    </div>

    <div class="panel-body">
      <dl class="dl-horizontal">
        <dt>Machine</dt>
        <dd>{{ optional($machineNote->Machine)->name }}</dd>
        <dt>Content</dt>
        <dd>{{ $machineNote->content }}</dd>
        <dt>Deleted At</dt>
        <dd>{{ $machineNote->deleted_at }}</dd>
        <dt>Created At</dt>
        <dd>{{ $machineNote->created_at }}</dd>
        <dt>Updated At</dt>
        <dd>{{ $machineNote->updated_at }}</dd>

      </dl>

    </div>
  </div>

@endsection
