@extends('layout')

@section('title', 'Create Task')

@section('content')
    <h1 class="title">Create a New Task</h1>

    <form method="POST" action="/customers/{{ $customer->id }}/projects/{{ $project->id }}/tasks">
        @csrf

        <div class="field">
            <label class="label" for="name">Name</label>

            <div class="control">
                <input type="text" class="input {{ $errors->has('name') ? 'is-danger' : '' }}" name="name" value="{{ old('name') }}" placeholder="Task Name" required>
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
