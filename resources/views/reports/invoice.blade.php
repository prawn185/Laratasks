@extends('layouts.admin')
@section('content')

    {{--<input class="flatpickr flatpickr-input active" id="datepicker" type="text" placeholder="Select Date.." readonly="readonly">--}}



    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Invoice for: {{$customer->name}}</h1>

            </div>
        </div>
        @foreach($tasks as $task)

                <div class="row">
                    <div class="col-10">{{$task->title}}</div>
                    <div class="col-2">{{$task->time_used}}</div>
                </div>

        @endforeach


        <div class="row">
            <div class="col-10"><h5>Total Time:</h5></div>
            <div class="col-2"><h5>{{$time}}</h5></div>
        </div>
        <div class="row">
            <div class="col-10"><h4>Total Price:</h4></div>
            <div class="col-2"><h4>£{{$cost}}</h4></div>
        </div>
        <a href="#" onclick="window.print();"><div class="btn btn-invoice">Print</div></a>
        {{--<a href="{{ url('reports/invoice/') }}"><div class="btn btn-invoice">Email</div></a>--}}
    </div>




@endsection