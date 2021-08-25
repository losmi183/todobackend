<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    public function index()
    {
        return Todo::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'completed' => 'required|boolean'
        ]);

        // return $data;

        $todo = Todo::create($data);

        return response($todo, 201);

    }

    public function update(Request $request, Todo $todo)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'completed' => 'required|boolean'
        ]);

        $res = $todo->update($data);

        if($res) {
            return response($todo, 200);
        } else {
            return response('Error', 200);
        }
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();

        return response('Deleted todo item', 200);
    }

    public function updateAll()
    {
        $todos = Todo::where('completed', 0)->get();

        foreach($todos as $todo) {
            $todo->completed = 1;
            $todo->save();
        }
        return response($todos, 200);
    }
}
