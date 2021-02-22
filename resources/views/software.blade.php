{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
<ul>
  <li>
    {!! Form::label('software_name', 'Software_name:') !!}
    {!! Form::text('software_name') !!}
  </li>
  <li>
    {!! Form::label('software_key', 'Software_key:') !!}
    {!! Form::text('software_key') !!}
  </li>
  <li>
    {!! Form::submit() !!}
  </li>
</ul>
{!! Form::close() !!}
