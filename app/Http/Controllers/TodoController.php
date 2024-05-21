<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
     //   $todos = Todo::paginate();
        $todos = Todo::orderBy('created_at', 'desc')->paginate();


        return view('todos.index', compact('todos'))
            ->with('i', ($request->input('page', 1) - 1) * $todos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $todo = new Todo();

        return view('todos.create', compact('todo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TodoRequest $request): RedirectResponse
    {
        $request['user_id'] = auth()->id();
        Todo::create($request->validated());

        return Redirect::route('todos.index')
            ->with('success', 'Todo created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $todo = Todo::find($id);

        return view('todos.show', compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $todo = Todo::find($id);

        return view('todos.edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TodoRequest $request, Todo $todo): RedirectResponse
    {
        $todo->update($request->validated());

        return Redirect::route('todos.index')
            ->with('success', 'Todo updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Todo::find($id)->delete();

        return Redirect::route('todos.index')
            ->with('success', 'Todo deleted successfully');
    }
}
