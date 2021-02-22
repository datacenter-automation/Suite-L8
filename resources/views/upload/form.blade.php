<div class="form-group {{ $errors->has('filename_uniqid') ? 'has-error' : '' }}">
  <label for="filename_uniqid" class="col-md-2 control-label">Filename Uniqid</label>
  <div class="col-md-10">
    <input class="form-control" name="filename_uniqid" type="text" id="filename_uniqid"
           value="{{ old('filename_uniqid', optional($upload)->filename_uniqid) }}" minlength="1" maxlength="36"
           required="true" placeholder="Enter filename uniqid here...">
    {!! $errors->first('filename_uniqid', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
  <label for="user_id" class="col-md-2 control-label">User</label>
  <div class="col-md-10">
    <select class="form-control" id="user_id" name="user_id" required="true">
      <option value="" style="display: none;"
              {{ old('user_id', optional($upload)->user_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select
        user
      </option>
      @foreach ($Users as $key => $User)
        <option value="{{ $key }}" {{ old('user_id', optional($upload)->user_id) == $key ? 'selected' : '' }}>
          {{ $User }}
        </option>
      @endforeach
    </select>

    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('filename') ? 'has-error' : '' }}">
  <label for="filename" class="col-md-2 control-label">Filename</label>
  <div class="col-md-10">
    <input class="form-control" name="filename" type="text" id="filename"
           value="{{ old('filename', optional($upload)->filename) }}" minlength="1" maxlength="255" required="true"
           placeholder="Enter filename here...">
    {!! $errors->first('filename', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('file_attibutes') ? 'has-error' : '' }}">
  <label for="file_attibutes" class="col-md-2 control-label">File Attibutes</label>
  <div class="col-md-10">
    <input class="form-control" name="file_attibutes" type="text" id="file_attibutes"
           value="{{ old('file_attibutes', optional($upload)->file_attibutes) }}" minlength="1" maxlength="4294967295"
           required="true" placeholder="Enter file attibutes here...">
    {!! $errors->first('file_attibutes', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('encrypted_at') ? 'has-error' : '' }}">
  <label for="encrypted_at" class="col-md-2 control-label">Encrypted At</label>
  <div class="col-md-10">
    <input class="form-control" name="encrypted_at" type="text" id="encrypted_at"
           value="{{ old('encrypted_at', optional($upload)->encrypted_at) }}" placeholder="Enter encrypted at here...">
    {!! $errors->first('encrypted_at', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('uploader_ip_address') ? 'has-error' : '' }}">
  <label for="uploader_ip_address" class="col-md-2 control-label">Uploader Ip Address</label>
  <div class="col-md-10">
    <input class="form-control" name="uploader_ip_address" type="text" id="uploader_ip_address"
           value="{{ old('uploader_ip_address', optional($upload)->uploader_ip_address) }}" minlength="1" maxlength="45"
           required="true" placeholder="Enter uploader ip address here...">
    {!! $errors->first('uploader_ip_address', '<p class="help-block">:message</p>') !!}
  </div>
</div>

