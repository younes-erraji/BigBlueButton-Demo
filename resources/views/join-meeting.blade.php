@extends('layouts.master')
@section('title', 'Create a room')
@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col">
                <div class="card-header bg-primary text-white pt-3 pb-3">Joinning a meeting</div>
                <div class="card-body">
                    @if (Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                    @elseif (Session::get('fail'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('success') }}
                    </div>
                    @else
                    <p>All fields marked with an asterisk * are required</p>
                    @endif
                  <form id="main-form" action="{{ route('join-meeting') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="username" class="mb-1">Username <span class="text-danger">*</span></label>
                        <input type="text" id="username" name="username" class="form-control" value="{{ old('username') }}" />
                        @error('username')
                          <small class="text-danger error-text">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="meeting_id" class="mb-1">Meeting ID <span class="text-danger">*</span></label>
                        <input type="text" id="meeting_id" name="meeting_id" class="form-control" value="{{ old('meeting_id') }}" />
                        @error('meeting_id')
                          <small class="text-danger error-text">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="attendee_meeting_password" class="mb-1">Attendee meeting password <span class="text-danger">*</span></label>
                        <input type="password" id="attendee_meeting_password" name="attendee_meeting_password" class="form-control" />
                        @error('attendee_meeting_password')
                          <small class="text-danger error-text">{{ $message }}</small>
                        @enderror
                    </div>
                    <button class="btn btn-primary">Join a meeting</button>
                  </form>
                </div>

            </div>
        </div>
    </div>
@endsection
