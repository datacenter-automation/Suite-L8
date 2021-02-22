<div class="form-group {{ $errors->has('software_id') ? 'has-error' : '' }}">
  <label for="software_id" class="col-md-2 control-label">Software</label>
  <div class="col-md-10">
    <select class="form-control" id="software_id" name="software_id" required="true">
      <option value="" style="display: none;"
              {{ old('software_id', optional($softwareInstalled)->software_id ?: '') == '' ? 'selected' : '' }} disabled
              selected>Select software
      </option>
      @foreach ($Software as $key => $Software)
        <option
          value="{{ $key }}" {{ old('software_id', optional($softwareInstalled)->software_id) == $key ? 'selected' : '' }}>
          {{ $Software }}
        </option>
      @endforeach
    </select>

    {!! $errors->first('software_id', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('machine_id') ? 'has-error' : '' }}">
  <label for="machine_id" class="col-md-2 control-label">Machine</label>
  <div class="col-md-10">
    <select class="form-control" id="machine_id" name="machine_id" required="true">
      <option value="" style="display: none;"
              {{ old('machine_id', optional($softwareInstalled)->machine_id ?: '') == '' ? 'selected' : '' }} disabled
              selected>Select machine
      </option>
      @foreach ($Machines as $key => $Machine)
        <option
          value="{{ $key }}" {{ old('machine_id', optional($softwareInstalled)->machine_id) == $key ? 'selected' : '' }}>
          {{ $Machine }}
        </option>
      @endforeach
    </select>

    {!! $errors->first('machine_id', '<p class="help-block">:message</p>') !!}
  </div>
</div>

