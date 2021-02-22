{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
<ul>
  <li>
    {!! Form::label('software_id', 'Software_id:') !!}
    {!! Form::text('software_id') !!}
  </li>
  <li>
    {!! Form::label('machine_id', 'Machine_id:') !!}
    {!! Form::text('machine_id') !!}
  </li>
  <li>
    {!! Form::submit() !!}
  </li>
</ul>
{!! Form::close() !!}
