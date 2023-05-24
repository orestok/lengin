@extends('payment.layout')

@section('content')

    <div class="invoice-layout">
        <h1>Payment Confirmation</h1>
    </div>
    <form method="post" action="{{route('payment.pay')}}" class="payment-form">
        @if($errors->any())
            <ul class="alert alert-danger">
                {!! implode($errors->all('<li>:message.</li>')) !!}
            </ul>
        @endif
        @csrf
        <div class="d-flex">
            <div class="form-group owner pe-2">
                <label for="owner" class="form-label">Owner</label>
                <input name="owner" type="text" class="form-control @error('owner') is-invalid @enderror" id="owner">
            </div>
            <div class="form-group cvv">
                <label for="cvv" class="form-label">CVV</label>
                <input type="password" name="cvv" maxlength="3" class="form-control @error('cvv') is-invalid @enderror" id="cvv">
            </div>
        </div>
        <div class="form-group" id="card-number-field">
            <label for="card-number" class="form-label">Card Number</label>
            <input type="text" name="card" class="form-control @error('card') is-invalid @enderror" id="card-number">
        </div>
        <div class="d-flex">
            <div class="form-group expiration-group">
                <label class="form-label">Expiration Date</label>
                <div class="expiration-date">
                    <select name="month" id="month" class="form-select me-2 w-100  @error('month') is-invalid @enderror">
                        @foreach($months as $month => $name)
                            <option value="{{$month}}">{{$name}}</option>
                        @endforeach
                    </select>
                    <select name="year" id="year" class="form-select @error('year') is-invalid @enderror">
                        @foreach($years as $year)
                            <option value="{{$year}}"> {{$year}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group credit-cards">
                <img src="{{asset('assets/images/visa.jpg')}}" id="visa" alt="visa">
                <img src="{{asset('assets/images/mastercard.jpg')}}" id="mastercard" alt="mastercard">
            </div>
        </div>
        <input type="submit" class="btn btn-primary btn-lg w-100 my-4" value="Pay now">
    </form>
    <form method="post" action="{{route('payment.decline')}}" class="payment-form text-center">
        <input type="hidden" name="_method" value="delete">
        @csrf
        <input type="submit" class="btn btn-sm btn-outline-secondary" value="Cancel payment">
    </form>
@endsection
