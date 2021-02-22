{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
<ul>
  <li>
    {!! Form::label('note_id', 'Note_id:') !!}
    {!! Form::text('note_id') !!}
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
