@extends('layouts.master')
@section('title', 'Create a room')
@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <table class="table hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Meeting ID</th>
                    <th scope="col">Meeting Name</th>
                    <th scope="col">Moderator password</th>
                    <th scope="col">Attendee password</th>
                    <th></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($meetings as $meeting)
                    <tr>
                        <th scope="row">{{ $meeting->id }}</th>
                        <td>{{ $meeting->meeting_id }}</td>
                        <td>{{ $meeting->meeting_name }}</td>
                        <td>{{ $meeting->attendee_password }}</td>
                        <td>{{ $meeting->moderator_password }}</td>
                        <td>
                            <form action="{{ route('share', $meeting->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-sm btn-warning"><i class="fa fa-share"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
@endsection
