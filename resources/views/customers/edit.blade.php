@extends('layout')

@section('title', 'Edit Customer')

@section('content')
    <h1 class="title">Edit Customer</h1>

    <form method="POST" action="/customers/{{ $customer->id }}" style="margin-bottom: 1em;">
        @method('PATCH')
        @csrf

        <div class="field">
            <label class="label" for="name">Name</label>

            <div class="control">
                <input type="text" class="input {{ $errors->has('name') ? 'is-danger' : '' }}" name="name" value="{{ old('name') }}" placeholder="Customer Name" required>
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Update Customer</button>
            </div>
        </div>
    </form>

    @include('errors')
@endsection
