<div class="form-group {{ $errors->has('ticket_comment_id') ? 'has-error' : '' }}">
  <label for="ticket_comment_id" class="col-md-2 control-label">Ticket Comment</label>
  <div class="col-md-10">
    <select class="form-control" id="ticket_comment_id" name="ticket_comment_id" required="true">
      <option value="" style="display: none;"
              {{ old('ticket_comment_id', optional($ticketCommentAttachment)->ticket_comment_id ?: '') == '' ? 'selected' : '' }} disabled
              selected>Select ticket comment
      </option>
      @foreach ($TicketComments as $key => $TicketComment)
        <option
          value="{{ $key }}" {{ old('ticket_comment_id', optional($ticketCommentAttachment)->ticket_comment_id) == $key ? 'selected' : '' }}>
          {{ $TicketComment }}
        </option>
      @endforeach
    </select>

    {!! $errors->first('ticket_comment_id', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('file_name') ? 'has-error' : '' }}">
  <label for="file_name" class="col-md-2 control-label">File Name</label>
  <div class="col-md-10">
    <input class="form-control" name="file_name" type="text" id="file_name"
           value="{{ old('file_name', optional($ticketCommentAttachment)->file_name) }}" minlength="1" maxlength="70"
           required="true" placeholder="Enter file name here...">
    {!! $errors->first('file_name', '<p class="help-block">:message</p>') !!}
  </div>
</div>

