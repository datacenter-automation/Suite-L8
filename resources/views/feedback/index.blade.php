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
        <h4 class="mt-5 mb-5">Feedback</h4>
      </div>

      <div class="btn-group btn-group-sm pull-right" role="group">
        <a href="{{ route('feedback.feedback.create') }}" class="btn btn-success" title="Create New Feedback">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </a>
      </div>

    </div>

    @if(count($feedbackObjects) == 0)
      <div class="panel-body text-center">
        <h4>No Feedback Available.</h4>
      </div>
    @else
      <div class="panel-body panel-body-with-table">
        <div class="table-responsive">

          <table class="table table-striped ">
            <thead>
            <tr>
              <th>Ticket</th>
              <th>Stars</th>

              <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($feedbackObjects as $feedback)
              <tr>
                <td>{{ optional($feedback->Ticket)->content }}</td>
                <td>{{ $feedback->stars }}</td>

                <td>

                  <form method="POST" action="{!! route('feedback.feedback.destroy', $feedback->id) !!}"
                        accept-charset="UTF-8">
                    <input name="_method" value="DELETE" type="hidden">
                    {{ csrf_field() }}

                    <div class="btn-group btn-group-xs pull-right" role="group">
                      <a href="{{ route('feedback.feedback.show', $feedback->id ) }}" class="btn btn-info"
                         title="Show Feedback">
                        <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                      </a>
                      <a href="{{ route('feedback.feedback.edit', $feedback->id ) }}" class="btn btn-primary"
                         title="Edit Feedback">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                      </a>

                      <button type="submit" class="btn btn-danger" title="Delete Feedback"
                              onclick="return confirm(&quot;Click Ok to delete Feedback.&quot;)">
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
        {!! $feedbackObjects->render() !!}
      </div>

    @endif

  </div>
@endsection
