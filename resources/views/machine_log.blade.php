{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
<ul>
  <li>
    {!! Form::label('machine_id', 'Machine_id:') !!}
    {!! Form::text('machine_id') !!}
  </li>
  <li>
    {!! Form::label('user_id', 'User_id:') !!}
    {!! Form::text('user_id') !!}
  </li>
  <li>
    {!! Form::label('log_content', 'Log_content:') !!}
    {!! Form::textarea('log_content') !!}
  </li>
  <li>
    {!! Form::submit() !!}
  </li>
</ul>
{!! Form::close() !!}
