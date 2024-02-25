<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index(Request $request)
    {
        $todo = Todo::orderBy('completed')->get();
        return view('todos.index', compact('todo'));
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(TodoRequest $request)
    {
        Todo::create($request->all());
        return redirect()->back()->with('message', 'Todo Created Succesfully');
    }

    public function edit($id)
    {
        $todo = Todo::find($id);
        return view('todos.edit', compact('todo'));
    }

    public function update(TodoRequest $request, $id){
        $todo = Todo::find($id);
        $todo->update(['title'=> $request->title]);
        return redirect('/todos');
    }

    public function complete(TodoRequest $request, $id){
        $todo = Todo::find($id);
        $todo->update(['completed' => true]);
        return redirect()->back()->with('message', 'Task Completed');
    }

    public function incomplete(TodoRequest $request, $id){
        $todo = Todo::find($id);
        $todo->update(['completed' => false]);
        return redirect()->back()->with('message', 'Task Incompleted');
    }

    public function delete(TodoRequest $request, $id){
        $todo = Todo::find($id);
        $todo->delete();
        return redirect()->back()->with('message', 'Task Deleted');
    }
}
