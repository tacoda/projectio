@extends('layout')

@section('title', $project->name)

@section('content')
    <h3>
        <a href="/customers/{{ $customer->id }}">
            Back to {{ $customer->name }}
        </a>
    </h3>

    <h1 class="title">{{ $project->name }}</h1>
    @can('update', $project)
        <a href="/customers/{{ $customer->id }}/projects/{{ $project->id }}/edit">Edit</a>
    @endcan
    <hr />

    <h1 class="title">Tasks</h1>

    <h3><a href="/customers/{{ $customer->id }}/projects/{{ $project->id }}/tasks/create"><i class="fas fa-plus-circle"></i>&nbsp;Create a new Task</a></h3>
    <hr />

    @foreach($project->tasks()->get() as $task)
        <div class="box">
            <h3>
                <a href="/customers/{{ $customer->id }}/projects/{{ $project->id }}/tasks/{{ $task->id }}">
                    {{ $task->name }}
                </a>
            </h3>
        </div>
    @endforeach

@endsection
