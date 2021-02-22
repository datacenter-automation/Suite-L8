{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
<ul>
  <li>
    {!! Form::label('ticket_id', 'Ticket_id:') !!}
    {!! Form::text('ticket_id') !!}
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
