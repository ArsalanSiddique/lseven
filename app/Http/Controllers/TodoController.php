<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoFormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Todo;
use App\User;


class TodoController extends Controller
{

    public function __construct()
    {
        // $this->middleware("auth")->except("index");
        $this->middleware("auth");
    }

    public function index()
    {

        // $todos = Todo::orderby("completed")->get();
        // $todos = auth()->user()->todos()->orderby("completed")->get();
        $todos = auth()->user()->todos->sortBy("completed");
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


        // $user_id = auth()->id();
        // $request["user_id"] = $user_id;
        // Todo::create($request->all());


        $todo = auth()->user()->todos()->create($request->all());

        if ($request->steps) {
            foreach ($request->steps as $step) {
                $todo->steps()->create(['steps' => $step]);
            }
        }

        return redirect()->back()->with("message", "Todo added successfully");
    }

    public function edit(Todo $todo)
    {
        // $todo = Todo::find($id);
        return view("todos.edit", compact("todo"));
    }

    public function update(TodoFormRequest $request, Todo $todo)
    {
        $todo->update(["title" => $request->title, "description" => $request->description]);
        return redirect(route("todo.index"))->with("message", "Todo Updated.");
    }

    public function complete(Todo $todo)
    {
        if ($todo->completed) {
            $todo->update(["completed" => false]);
            return redirect()->back()->with("message", "Todo marked as Incompleted.");
        } else {
            $todo->update(["completed" => true]);
            return redirect()->back()->with("message", "Todo marked as completed.");
        }
    }

    public function show(Todo $todo)
    {
        return view("todos.show", compact("todo"));
    }

    public function destroy(Todo $todo)
    {
        $todo->steps->each->delete();
        $todo->delete();
        return redirect()->back()->with("message", "Todo deleted successfully.");
    }
}
