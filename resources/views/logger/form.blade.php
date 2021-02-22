<div class="form-group {{ $errors->has('method') ? 'has-error' : '' }}">
  <label for="method" class="col-md-2 control-label">Method</label>
  <div class="col-md-10">
    <input class="form-control" name="method" type="text" id="method"
           value="{{ old('method', optional($logger)->method) }}" minlength="1" maxlength="255" required="true"
           placeholder="Enter method here...">
    {!! $errors->first('method', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('controller') ? 'has-error' : '' }}">
  <label for="controller" class="col-md-2 control-label">Controller</label>
  <div class="col-md-10">
    <input class="form-control" name="controller" type="text" id="controller"
           value="{{ old('controller', optional($logger)->controller) }}" minlength="1" maxlength="255" required="true"
           placeholder="Enter controller here...">
    {!! $errors->first('controller', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('action') ? 'has-error' : '' }}">
  <label for="action" class="col-md-2 control-label">Action</label>
  <div class="col-md-10">
    <input class="form-control" name="action" type="text" id="action"
           value="{{ old('action', optional($logger)->action) }}" minlength="1" maxlength="255" required="true"
           placeholder="Enter action here...">
    {!! $errors->first('action', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('parameter') ? 'has-error' : '' }}">
  <label for="parameter" class="col-md-2 control-label">Parameter</label>
  <div class="col-md-10">
    <input class="form-control" name="parameter" type="text" id="parameter"
           value="{{ old('parameter', optional($logger)->parameter) }}" minlength="1" maxlength="4294967295"
           required="true" placeholder="Enter parameter here...">
    {!! $errors->first('parameter', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('headers') ? 'has-error' : '' }}">
  <label for="headers" class="col-md-2 control-label">Headers</label>
  <div class="col-md-10">
    <input class="form-control" name="headers" type="text" id="headers"
           value="{{ old('headers', optional($logger)->headers) }}" minlength="1" maxlength="4294967295" required="true"
           placeholder="Enter headers here...">
    {!! $errors->first('headers', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('origin_ip_address') ? 'has-error' : '' }}">
  <label for="origin_ip_address" class="col-md-2 control-label">Origin Ip Address</label>
  <div class="col-md-10">
    <input class="form-control" name="origin_ip_address" type="text" id="origin_ip_address"
           value="{{ old('origin_ip_address', optional($logger)->origin_ip_address) }}" minlength="1" maxlength="255"
           required="true" placeholder="Enter origin ip address here...">
    {!! $errors->first('origin_ip_address', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
  <label for="user_id" class="col-md-2 control-label">User</label>
  <div class="col-md-10">
    <select class="form-control" id="user_id" name="user_id" required="true">
      <option value="" style="display: none;"
              {{ old('user_id', optional($logger)->user_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select
        user
      </option>
      @foreach ($Users as $key => $User)
        <option value="{{ $key }}" {{ old('user_id', optional($logger)->user_id) == $key ? 'selected' : '' }}>
          {{ $User }}
        </option>
      @endforeach
    </select>

    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
  </div>
</div>

