{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
<ul>
  <li>
    {!! Form::label('type_id', 'Type_id:') !!}
    {!! Form::text('type_id') !!}
  </li>
  <li>
    {!! Form::label('user_id', 'User_id:') !!}
    {!! Form::text('user_id') !!}
  </li>
  <li>
    {!! Form::label('location_id', 'Location_id:') !!}
    {!! Form::text('location_id') !!}
  </li>
  <li>
    {!! Form::label('machine_name', 'Machine_name:') !!}
    {!! Form::text('machine_name') !!}
  </li>
  <li>
    {!! Form::submit() !!}
  </li>
</ul>
{!! Form::close() !!}
