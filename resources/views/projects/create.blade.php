@extends('layout')

@section('title', 'Create Project')

@section('content')
    <h1 class="title">Create a New Project</h1>

    <form method="POST" action="/customers/{{ $customer->id }}/projects">
        @csrf

        <div class="field">
            <label class="label" for="title">Name</label>

            <div class="control">
                <input type="text" class="input {{ $errors->has('title') ? 'is-danger' : '' }}" name="name" value="{{ old('title') }}" placeholder="Project Name" required>
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Create Project</button>
            </div>
        </div>

        @include('errors')
    </form>
@endsection
