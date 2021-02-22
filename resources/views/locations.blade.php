{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
<ul>
  <li>
    {!! Form::label('group_id', 'Group_id:') !!}
    {!! Form::text('group_id') !!}
  </li>
  <li>
    {!! Form::label('location_name', 'Location_name:') !!}
    {!! Form::text('location_name') !!}
  </li>
  <li>
    {!! Form::label('location_description', 'Location_description:') !!}
    {!! Form::text('location_description') !!}
  </li>
  <li>
    {!! Form::submit() !!}
  </li>
</ul>
{!! Form::close() !!}
