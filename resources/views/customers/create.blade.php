@extends('layout')

@section('title', 'Create Customer')

@section('content')
    <h1 class="title">Create a New Customer</h1>

    <form method="POST" action="/customers">
        @csrf

        <div class="field">
            <label class="label" for="title">Name</label>

            <div class="control">
                <input type="text" class="input {{ $errors->has('title') ? 'is-danger' : '' }}" name="name" value="{{ old('title') }}" placeholder="Customer Name" required>
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Create Customer</button>
            </div>
        </div>

        @include('errors')
    </form>
@endsection
