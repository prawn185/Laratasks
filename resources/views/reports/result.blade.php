@extends('layouts.admin')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Reports</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="reports-header">
                    {{Form::open(array('action'=> array('ReportController@search'),'method'=>'post'))}}
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                {{Form::label('user', 'User') }}
                                {{Form::select('user',  \App\User::all()->pluck('name','id'),"", ['class' => 'form-control', 'placeholder'=>'All']) }}
                            </div>
                            <div class="col-lg-3">
                                {{Form::label('customer', 'Customer') }}
                                {{Form::select('customer', \App\Models\Customer::all()->pluck('name','id'),"", ['class' => 'form-control',  'placeholder'=>'All']) }}
                            </div>

                            <div class="col-lg-3">
                                {{Form::label('datestart', 'Start') }}
                                {{Form::text('datestart', '', ['class' => 'form-control flatpickr flatpickr-input active','id'=>'datepicker','placeholder'=>'Select Date...','readonly'=>'readonly']) }}
                            </div>
                            <div class="col-lg-3">
                                {{Form::label('dateend', 'End') }}
                                {{Form::text('dateend', '', ['class' => 'form-control flatpickr flatpickr-input active','id'=>'datepicker','placeholder'=>'Select Date...','readonly'=>'readonly']) }}
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-lg-1 offset-lg-10">
                                @if($customer != "" && $start != "" && $end != "")
                                    <a href="{{ url('reports/invoice/'.$customer.'/'.$start.'/'.$end) }}"> <div class="btn btn-invoice">Invoice</div></a>
                                @endif
                            </div>
                            <div class="col-lg-1 float-right">
                                {{Form::submit('Submit',['class' => 'btn btn-success float-right'])}}
                                {{Form::close()}}
                            </div>
                        </div>
                    </div>




                </div>
            </div>
        </div>


        <div class="report-search-form">

            <div class="row">
                <div class="col-lg-3">
                    <div class="row">
                        <div class="col-lg-9">Allocated Time:</div>
                        <div class="col-lg-3">{{$allocated_time}}</div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="row">
                        <div class="col-lg-9">Total Used Time:</div>
                        <div class="col-lg-3">{{$used_time}}</div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="row">
                        <div class="col-lg-9">Total Number of Tasks:</div>
                        <div class="col-lg-3">{{$total_tasks}}</div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="row">
                        <div class="col-lg-9">Allocated Time:</div>
                        <div class="col-lg-3">{{$allocated_time}}</div>
                    </div>
                </div>


            </div>

        </div>
    </div>


@endsection