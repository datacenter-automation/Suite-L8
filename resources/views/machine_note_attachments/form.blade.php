<div class="form-group {{ $errors->has('machine_note_id') ? 'has-error' : '' }}">
  <label for="machine_note_id" class="col-md-2 control-label">Machine Note</label>
  <div class="col-md-10">
    <select class="form-control" id="machine_note_id" name="machine_note_id" required="true">
      <option value="" style="display: none;"
              {{ old('machine_note_id', optional($machineNoteAttachment)->machine_note_id ?: '') == '' ? 'selected' : '' }} disabled
              selected>Select machine note
      </option>
      @foreach ($MachineNotes as $key => $MachineNote)
        <option
          value="{{ $key }}" {{ old('machine_note_id', optional($machineNoteAttachment)->machine_note_id) == $key ? 'selected' : '' }}>
          {{ $MachineNote }}
        </option>
      @endforeach
    </select>

    {!! $errors->first('machine_note_id', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('file_name') ? 'has-error' : '' }}">
  <label for="file_name" class="col-md-2 control-label">File Name</label>
  <div class="col-md-10">
    <input class="form-control" name="file_name" type="text" id="file_name"
           value="{{ old('file_name', optional($machineNoteAttachment)->file_name) }}" minlength="1" maxlength="70"
           required="true" placeholder="Enter file name here...">
    {!! $errors->first('file_name', '<p class="help-block">:message</p>') !!}
  </div>
</div>

