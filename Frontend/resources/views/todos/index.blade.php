@extends('todos.layout')

@section('content')
    <div class="flex justify-center border-b pb-4">
        <h1 class="text-2x1">Todo List</h1>
        <a href="todos/create" class="mx-5 py-2 text-blue-400 cursor-pointer text-white"><span class="fas fa-plus-circle">
            </span>
        </a>
    </div>
    <ul class="my-5">
        @foreach ($todo as $todo)
            <li class="flex justify-between py-2">
                <div>
                    @include('todos.completeButton')
                </div>
                @if ($todo->completed)
                    <p class="line-through">{{ $todo->title }}</p>
                @else
                    <p class="">{{ $todo->title }}</p>
                @endif
                <div>
                    <a href="todos/edit/{{ $todo->id }}" class="text-orange-400 cursor-pointer rounded text-white"><span
                            class="fas fa-edit px2"></span></a>

                        <span class="fas fa-trash text-red-500 px2" onclick="event.preventDefault();document.getElementById('form-delete-{{ $todo->id }}').submit()"></span>
                            <form style="display:none" id="{{ 'form-delete-'.$todo->id }}" method="post"
                                action="todos/edit/{{ $todo->id }}/delete">
                                @csrf
                                @method('delete')
                            </form>
                </div>
            </li>
        @endforeach
    </ul>
@endsection
