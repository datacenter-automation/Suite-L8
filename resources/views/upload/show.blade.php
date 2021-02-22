@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Upload' }}</h4>
        </span>

      <div class="pull-right">

        <form method="POST" action="{!! route('uploads.upload.destroy', $upload->id) !!}" accept-charset="UTF-8">
          <input name="_method" value="DELETE" type="hidden">
          {{ csrf_field() }}
          <div class="btn-group btn-group-sm" role="group">
            <a href="{{ route('uploads.upload.index') }}" class="btn btn-primary" title="Show All Upload">
              <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
            </a>

            <a href="{{ route('uploads.upload.create') }}" class="btn btn-success" title="Create New Upload">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </a>

            <a href="{{ route('uploads.upload.edit', $upload->id ) }}" class="btn btn-primary" title="Edit Upload">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a>

            <button type="submit" class="btn btn-danger" title="Delete Upload"
                    onclick="return confirm(&quot;Click Ok to delete Upload.?&quot;)">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
          </div>
        </form>

      </div>

    </div>

    <div class="panel-body">
      <dl class="dl-horizontal">
        <dt>Filename Uniqid</dt>
        <dd>{{ $upload->filename_uniqid }}</dd>
        <dt>User</dt>
        <dd>{{ optional($upload->User)->name }}</dd>
        <dt>Filename</dt>
        <dd>{{ $upload->filename }}</dd>
        <dt>File Attibutes</dt>
        <dd>{{ $upload->file_attibutes }}</dd>
        <dt>Encrypted At</dt>
        <dd>{{ $upload->encrypted_at }}</dd>
        <dt>Uploader Ip Address</dt>
        <dd>{{ $upload->uploader_ip_address }}</dd>
        <dt>Deleted At</dt>
        <dd>{{ $upload->deleted_at }}</dd>
        <dt>Created At</dt>
        <dd>{{ $upload->created_at }}</dd>
        <dt>Updated At</dt>
        <dd>{{ $upload->updated_at }}</dd>

      </dl>

    </div>
  </div>

@endsection
