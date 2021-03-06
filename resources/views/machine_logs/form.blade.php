<div class="form-group {{ $errors->has('machine_id') ? 'has-error' : '' }}">
  <label for="machine_id" class="col-md-2 control-label">Machine</label>
  <div class="col-md-10">
    <select class="form-control" id="machine_id" name="machine_id" required="true">
      <option value="" style="display: none;"
              {{ old('machine_id', optional($machineLog)->machine_id ?: '') == '' ? 'selected' : '' }} disabled
              selected>Select machine
      </option>
      @foreach ($Machines as $key => $Machine)
        <option value="{{ $key }}" {{ old('machine_id', optional($machineLog)->machine_id) == $key ? 'selected' : '' }}>
          {{ $Machine }}
        </option>
      @endforeach
    </select>

    {!! $errors->first('machine_id', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
  <label for="user_id" class="col-md-2 control-label">User</label>
  <div class="col-md-10">
    <select class="form-control" id="user_id" name="user_id" required="true">
      <option value="" style="display: none;"
              {{ old('user_id', optional($machineLog)->user_id ?: '') == '' ? 'selected' : '' }} disabled selected>
        Select user
      </option>
      @foreach ($Users as $key => $User)
        <option value="{{ $key }}" {{ old('user_id', optional($machineLog)->user_id) == $key ? 'selected' : '' }}>
          {{ $User }}
        </option>
      @endforeach
    </select>

    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
  <label for="content" class="col-md-2 control-label">Content</label>
  <div class="col-md-10">
    <input class="form-control" name="content" type="text" id="content"
           value="{{ old('content', optional($machineLog)->content) }}" minlength="1" maxlength="4294967295"
           required="true" placeholder="Enter content here...">
    {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
  </div>
</div>

