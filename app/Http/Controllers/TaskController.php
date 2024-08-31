<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Task;
class TaskController extends Controller
{
    function taskList(){
      $tasks= Task::all();
       $response= response()->json($tasks);
       return $response;
    }

    function statusToggle(Request $request){
         
      $task = Task::where('ID', $request->task_id)->first();
      if ($task) {
          // Change the status
          $task->status = $task->status == 'Completed' ? 'Incomplete' : 'Completed';
          // Save the changes
          $task->save();
      }

          
           return response()->json(['status'=>'success','task_status'=> $task->status]);
    }
    function addTask(Request $request){
    
        $rule=[
            'task'=> 'required',
            'desc'=>'required'
        ];

        $validator= Validator::make($request->all(),$rule);

          if($validator->fails()){
            return response()->json(['error' => $validator->errors()], 400);
          }

          $task= new Task();
          $task->task_name=$request->task;
          $task->task_description=$request->desc;
          $task->save();
          return response()->json(['success' => 'Task added successfully'], 200);


    }
    function DeleteTask(Request $request){
      $task = Task::where('ID', $request->task_id)->first();
      
      $task->delete();
      return response()->json(['success' => 'Task deleted successfully'], 200);
    }
    function fetchTask(Request $request){
        $task=Task::where('ID',$request->task_id)->first();
       return response()->json(['task'=>$task->task_name,'desc'=>$task->task_description]);
    }
    function updateTask(Request $request){
      
      
      $task=Task::where('ID',$request->task_id)->first();
      $task->task_name=$request->task;
      $task->task_description=$request->desc;

      $task->update();
      return response()->json(['success' => 'Task updated successfully'], 200);


    }
}
