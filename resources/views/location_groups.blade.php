{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
<ul>
  <li>
    {!! Form::label('group_name', 'Group_name:') !!}
    {!! Form::text('group_name') !!}
  </li>
  <li>
    {!! Form::label('group_description', 'Group_description:') !!}
    {!! Form::text('group_description') !!}
  </li>
  <li>
    {!! Form::submit() !!}
  </li>
</ul>
{!! Form::close() !!}
