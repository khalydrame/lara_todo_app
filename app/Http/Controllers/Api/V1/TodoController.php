<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Todo;
use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\TodoResource;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
//        $todos = Todo::paginate();
	$todos = Todo::orderBy('created_at', 'desc')->paginate();
//	$todos = Todo::where('user_id', auth()->id())->paginate();
	    //	 $userId = auth('sanctum')->id();
//	     $userId = auth('sanctum')->id();
//$todos = Todo::where('user_id',  $userId)
//    ->orderBy('created_at', 'desc')
//   ->paginate();


        return TodoResource::collection($todos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TodoRequest $request): Todo
    {
        return Todo::create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo): Todo
    {
        return $todo;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TodoRequest $request, Todo $todo): Todo
    {
        $todo->update($request->validated());

        return $todo;
    }

    public function destroy(Todo $todo): Response
    {
        $todo->delete();

        return response()->noContent();
    }
}
