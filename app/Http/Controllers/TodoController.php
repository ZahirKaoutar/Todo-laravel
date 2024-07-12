<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{

        public function index()
        {
            $todos = Todo::all();
            return view('welcome', compact('todos'));
        }

        public function store(Request $request)
        {
            $attributes = $request->validate([
                'title' => 'required',
                'description' => 'required',
                 'faire' => 'nullable|boolean'
            ]);


            Todo::create($attributes);
            return redirect('/');
        }

    public function update(Todo $todo)
    {
        $todo->update(['faire' => !$todo->faire]);
        return redirect('/');
    }
        public function destroy(Todo $todo)
        {



            $todo->delete();
            return redirect('/');
        }
    }

