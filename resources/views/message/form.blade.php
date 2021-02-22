<div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
  <label for="type" class="col-md-2 control-label">Type</label>
  <div class="col-md-10">
    <input class="form-control" name="type" type="text" id="type" value="{{ old('type', optional($message)->type) }}"
           minlength="1" maxlength="255" required="true" placeholder="Enter type here...">
    {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('from_user_id') ? 'has-error' : '' }}">
  <label for="from_user_id" class="col-md-2 control-label">From User</label>
  <div class="col-md-10">
    <select class="form-control" id="from_user_id" name="from_user_id">
      <option value="" style="display: none;"
              {{ old('from_user_id', optional($message)->from_user_id ?: '') == '' ? 'selected' : '' }} disabled
              selected>Select from user
      </option>
      @foreach ($Users as $key => $User)
        <option
          value="{{ $key }}" {{ old('from_user_id', optional($message)->from_user_id) == $key ? 'selected' : '' }}>
          {{ $User }}
        </option>
      @endforeach
    </select>

    {!! $errors->first('from_user_id', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('to_user_id') ? 'has-error' : '' }}">
  <label for="to_user_id" class="col-md-2 control-label">To User</label>
  <div class="col-md-10">
    <select class="form-control" id="to_user_id" name="to_user_id">
      <option value="" style="display: none;"
              {{ old('to_user_id', optional($message)->to_user_id ?: '') == '' ? 'selected' : '' }} disabled selected>
        Select to user
      </option>
      @foreach ($Users as $key => $User)
        <option value="{{ $key }}" {{ old('to_user_id', optional($message)->to_user_id) == $key ? 'selected' : '' }}>
          {{ $User }}
        </option>
      @endforeach
    </select>

    {!! $errors->first('to_user_id', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
  <label for="body" class="col-md-2 control-label">Body</label>
  <div class="col-md-10">
    <textarea class="form-control" name="body" cols="50" rows="10" id="body" required="true"
              placeholder="Enter body here...">{{ old('body', optional($message)->body) }}</textarea>
    {!! $errors->first('body', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('attachment') ? 'has-error' : '' }}">
  <label for="attachment" class="col-md-2 control-label">Attachment</label>
  <div class="col-md-10">
    <input class="form-control" name="attachment" type="text" id="attachment"
           value="{{ old('attachment', optional($message)->attachment) }}" maxlength="255"
           placeholder="Enter attachment here...">
    {!! $errors->first('attachment', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('seen') ? 'has-error' : '' }}">
  <label for="seen" class="col-md-2 control-label">Seen</label>
  <div class="col-md-10">
    <div class="checkbox">
      <label for="seen_1">
        <input id="seen_1" class="" name="seen" type="checkbox"
               value="1" {{ old('seen', optional($message)->seen) == '1' ? 'checked' : '' }}>
        Yes
      </label>
    </div>

    {!! $errors->first('seen', '<p class="help-block">:message</p>') !!}
  </div>
</div>

