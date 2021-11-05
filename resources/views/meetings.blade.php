@extends('layouts.master')
@section('title', 'Create a room')
@section('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.css"/>
@endsection
@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Meeting ID</th>
                    <th scope="col">Meeting Name</th>
                    <th scope="col">Moderator password</th>
                    <th scope="col">Attendee password</th>
                    <th></th>
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
                            @if($meeting->isRunning($meeting->meeting_id) === 'true')
                            <button class="btn btn-sm btn-success"><i class="fa fa-clock-o" aria-hidden="true"></i></button>
                            @else
                            <button class="btn btn-sm btn-danger"><i class="fa fa-check-square-o"></i></button>
                            @endif
                        </td>

                        <td>
                            <form action="{{ route('share', $meeting->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-sm btn-warning"
                                {{ $meeting->isRunning($meeting->meeting_id) === 'false' ? 'disabled' : '' }}><i class="fa fa-share"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>

              <div class="d-flex justify-content-center">
                {{ $meetings->links('vendor.pagination.bootstrap-4') }}
              </div>
        </div>
    </div>
@endsection
@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js"></script>
@endsection
