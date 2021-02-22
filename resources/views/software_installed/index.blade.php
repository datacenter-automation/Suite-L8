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
        <h4 class="mt-5 mb-5">Software Installeds</h4>
      </div>

      <div class="btn-group btn-group-sm pull-right" role="group">
        <a href="{{ route('software_installed.software_installed.create') }}" class="btn btn-success"
           title="Create New Software Installed">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </a>
      </div>

    </div>

    @if(count($softwareInstalleds) == 0)
      <div class="panel-body text-center">
        <h4>No Software Installeds Available.</h4>
      </div>
    @else
      <div class="panel-body panel-body-with-table">
        <div class="table-responsive">

          <table class="table table-striped ">
            <thead>
            <tr>
              <th>Software</th>
              <th>Machine</th>

              <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($softwareInstalleds as $softwareInstalled)
              <tr>
                <td>{{ optional($softwareInstalled->Software)->name }}</td>
                <td>{{ optional($softwareInstalled->Machine)->name }}</td>

                <td>

                  <form method="POST"
                        action="{!! route('software_installed.software_installed.destroy', $softwareInstalled->id) !!}"
                        accept-charset="UTF-8">
                    <input name="_method" value="DELETE" type="hidden">
                    {{ csrf_field() }}

                    <div class="btn-group btn-group-xs pull-right" role="group">
                      <a href="{{ route('software_installed.software_installed.show', $softwareInstalled->id ) }}"
                         class="btn btn-info" title="Show Software Installed">
                        <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                      </a>
                      <a href="{{ route('software_installed.software_installed.edit', $softwareInstalled->id ) }}"
                         class="btn btn-primary" title="Edit Software Installed">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                      </a>

                      <button type="submit" class="btn btn-danger" title="Delete Software Installed"
                              onclick="return confirm(&quot;Click Ok to delete Software Installed.&quot;)">
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
        {!! $softwareInstalleds->render() !!}
      </div>

    @endif

  </div>
@endsection
