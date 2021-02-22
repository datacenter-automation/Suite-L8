<div class="form-group {{ $errors->has('machine_type_id') ? 'has-error' : '' }}">
  <label for="machine_type_id" class="col-md-2 control-label">Machine Type</label>
  <div class="col-md-10">
    <select class="form-control" id="machine_type_id" name="machine_type_id" required="true">
      <option value="" style="display: none;"
              {{ old('machine_type_id', optional($machine)->machine_type_id ?: '') == '' ? 'selected' : '' }} disabled
              selected>Select machine type
      </option>
      @foreach ($MachineTypes as $key => $MachineType)
        <option
          value="{{ $key }}" {{ old('machine_type_id', optional($machine)->machine_type_id) == $key ? 'selected' : '' }}>
          {{ $MachineType }}
        </option>
      @endforeach
    </select>

    {!! $errors->first('machine_type_id', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('machine_location_id') ? 'has-error' : '' }}">
  <label for="machine_location_id" class="col-md-2 control-label">Machine Location</label>
  <div class="col-md-10">
    <select class="form-control" id="machine_location_id" name="machine_location_id">
      <option value="" style="display: none;"
              {{ old('machine_location_id', optional($machine)->machine_location_id ?: '') == '' ? 'selected' : '' }} disabled
              selected>Select machine location
      </option>
      @foreach ($MachineLocations as $key => $MachineLocation)
        <option
          value="{{ $key }}" {{ old('machine_location_id', optional($machine)->machine_location_id) == $key ? 'selected' : '' }}>
          {{ $MachineLocation }}
        </option>
      @endforeach
    </select>

    {!! $errors->first('machine_location_id', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
  <label for="user_id" class="col-md-2 control-label">User</label>
  <div class="col-md-10">
    <select class="form-control" id="user_id" name="user_id">
      <option value="" style="display: none;"
              {{ old('user_id', optional($machine)->user_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select
        user
      </option>
      @foreach ($Users as $key => $User)
        <option value="{{ $key }}" {{ old('user_id', optional($machine)->user_id) == $key ? 'selected' : '' }}>
          {{ $User }}
        </option>
      @endforeach
    </select>

    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
  <label for="name" class="col-md-2 control-label">Name</label>
  <div class="col-md-10">
    <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($machine)->name) }}"
           minlength="1" maxlength="255" required="true" placeholder="Enter name here...">
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
  </div>
</div>

