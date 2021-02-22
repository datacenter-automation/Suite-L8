@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Feedback' }}</h4>
        </span>

      <div class="pull-right">

        <form method="POST" action="{!! route('feedback.feedback.destroy', $feedback->id) !!}" accept-charset="UTF-8">
          <input name="_method" value="DELETE" type="hidden">
          {{ csrf_field() }}
          <div class="btn-group btn-group-sm" role="group">
            <a href="{{ route('feedback.feedback.index') }}" class="btn btn-primary" title="Show All Feedback">
              <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
            </a>

            <a href="{{ route('feedback.feedback.create') }}" class="btn btn-success" title="Create New Feedback">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </a>

            <a href="{{ route('feedback.feedback.edit', $feedback->id ) }}" class="btn btn-primary"
               title="Edit Feedback">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a>

            <button type="submit" class="btn btn-danger" title="Delete Feedback"
                    onclick="return confirm(&quot;Click Ok to delete Feedback.?&quot;)">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
          </div>
        </form>

      </div>

    </div>

    <div class="panel-body">
      <dl class="dl-horizontal">
        <dt>Ticket</dt>
        <dd>{{ optional($feedback->Ticket)->content }}</dd>
        <dt>Stars</dt>
        <dd>{{ $feedback->stars }}</dd>
        <dt>Created At</dt>
        <dd>{{ $feedback->created_at }}</dd>
        <dt>Updated At</dt>
        <dd>{{ $feedback->updated_at }}</dd>

      </dl>

    </div>
  </div>

@endsection
