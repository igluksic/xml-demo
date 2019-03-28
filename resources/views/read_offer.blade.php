@extends('layout')

@section('content')
    @if(isset ($formatedData['code']) )
    <h1 class="mt-5">Offer code: {{$formatedData['code'] }}</h1>
    <p></p>
    <div class="container">
        <p>Sent date: {{date(DATE_RFC2822, $formatedData['sentTimestamp'])}}</p>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Discount percentage</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($formatedData['products'] as $product)
                    <tr>
                        <td>{{$product['name']}}</td>
                        <td>{{$product['price']}}</td>
                        <td>{{$product['discount_percentage']}}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td><b>Total:</b></td>
                        <td><b>{{$formatedData['total']}}</b></td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <p><a href="{{route('home')}}"><button type="button" class="btn btn-primary">Back to search</button></a></p>
    </div>
    @else
        <div class="alert alert-danger" id="messageBox">
            <p class="msg"> {{ $formatedData['error'] }}</p>
        </div>
        <p><a href="{{route('home')}}"><button type="button" class="btn btn-primary">Back to search</button></a></p>
    @endif
@endsection