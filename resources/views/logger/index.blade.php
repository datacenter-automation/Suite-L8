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
        <h4 class="mt-5 mb-5">Loggers</h4>
      </div>

      <div class="btn-group btn-group-sm pull-right" role="group">
        <a href="{{ route('loggers.logger.create') }}" class="btn btn-success" title="Create New Logger">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </a>
      </div>

    </div>

    @if(count($loggers) == 0)
      <div class="panel-body text-center">
        <h4>No Loggers Available.</h4>
      </div>
    @else
      <div class="panel-body panel-body-with-table">
        <div class="table-responsive">

          <table class="table table-striped ">
            <thead>
            <tr>
              <th>Method</th>
              <th>Controller</th>
              <th>Action</th>

              <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($loggers as $logger)
              <tr>
                <td>{{ $logger->method }}</td>
                <td>{{ $logger->controller }}</td>
                <td>{{ $logger->action }}</td>

                <td>

                  <form method="POST" action="{!! route('loggers.logger.destroy', $logger->id) !!}"
                        accept-charset="UTF-8">
                    <input name="_method" value="DELETE" type="hidden">
                    {{ csrf_field() }}

                    <div class="btn-group btn-group-xs pull-right" role="group">
                      <a href="{{ route('loggers.logger.show', $logger->id ) }}" class="btn btn-info"
                         title="Show Logger">
                        <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                      </a>
                      <a href="{{ route('loggers.logger.edit', $logger->id ) }}" class="btn btn-primary"
                         title="Edit Logger">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                      </a>

                      <button type="submit" class="btn btn-danger" title="Delete Logger"
                              onclick="return confirm(&quot;Click Ok to delete Logger.&quot;)">
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
        {!! $loggers->render() !!}
      </div>

    @endif

  </div>
@endsection
