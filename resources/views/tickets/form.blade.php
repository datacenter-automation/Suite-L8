<div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
  <label for="user_id" class="col-md-2 control-label">User</label>
  <div class="col-md-10">
    <select class="form-control" id="user_id" name="user_id" required="true">
      <option value="" style="display: none;"
              {{ old('user_id', optional($ticket)->user_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select
        user
      </option>
      @foreach ($Users as $key => $User)
        <option value="{{ $key }}" {{ old('user_id', optional($ticket)->user_id) == $key ? 'selected' : '' }}>
          {{ $User }}
        </option>
      @endforeach
    </select>

    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('status_id') ? 'has-error' : '' }}">
  <label for="status_id" class="col-md-2 control-label">Status</label>
  <div class="col-md-10">
    <select class="form-control" id="status_id" name="status_id" required="true">
      <option value="" style="display: none;"
              {{ old('status_id', optional($ticket)->status_id ?: '') == '' ? 'selected' : '' }} disabled selected>
        Select status
      </option>
      @foreach ($TicketStatuses as $key => $TicketStatus)
        <option value="{{ $key }}" {{ old('status_id', optional($ticket)->status_id) == $key ? 'selected' : '' }}>
          {{ $TicketStatus }}
        </option>
      @endforeach
    </select>

    {!! $errors->first('status_id', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
  <label for="content" class="col-md-2 control-label">Content</label>
  <div class="col-md-10">
    <input class="form-control" name="content" type="text" id="content"
           value="{{ old('content', optional($ticket)->content) }}" minlength="1" maxlength="4294967295" required="true"
           placeholder="Enter content here...">
    {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('read') ? 'has-error' : '' }}">
  <label for="read" class="col-md-2 control-label">Read</label>
  <div class="col-md-10">
    <input class="form-control" name="read" type="text" id="read" value="{{ old('read', optional($ticket)->read) }}"
           minlength="1" required="true" placeholder="Enter read here...">
    {!! $errors->first('read', '<p class="help-block">:message</p>') !!}
  </div>
</div>

