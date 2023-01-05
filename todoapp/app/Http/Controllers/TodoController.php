<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;
use App\Http\Requests\UpdateRequest;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::select('created_at','name')->get();
        return view('index',['todos' => $todos]);
    }

    public function create(TodoRequest $request)
    {
        $form = $request->all();
        unset($form['_token']);
        Todo::create($form);
        return redirect('/');
    }

    public function update(UpdateRequest $request)
    {
        $todo = Todo::find($request->id)->all();
        $form = $request->select('name');
        unset($form['_token']);
        Todo::where('new-name',$request->name)->update($form);
        return redirect('/');
    }

    public function delete(Request $request)
    {
        $todo = Todo::find($request->id)->delete();
        return redirect('/');
    }
}
