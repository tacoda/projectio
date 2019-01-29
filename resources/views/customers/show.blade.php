@extends('layout')

@section('title', $customer->name)

@section('content')
    <h1 class="title">{{ $customer->name }}</h1>
    @can('update', $customer)
        <a href="/customers/{{ $customer->id }}/edit">Edit</a>
    @endcan
    <hr />

    <h1 class="title">Projects</h1>

    @if(auth()->user()->isAdmin())
    <h3><a href="/customers/{{ $customer->id }}/projects/create"><i class="fas fa-plus-circle"></i>&nbsp;Create a new Project</a></h3>
    @endif
    <hr />

    @foreach($customer->projects()->get() as $project)
        <div class="box">
            <h3>
                <a href="/customers/{{ $customer->id }}/projects/{{ $project->id }}">
                    {{ $project->name }}
                </a>
            </h3>
        </div>
    @endforeach

@endsection
