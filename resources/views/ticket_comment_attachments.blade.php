{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
<ul>
  <li>
    {!! Form::label('comment_id', 'Comment_id:') !!}
    {!! Form::text('comment_id') !!}
  </li>
  <li>
    {!! Form::label('file_name', 'File_name:') !!}
    {!! Form::text('file_name') !!}
  </li>
  <li>
    {!! Form::submit() !!}
  </li>
</ul>
{!! Form::close() !!}
