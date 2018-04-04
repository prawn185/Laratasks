@extends('layouts.admin')
@section('content')

    <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
        <h1>Dashboard</h1>


        <section class="kpi">
            <div class="row">
                <div class="col-lg-4">

                    <b>Current Workflow</b>

                    {{$total_time}} Minutes
                </div>
                <div class="col-lg-4" @if($high_tasks > 0)style="background-color: #e86161;border-radius: 5px;"@endif>
                    You have
                    {{$high_tasks}}
                    High/Critical tasks
                </div>
                <div class="col-lg-4">


                </div>
            </div>





        </section>



    </main>


@stop