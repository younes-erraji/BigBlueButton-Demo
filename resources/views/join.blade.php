<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BigBluButton - Join a meeting</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col">

                <div class="card-header bg-primary text-white pt-3 pb-3">Generate new meeting</div>
                <div class="card-body">
                  <form id="main-form" action="{{ url('share') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="meeting_id" class="mb-1">Meeting ID</label>
                        <input type="text" id="meeting_id" name="meeting_id" class="form-control" value="{{ old('meeting_id') }}" />
                        @error('meeting_id')
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

                    <button class="btn btn-success">Share Link</button>
                  </form>
                </div>

            </div>
        </div>
    </div>
</body>
</html>
