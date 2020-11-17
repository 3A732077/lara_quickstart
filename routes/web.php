<?php

use Illuminate\Support\Facades\Route;
use App\Models\Task;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware'=>'web'],function (){



    Route::get('/', function () {
        $tasks=Task::orderBy('created_at','asc')->get();

        return view('tasks',[
            'tasks'=>$tasks
        ]);
    });

/**
 * 增加新任務
 */
    Route::post('/task',function(Request $request){
        $validator=Validator::make($request->all(),[
            'name'=>'required|max:255',
        ]);
        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }

        $task=new Task;
        $task->name=$request->name;
        $task->save();

        return  redirect('/');

    });

    /**
     * 刪除任務
     */
    Route::delete('/task/{task}',function (Task $task){

    });
});
