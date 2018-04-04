<?php

namespace App\Http\Controllers;

use App\Models\Task\Task;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    function index(){


        $task = Task::where('assignedTo', Auth::id())->where('status', '!=', 'Completed')->orderBy('created_at', 'desc')->with('notes')->first();


        $tasks = Task::where('assignedTo', Auth::id())->where('status', '!=', 'Completed')->with('priority')->get();
        $total_time = 0;
        $high_tasks = 0;
        foreach ($tasks as $task){

            if($task->priority == "High" || $task->priority == "Critical"){
                $high_tasks++;
            }
            $total_time = $task->total_time + $total_time;
        }

        return view('pages/admin')->with('total_time', $total_time)->with('high_tasks', $high_tasks);
    }
}