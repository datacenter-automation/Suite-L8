<div class="form-group {{ $errors->has('ticket_id') ? 'has-error' : '' }}">
  <label for="ticket_id" class="col-md-2 control-label">Ticket</label>
  <div class="col-md-10">
    <select class="form-control" id="ticket_id" name="ticket_id" required="true">
      <option value="" style="display: none;"
              {{ old('ticket_id', optional($feedback)->ticket_id ?: '') == '' ? 'selected' : '' }} disabled selected>
        Select ticket
      </option>
      @foreach ($Tickets as $key => $Ticket)
        <option value="{{ $key }}" {{ old('ticket_id', optional($feedback)->ticket_id) == $key ? 'selected' : '' }}>
          {{ $Ticket }}
        </option>
      @endforeach
    </select>

    {!! $errors->first('ticket_id', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('stars') ? 'has-error' : '' }}">
  <label for="stars" class="col-md-2 control-label">Stars</label>
  <div class="col-md-10">
    <select class="form-control" id="stars" name="stars" required="true">
      <option value="" style="display: none;"
              {{ old('stars', optional($feedback)->stars ?: '') == '' ? 'selected' : '' }} disabled selected>Enter stars
        here...
      </option>
      @foreach (['1' => '1',
'2' => '2',
'3' => '3',
'4' => '4',
'5' => '5'] as $key => $text)
        <option value="{{ $key }}" {{ old('stars', optional($feedback)->stars) == $key ? 'selected' : '' }}>
          {{ $text }}
        </option>
      @endforeach
    </select>

    {!! $errors->first('stars', '<p class="help-block">:message</p>') !!}
  </div>
</div>

