{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
<ul>
  <li>
    {!! Form::label('status_name', 'Status_name:') !!}
    {!! Form::text('status_name') !!}
  </li>
  <li>
    {!! Form::label('status_color', 'Status_color:') !!}
    {!! Form::text('status_color') !!}
  </li>
  <li>
    {!! Form::submit() !!}
  </li>
</ul>
{!! Form::close() !!}
