<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoFormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{

    public function __construct()
    {
        $this->middleware("auth")->except("index");
    }

    public function index()
    {
        $todos = Todo::orderby("completed")->get();
        return view("todos.index", compact("todos"));
    }

    public function create()
    {
        return view("todos.create");
    }

    public function store(TodoFormRequest $request)
    {
        // ==================== Step 01 Simple Validate
        // $request->validate([
        //     "title" => "required|max:255",
        // ]);


        // ==================== Step 02 Custom Errors
        // $rules = [
        //     'title' => 'bail|required|max:255',
        // ];

        // $messages = [
        //     "max" => "Todo title should not be exceeded by 255 characters.",
        //     "required" => "What you want next to do? please add.",
        // ];
        // $validator = Validator::make($request->all(), $rules, $messages);

        // if ($validator->fails()) {
        //     return redirect()->back()
        //         ->withErrors($validator)
        //         ->withInput();
        // }

        Todo::create($request->all());

        return redirect()->back()->with("message", "Todo added successfully");
    }

    public function edit(Todo $todo)
    {
        // $todo = Todo::find($id);
        return view("todos.edit", compact("todo"));
    }

    public function update(TodoFormRequest $request, Todo $todo)
    {
        $todo->update(["title" => $request->title]);
        return redirect(route("todo.index"))->with("message", "Todo Updated.");
    }

    public function complete(Todo $todo) {
        if($todo->completed) {
            $todo->update(["completed" => false]);
            return redirect()->back()->with("message", "Todo marked as Incompleted.");
        }else {
            $todo->update(["completed" => true]);
            return redirect()->back()->with("message", "Todo marked as completed.");
        }
    }

    public function destroy(Todo $todo) {
        $todo->delete();
        return redirect()->back()->with("message", "Todo deleted successfully.");
    }
    
}
