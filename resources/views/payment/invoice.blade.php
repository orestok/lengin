@extends('payment.layout')

@section('content')
    <form method="get" action="{{route('payment.process')}}" class="invoice-layout">
        <h1>Invoice</h1>
        <h2>{{$firstname}} {{$middlename}} {{$lastname}}</h2>
        <p>
            Payment for: {{$service->name}}
        </p>
        <div class="invoice-amount">
            $ {{number_format($amount, 2)}}
        </div>
        <div class="invoice-submit">
            <input type="submit" class="btn btn-primary" value="Process payment">
        </div>
    </form>
@endsection
