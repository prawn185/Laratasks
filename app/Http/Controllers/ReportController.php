<?php

namespace App\Http\Controllers;

use App\Models\Task\Task;
use Illuminate\Http\Request;
use App\Models\Customer;

class ReportController extends Controller
{

    function search(Request $request){

        $user = $request->user;
        $customer = $request->customer;
        $start = $request->datestart;
        $end = $request->dateend;

        $query = "";

        $tasks = Task::where(function($query) use ($user, $customer,$start ,$end ) {
            if ( ! empty($user)) {
                $query->where('assignedTo', '=', $user);
            }else{
                $query->where('assignedTo', '!=', 0);
            }
            if ( ! empty($customer)) {
                $query->where('customer_id', '=', $customer);
            }else{
                $query->where('customer_id', '!=', 0);
                $customer = "";
            }
            if ( ! empty($start) && ! empty($end)) {
                $query->where('created_at', '>=', $start)
                    ->where('created_at', '<=', $end);
            }
        })->get();

        $used_time = 0;
        $allocated_time = 0;
        foreach($tasks as $task){
            $used_time += $task->time_used;
            $allocated_time += $task->total_time;
        }

        return view('reports.result')
            ->with('tasks', $tasks)
            ->with('allocated_time', $allocated_time)
            ->with('used_time', $used_time)
            ->with('total_tasks', count($tasks))
            ->with('customer',$customer)
            ->with('start',$start)
            ->with('end',$end);

    }
    function invoice($customer_id, $start, $end){

        $tasks = Task::where('customer_id', '=', $customer_id)
            ->where('created_at', '>=', $start)
            ->where('created_at', '<=', $end)
            ->get();

        $time = 0;
        foreach($tasks as $task){$time = $task->time_used + $time;}

        $customer = Customer::find($customer_id);

        $cost = $time / 60 * $customer->billing_rate;

        return view('reports.invoice')
            ->with('tasks', $tasks)
            ->with('customer', $customer)
            ->with('time', $time)
            ->with('cost', $cost);
    }


}
