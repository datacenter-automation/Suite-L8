<x-app-layout>
  <x-slot name="header"></x-slot>

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
        <h4 class="mt-5 mb-5">Locations</h4>
      </div>

      <div class="btn-group btn-group-sm pull-right" role="group">
        <a href="{{ route('location.create') }}" class="btn btn-success" title="Create New Location">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </a>
      </div>

    </div>

    @if(count($locations) == 0)
      <div class="panel-body text-center">
        <h4>No Locations Available.</h4>
      </div>
    @else
      <div class="panel-body panel-body-with-table">
        <div class="table-responsive">

          <table class="table table-striped ">
            <thead>
            <tr>
              <th>Location Group</th>
              <th>Name</th>

              <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($locations as $location)
              <tr>
                <td>{{ optional($location->LocationGroup)->name }}</td>
                <td>{{ $location->name }}</td>

                <td>

                  <form method="POST" action="{!! route('location.destroy', $location->id) !!}" accept-charset="UTF-8">
                    <input name="_method" value="DELETE" type="hidden">
                    {{ csrf_field() }}

                    <div class="btn-group btn-group-xs pull-right" role="group">
                      <a href="{{ route('location.show', $location->id ) }}" class="btn btn-info" title="Show Location">
                        <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                      </a>
                      <a href="{{ route('location.edit', $location->id ) }}" class="btn btn-primary"
                         title="Edit Location">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                      </a>

                      <button type="submit" class="btn btn-danger" title="Delete Location"
                              onclick="return confirm(&quot;Click Ok to delete Location.&quot;)">
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
        {!! $locations->render() !!}
      </div>

    @endif

  </div>
</x-app-layout>

