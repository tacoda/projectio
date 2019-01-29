@extends('layout')

@section('title', 'Customers')

@section('content')
    <h1 class="title">Customers</h1>

    <h3><a href="/customers/create"><i class="fas fa-plus-circle"></i>&nbsp;Create a new Customer</a></h3>

    <hr />

    @foreach($customers as $customer)
        <div class="box">
            <h3>
                <a href="/customers/{{ $customer->id }}">
                    {{ $customer->name }}
                </a>
            </h3>
        </div>
    @endforeach
@endsection