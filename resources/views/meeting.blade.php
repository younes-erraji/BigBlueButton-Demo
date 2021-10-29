<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BigBluButton - Create a room</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col">

                <div class="card-header bg-primary text-white pt-3 pb-3">Generate new meeting</div>
                <div class="card-body">
                  <form id="main-form" action="{{ route('new-meeting') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="meeting_id" class="mb-1">Meeting ID</label>
                        <input type="text" id="meeting_id" name="meeting_id" class="form-control" value="{{ old('meeting_id') }}" />
                        @error('meeting_id')
                          <small class="text-danger error-text">{{ $message }}</small>
                        @enderror
                      </div>
                    <div class="form-group mb-3">
                      <label for="meeting_name" class="mb-1">Meeting name</label>
                      <input type="text" id="meeting_name" name="meeting_name" class="form-control" value="{{ old('meeting_name') }}" />
                      @error('meeting_name')
                        <small class="text-danger error-text">{{ $message }}</small>
                      @enderror
                    </div>
                    <div class="form-group mb-3">
                      <label for="moderator_meeting_password" class="mb-1">Moderator meeting password</label>
                      <input type="password" id="moderator_meeting_password" name="moderator_meeting_password" class="form-control" />
                      @error('moderator_meeting_password')
                        <small class="text-danger error-text">{{ $message }}</small>
                      @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="attendee_meeting_password" class="mb-1">Attendee meeting password</label>
                        <input type="password" id="attendee_meeting_password" name="attendee_meeting_password" class="form-control" />
                        @error('attendee_meeting_password')
                          <small class="text-danger error-text">{{ $message }}</small>
                        @enderror
                      </div>

                    <div class="form-group mb-3">
                      <label for="meeting_participant" class="mb-1">meeting participant</label>
                      <input type="number" id="meeting_participant" name="meeting_participant" class="form-control" value="{{ old('meeting_participant') }}" />
                      @error('meeting_participant')
                        <small class="text-danger error-text">{{ $message }}</small>
                      @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="meeting_presentation" class="mb-1">meeting participant</label>
                        <input type="file" id="meeting_presentation" name="meeting_presentation" class="form-control" />
                        @error('meeting_presentation')
                          <small class="text-danger error-text">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="btn-group mb-4 d-block" role="group" aria-label="Basic checkbox toggle button group">
                        <input type="checkbox" class="btn-check" autocomplete="off" id="meeting_recording" name="meeting_recording" {{ old('meeting_recording') ? "checked" : "" }} />
                        <label class="btn btn-outline-primary" for="meeting_recording">Record</label>
                        <br />
                        @error('meeting_recording')
                          <small class="text-danger error-text">{{ $message }}</small>
                        @enderror
                    </div>

                    <button class="btn btn-primary">Start meeting</button>
                    <button class="btn btn-success" formaction="{{ route('share') }}"> Share Link</button>
                  </form>
                </div>

            </div>
        </div>
    </div>
</body>
</html>
