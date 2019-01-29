@extends('layout')

@section('title', 'Create Interval')

@section('content')
    <h1 class="title">Create a New Interval</h1>

    <form method="POST" action="/customers/{{ $customer->id }}/projects/{{ $project->id }}/tasks/{{ $task->id }}/intervals">
        @csrf

        <div class="field">
            <label class="label" for="start_time">Start Time</label>

            <div class="control">
                <input type="datetime-local" class="input {{ $errors->has('start_time') ? 'is-danger' : '' }}" name="start_time" required>
            </div>
        </div>

        <div class="field">
            <label class="label" for="stop_time">Stop Time</label>

            <div class="control">
                <input type="datetime-local" class="input {{ $errors->has('stop_time') ? 'is-danger' : '' }}" name="stop_time" required>
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Create Task</button>
            </div>
        </div>

        @include('errors')
    </form>
@endsection
