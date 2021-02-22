<div class="form-group {{ $errors->has('location_group_id') ? 'has-error' : '' }}">
  <label for="location_group_id" class="col-md-2 control-label">Location Group</label>
  <div class="col-md-10">
    <select class="form-control" id="location_group_id" name="location_group_id">
      <option value="" style="display: none;"
              {{ old('location_group_id', optional($location)->location_group_id ?: '') == '' ? 'selected' : '' }} disabled
              selected>Select location group
      </option>
      @foreach (\App\Models\LocationGroup::pluck('name')->all() as $key => $LocationGroup)
        <option
          value="{{ $key }}" {{ old('location_group_id', optional($location)->location_group_id) == $key ? 'selected' : '' }}>
          {{ $LocationGroup }}
        </option>
      @endforeach
    </select>

    {!! $errors->first('location_group_id', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
  <label for="name" class="col-md-2 control-label">Name</label>
  <div class="col-md-10">
    <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($location)->name) }}"
           minlength="1" maxlength="255" required="true" placeholder="Enter name here...">
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
  <label for="description" class="col-md-2 control-label">Description</label>
  <div class="col-md-10">
    <input class="form-control" name="description" type="text" id="description"
           value="{{ old('description', optional($location)->description) }}" maxlength="255">
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
  </div>
</div>

