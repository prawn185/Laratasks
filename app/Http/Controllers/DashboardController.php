<?php

namespace App\Http\Controllers;

use App\Models\Task\Task;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    function index(){


        $task = Task::where('assignedTo', Auth::id())->where('status', '!=', 'Completed')->orderBy('created_at', 'desc')->with('notes')->first();


        $tasks = Task::where('assignedTo', Auth::id())->where('status', '!=', 'Completed')->get();
        foreach ($tasks as $task){

            $total_time = $task->total_time;
            $high_tasks = $task->total_time;

        }
//        Add up all  task and output in hours
//        Count high/critical tasks


        return view('pages/admin')->withTasks('tasks');
    }
}