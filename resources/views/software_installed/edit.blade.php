@extends('layouts.app')

@section('content')

  <div class="panel panel-default">

    <div class="panel-heading clearfix">

      <div class="pull-left">
        <h4 class="mt-5 mb-5">{{ !empty($title) ? $title : 'Software Installed' }}</h4>
      </div>
      <div class="btn-group btn-group-sm pull-right" role="group">

        <a href="{{ route('software_installed.software_installed.index') }}" class="btn btn-primary"
           title="Show All Software Installed">
          <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
        </a>

        <a href="{{ route('software_installed.software_installed.create') }}" class="btn btn-success"
           title="Create New Software Installed">
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

      <form method="POST" action="{{ route('software_installed.software_installed.update', $softwareInstalled->id) }}"
            id="edit_software_installed_form" name="edit_software_installed_form" accept-charset="UTF-8"
            class="form-horizontal">
        {{ csrf_field() }}
        <input name="_method" type="hidden" value="PUT">
        @include ('software_installed.form', [
                                    'softwareInstalled' => $softwareInstalled,
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
