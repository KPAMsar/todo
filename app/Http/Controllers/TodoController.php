<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function addTodo(Request $request){
       $validated = $request->validate([
        'name'=>'required',
        'description'=>'required',
        
        ]);
        
        Todo::create([
            'name'=> $request->name,
            'description'=>$request->description,
        ]);
        return response('Todo item saved succesfully',200);

    }

    public function todolist(){
        $todo_items = Todo::orderBy('created_at', 'desc')->get();
        return $todo_items;
    }

    public function findTodo(Request $request, $id){
       $foundItem =  Todo::where('id',$id)->get();
       return $foundItem;

    }
    public function deleteTodo(Request $request, $id){
        $foundItem =  Todo::find($id)->delete();
        return response('Todo item deleted succesfully',200);
    }
    public function updateTodo(Request $request, $id){
        $validated = $request->validate([
            'name'=>'required',
            'description'=>'required',
            
            ]);

        $updatedRecord = Todo::where('id',$id)->update([
            'name'=> $request->name,
            'description'=>$request->description,
        ]);
        
        return response('Todo item updated succesfully',200);

    }
}
