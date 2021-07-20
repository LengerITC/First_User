<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use App\Traits\ResponseTrait;

class TodoController extends Controller
{
    use ResponseTrait;

    public $greet = "Hello World, I'm laravel.";
    public $data = [];

    public function index()
    {
        //return $this->jsonB();
        // return iprint('Hello');
        return $this->jsonA();
        $db_todo = Todo::all();
        $data = [
            'hello' => $this -> greet,
            'about' => "Programming",
            'todo' => $db_todo,
        ];
        return view('todo.index', $data);
    }
    public function jsonB(){
        return  "JSONB";
    }
    public function submit(Request $request)
    {
        Todo::create([
            'title'=>$request->title,
            'body'=>$request->body
        ]);
        return redirect()->back();
    }
    public function delete($id)
    {
        $data = Todo::where('id', $id);
        $data -> delete();
        return redirect()->back();
    }

    public function update(Request $request)
    {
        Todo::where('id', $request->id)
            ->update([
                'title' => $request->title,
                'body' => $request->body,
            ]);
        return redirect()->back();
    }
}
