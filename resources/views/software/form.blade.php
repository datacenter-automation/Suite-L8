<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
  <label for="name" class="col-md-2 control-label">Name</label>
  <div class="col-md-10">
    <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($software)->name) }}"
           minlength="1" maxlength="140" required="true" placeholder="Enter name here...">
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('key') ? 'has-error' : '' }}">
  <label for="key" class="col-md-2 control-label">Key</label>
  <div class="col-md-10">
    <input class="form-control" name="key" type="text" id="key" value="{{ old('key', optional($software)->key) }}"
           minlength="1" maxlength="4294967295" required="true" placeholder="Enter key here...">
    {!! $errors->first('key', '<p class="help-block">:message</p>') !!}
  </div>
</div>

