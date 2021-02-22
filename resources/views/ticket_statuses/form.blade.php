<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
  <label for="name" class="col-md-2 control-label">Name</label>
  <div class="col-md-10">
    <input class="form-control" name="name" type="text" id="name"
           value="{{ old('name', optional($ticketStatus)->name) }}" minlength="1" maxlength="40" required="true"
           placeholder="Enter name here...">
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('color') ? 'has-error' : '' }}">
  <label for="color" class="col-md-2 control-label">Color</label>
  <div class="col-md-10">
    <input class="form-control" name="color" type="text" id="color"
           value="{{ old('color', optional($ticketStatus)->color) }}" minlength="1" maxlength="40" required="true"
           placeholder="Enter color here...">
    {!! $errors->first('color', '<p class="help-block">:message</p>') !!}
  </div>
</div>

