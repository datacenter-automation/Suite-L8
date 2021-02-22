@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Message' }}</h4>
        </span>

      <div class="pull-right">

        <form method="POST" action="{!! route('messages.message.destroy', $message->id) !!}" accept-charset="UTF-8">
          <input name="_method" value="DELETE" type="hidden">
          {{ csrf_field() }}
          <div class="btn-group btn-group-sm" role="group">
            <a href="{{ route('messages.message.index') }}" class="btn btn-primary" title="Show All Message">
              <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
            </a>

            <a href="{{ route('messages.message.create') }}" class="btn btn-success" title="Create New Message">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </a>

            <a href="{{ route('messages.message.edit', $message->id ) }}" class="btn btn-primary" title="Edit Message">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a>

            <button type="submit" class="btn btn-danger" title="Delete Message"
                    onclick="return confirm(&quot;Click Ok to delete Message.?&quot;)">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
          </div>
        </form>

      </div>

    </div>

    <div class="panel-body">
      <dl class="dl-horizontal">
        <dt>Type</dt>
        <dd>{{ $message->type }}</dd>
        <dt>From User</dt>
        <dd>{{ optional($message->User)->name }}</dd>
        <dt>To User</dt>
        <dd>{{ optional($message->User)->name }}</dd>
        <dt>Body</dt>
        <dd>{{ $message->body }}</dd>
        <dt>Attachment</dt>
        <dd>{{ $message->attachment }}</dd>
        <dt>Seen</dt>
        <dd>{{ ($message->seen) ? 'Yes' : 'No' }}</dd>
        <dt>Deleted At</dt>
        <dd>{{ $message->deleted_at }}</dd>
        <dt>Created At</dt>
        <dd>{{ $message->created_at }}</dd>
        <dt>Updated At</dt>
        <dd>{{ $message->updated_at }}</dd>

      </dl>

    </div>
  </div>

@endsection
