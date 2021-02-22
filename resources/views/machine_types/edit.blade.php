@extends('layouts.app')

@section('content')

  <div class="panel panel-default">

    <div class="panel-heading clearfix">

      <div class="pull-left">
        <h4 class="mt-5 mb-5">{{ !empty($machineType->name) ? $machineType->name : 'Machine Type' }}</h4>
      </div>
      <div class="btn-group btn-group-sm pull-right" role="group">

        <a href="{{ route('machine_types.machine_type.index') }}" class="btn btn-primary" title="Show All Machine Type">
          <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
        </a>

        <a href="{{ route('machine_types.machine_type.create') }}" class="btn btn-success"
           title="Create New Machine Type">
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

      <form method="POST" action="{{ route('machine_types.machine_type.update', $machineType->id) }}"
            id="edit_machine_type_form" name="edit_machine_type_form" accept-charset="UTF-8" class="form-horizontal">
        {{ csrf_field() }}
        <input name="_method" type="hidden" value="PUT">
        @include ('machine_types.form', [
                                    'machineType' => $machineType,
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
