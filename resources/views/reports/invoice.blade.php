@extends('layouts.admin')
@section('content')

    {{--<input class="flatpickr flatpickr-input active" id="datepicker" type="text" placeholder="Select Date.." readonly="readonly">--}}



    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Invoice for: {{$customer}}</h1>
            </div>
        </div>

{{$tasks}}

    </div>


@endsection