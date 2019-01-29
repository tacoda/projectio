@extends('layout')

@section('title', 'Projects')

@section('content')
    <h1 class="title">Projects</h1>

    @if(auth()->user()->isAdmin())
    <h3><a href="/projects/create"><i class="fas fa-plus-circle"></i>&nbsp;Create a new Project</a></h3>
    @endif

    <hr />

    @foreach($projects as $projects)
        <div class="box">
            <h3>
                <a href="/customers/{{ $customer->id }}">
                    {{ $customer->name }}
                </a>
            </h3>
        </div>
    @endforeach
@endsection