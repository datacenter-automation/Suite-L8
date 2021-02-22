{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
<ul>
  <li>
    {!! Form::label('user_id', 'User_id:') !!}
    {!! Form::text('user_id') !!}
  </li>
  <li>
    {!! Form::label('status_id', 'Status_id:') !!}
    {!! Form::text('status_id') !!}
  </li>
  <li>
    {!! Form::label('ticket_content', 'Ticket_content:') !!}
    {!! Form::textarea('ticket_content') !!}
  </li>
  <li>
    {!! Form::label('ticket_read', 'Ticket_read:') !!}
    {!! Form::text('ticket_read') !!}
  </li>
  <li>
    {!! Form::submit() !!}
  </li>
</ul>
{!! Form::close() !!}
