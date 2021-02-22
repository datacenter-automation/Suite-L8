@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($machine->name) ? $machine->name : 'Machine' }}</h4>
        </span>

      <div class="pull-right">

        <form method="POST" action="{!! route('machines.machine.destroy', $machine->id) !!}" accept-charset="UTF-8">
          <input name="_method" value="DELETE" type="hidden">
          {{ csrf_field() }}
          <div class="btn-group btn-group-sm" role="group">
            <a href="{{ route('machines.machine.index') }}" class="btn btn-primary" title="Show All Machine">
              <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
            </a>

            <a href="{{ route('machines.machine.create') }}" class="btn btn-success" title="Create New Machine">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </a>

            <a href="{{ route('machines.machine.edit', $machine->id ) }}" class="btn btn-primary" title="Edit Machine">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a>

            <button type="submit" class="btn btn-danger" title="Delete Machine"
                    onclick="return confirm(&quot;Click Ok to delete Machine.?&quot;)">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
          </div>
        </form>

      </div>

    </div>

    <div class="panel-body">
      <dl class="dl-horizontal">
        <dt>Machine Type</dt>
        <dd>{{ optional($machine->MachineType)->name }}</dd>
        <dt>Machine Location</dt>
        <dd>{{ optional($machine->MachineLocation)->id }}</dd>
        <dt>User</dt>
        <dd>{{ optional($machine->User)->name }}</dd>
        <dt>Name</dt>
        <dd>{{ $machine->name }}</dd>
        <dt>Deleted At</dt>
        <dd>{{ $machine->deleted_at }}</dd>
        <dt>Created At</dt>
        <dd>{{ $machine->created_at }}</dd>
        <dt>Updated At</dt>
        <dd>{{ $machine->updated_at }}</dd>

      </dl>

    </div>
  </div>

@endsection
