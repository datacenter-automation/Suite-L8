@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($logger->headers) ? $logger->headers : 'Logger' }}</h4>
        </span>

      <div class="pull-right">

        <form method="POST" action="{!! route('loggers.logger.destroy', $logger->id) !!}" accept-charset="UTF-8">
          <input name="_method" value="DELETE" type="hidden">
          {{ csrf_field() }}
          <div class="btn-group btn-group-sm" role="group">
            <a href="{{ route('loggers.logger.index') }}" class="btn btn-primary" title="Show All Logger">
              <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
            </a>

            <a href="{{ route('loggers.logger.create') }}" class="btn btn-success" title="Create New Logger">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </a>

            <a href="{{ route('loggers.logger.edit', $logger->id ) }}" class="btn btn-primary" title="Edit Logger">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a>

            <button type="submit" class="btn btn-danger" title="Delete Logger"
                    onclick="return confirm(&quot;Click Ok to delete Logger.?&quot;)">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
          </div>
        </form>

      </div>

    </div>

    <div class="panel-body">
      <dl class="dl-horizontal">
        <dt>Method</dt>
        <dd>{{ $logger->method }}</dd>
        <dt>Controller</dt>
        <dd>{{ $logger->controller }}</dd>
        <dt>Action</dt>
        <dd>{{ $logger->action }}</dd>
        <dt>Parameter</dt>
        <dd>{{ $logger->parameter }}</dd>
        <dt>Headers</dt>
        <dd>{{ $logger->headers }}</dd>
        <dt>Origin Ip Address</dt>
        <dd>{{ $logger->origin_ip_address }}</dd>
        <dt>User</dt>
        <dd>{{ optional($logger->User)->name }}</dd>
        <dt>Created At</dt>
        <dd>{{ $logger->created_at }}</dd>
        <dt>Updated At</dt>
        <dd>{{ $logger->updated_at }}</dd>

      </dl>

    </div>
  </div>

@endsection
