{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
<ul>
  <li>
    {!! Form::label('machine_id', 'Machine_id:') !!}
    {!! Form::text('machine_id') !!}
  </li>
  <li>
    {!! Form::label('note_content', 'Note_content:') !!}
    {!! Form::textarea('note_content') !!}
  </li>
  <li>
    {!! Form::submit() !!}
  </li>
</ul>
{!! Form::close() !!}
