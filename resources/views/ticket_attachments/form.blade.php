<div class="form-group {{ $errors->has('ticket_id') ? 'has-error' : '' }}">
  <label for="ticket_id" class="col-md-2 control-label">Ticket</label>
  <div class="col-md-10">
    <select class="form-control" id="ticket_id" name="ticket_id" required="true">
      <option value="" style="display: none;"
              {{ old('ticket_id', optional($ticketAttachment)->ticket_id ?: '') == '' ? 'selected' : '' }} disabled
              selected>Select ticket
      </option>
      @foreach ($Tickets as $key => $Ticket)
        <option
          value="{{ $key }}" {{ old('ticket_id', optional($ticketAttachment)->ticket_id) == $key ? 'selected' : '' }}>
          {{ $Ticket }}
        </option>
      @endforeach
    </select>

    {!! $errors->first('ticket_id', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('file_name') ? 'has-error' : '' }}">
  <label for="file_name" class="col-md-2 control-label">File Name</label>
  <div class="col-md-10">
    <input class="form-control" name="file_name" type="text" id="file_name"
           value="{{ old('file_name', optional($ticketAttachment)->file_name) }}" minlength="1" maxlength="70"
           required="true" placeholder="Enter file name here...">
    {!! $errors->first('file_name', '<p class="help-block">:message</p>') !!}
  </div>
</div>

