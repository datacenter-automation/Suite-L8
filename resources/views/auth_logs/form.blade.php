<div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
  <label for="user_id" class="col-md-2 control-label">User</label>
  <div class="col-md-10">
    <select class="form-control" id="user_id" name="user_id" required="true">
      <option value="" style="display: none;"
              {{ old('user_id', optional($authLog)->user_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select
        user
      </option>
      @foreach ($Users as $key => $User)
        <option value="{{ $key }}" {{ old('user_id', optional($authLog)->user_id) == $key ? 'selected' : '' }}>
          {{ $User }}
        </option>
      @endforeach
    </select>

    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('blame_on_user_id') ? 'has-error' : '' }}">
  <label for="blame_on_user_id" class="col-md-2 control-label">Blame On User</label>
  <div class="col-md-10">
    <select class="form-control" id="blame_on_user_id" name="blame_on_user_id" required="true">
      <option value="" style="display: none;"
              {{ old('blame_on_user_id', optional($authLog)->blame_on_user_id ?: '') == '' ? 'selected' : '' }} disabled
              selected>Select blame on user
      </option>
      @foreach ($Users as $key => $User)
        <option
          value="{{ $key }}" {{ old('blame_on_user_id', optional($authLog)->blame_on_user_id) == $key ? 'selected' : '' }}>
          {{ $User }}
        </option>
      @endforeach
    </select>

    {!! $errors->first('blame_on_user_id', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('ip_address') ? 'has-error' : '' }}">
  <label for="ip_address" class="col-md-2 control-label">Ip Address</label>
  <div class="col-md-10">
    <input class="form-control" name="ip_address" type="text" id="ip_address"
           value="{{ old('ip_address', optional($authLog)->ip_address) }}" maxlength="255"
           placeholder="Enter ip address here...">
    {!! $errors->first('ip_address', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('session_id') ? 'has-error' : '' }}">
  <label for="session_id" class="col-md-2 control-label">Session</label>
  <div class="col-md-10">
    <select class="form-control" id="session_id" name="session_id">
      <option value="" style="display: none;"
              {{ old('session_id', optional($authLog)->session_id ?: '') == '' ? 'selected' : '' }} disabled selected>
        Select session
      </option>
      @foreach ($sessions as $key => $session)
        <option value="{{ $key }}" {{ old('session_id', optional($authLog)->session_id) == $key ? 'selected' : '' }}>
          {{ $session }}
        </option>
      @endforeach
    </select>

    {!! $errors->first('session_id', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('user_agent') ? 'has-error' : '' }}">
  <label for="user_agent" class="col-md-2 control-label">User Agent</label>
  <div class="col-md-10">
    <textarea class="form-control" name="user_agent" cols="50" rows="10" id="user_agent"
              placeholder="Enter user agent here...">{{ old('user_agent', optional($authLog)->user_agent) }}</textarea>
    {!! $errors->first('user_agent', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('killed_from_console') ? 'has-error' : '' }}">
  <label for="killed_from_console" class="col-md-2 control-label">Killed From Console</label>
  <div class="col-md-10">
    <div class="checkbox">
      <label for="killed_from_console_1">
        <input id="killed_from_console_1" class="" name="killed_from_console" type="checkbox"
               value="1" {{ old('killed_from_console', optional($authLog)->killed_from_console) == '1' ? 'checked' : '' }}>
        Yes
      </label>
    </div>

    {!! $errors->first('killed_from_console', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('logged_out_at') ? 'has-error' : '' }}">
  <label for="logged_out_at" class="col-md-2 control-label">Logged Out At</label>
  <div class="col-md-10">
    <input class="form-control" name="logged_out_at" type="text" id="logged_out_at"
           value="{{ old('logged_out_at', optional($authLog)->logged_out_at) }}"
           placeholder="Enter logged out at here...">
    {!! $errors->first('logged_out_at', '<p class="help-block">:message</p>') !!}
  </div>
</div>

