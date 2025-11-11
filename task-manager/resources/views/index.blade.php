@extends('layouts.app')

@section('title', 'The list of tasks')


@section('content')
    <nav class="mb-4">

        <a href="{{route('tasks.create')}}"
        class="font-medium tesxt-gray-700 underline decoration-pink-500">
            Add Task
        </a>
    </nav>

{{--    @if(count($tasks))--}}
        @forelse($tasks as $task)
<div>
                <a href="{{route('tasks.show', ['task' => $task->id])}}"
                @class(['line-through font-bold' => $task->completed ])
                >{{$task ->title}}</a>
            </div>
        @empty
            <div>
                there are no tasks
            </div>
    @endforelse

{{--    @endif--}}

@if($tasks ->count())
    <nav>
        {{$tasks -> links()}}
    </nav>

@endif

@endsection
