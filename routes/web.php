<?php

use Illuminate\Support\Facades\Route;

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
        return view('tasks');
    });

/**
 * 增加新任務
 */
    Route::post('/task',function(Request $request){

    });

    /**
     * 刪除任務
     */
    Route::delete('/task/{task}',function (Task $task){

    });
});
