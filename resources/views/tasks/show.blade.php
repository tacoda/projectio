@extends('layout')

@section('title', $task->name)

@section('content')
    <h1 class="title">{{ $task->name }}</h1>
    <hr />

    <h1 class="title">Intervals</h1>

    <h3><a href="/customers/{{ $customer->id }}/projects/{{ $project->id }}/tasks/create"><i class="fas fa-plus-circle"></i>&nbsp;Create a new Interval</a></h3>
    <hr />

    @foreach($task->intervals()->get() as $interval)
        <div class="box">
            <h3>
                <a href="/customers/{{ $customer->id }}/projects/{{ $project->id }}/tasks/{{ $task->id }}/intervals/{{ $interval->id }}">
                    {{ $interval->name }}
                </a>
            </h3>
        </div>
    @endforeach

@endsection
