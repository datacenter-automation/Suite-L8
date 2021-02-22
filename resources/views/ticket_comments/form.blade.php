<div class="form-group {{ $errors->has('ticket_id') ? 'has-error' : '' }}">
  <label for="ticket_id" class="col-md-2 control-label">Ticket</label>
  <div class="col-md-10">
    <select class="form-control" id="ticket_id" name="ticket_id" required="true">
      <option value="" style="display: none;"
              {{ old('ticket_id', optional($ticketComment)->ticket_id ?: '') == '' ? 'selected' : '' }} disabled
              selected>Select ticket
      </option>
      @foreach ($Tickets as $key => $Ticket)
        <option
          value="{{ $key }}" {{ old('ticket_id', optional($ticketComment)->ticket_id) == $key ? 'selected' : '' }}>
          {{ $Ticket }}
        </option>
      @endforeach
    </select>

    {!! $errors->first('ticket_id', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
  <label for="user_id" class="col-md-2 control-label">User</label>
  <div class="col-md-10">
    <select class="form-control" id="user_id" name="user_id" required="true">
      <option value="" style="display: none;"
              {{ old('user_id', optional($ticketComment)->user_id ?: '') == '' ? 'selected' : '' }} disabled selected>
        Select user
      </option>
      @foreach ($Users as $key => $User)
        <option value="{{ $key }}" {{ old('user_id', optional($ticketComment)->user_id) == $key ? 'selected' : '' }}>
          {{ $User }}
        </option>
      @endforeach
    </select>

    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
  <label for="content" class="col-md-2 control-label">Content</label>
  <div class="col-md-10">
    <input class="form-control" name="content" type="text" id="content"
           value="{{ old('content', optional($ticketComment)->content) }}" minlength="1" maxlength="4294967295"
           required="true" placeholder="Enter content here...">
    {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
  </div>
</div>

