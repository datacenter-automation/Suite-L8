<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
  <label for="name" class="col-md-2 control-label">Name</label>
  <div class="col-md-10">
    <input class="form-control" name="name" type="text" id="name"
           value="{{ old('name', optional($locationGroup)->name) }}" minlength="1" maxlength="255" required="true"
           placeholder="Enter name here...">
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
  <label for="description" class="col-md-2 control-label">Description</label>
  <div class="col-md-10">
    <input class="form-control" name="description" type="text" id="description"
           value="{{ old('description', optional($locationGroup)->description) }}" maxlength="255">
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
  </div>
</div>

