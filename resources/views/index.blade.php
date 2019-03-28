@extends('layout')

@section('content')
    <h1>Please enter offer code</h1>
    <form class="form-signin" action="{{route('get.offers.data')}}" method="post">
        <div class="input-group mb-3" style="width: 500px;">
            <input type="text" class="form-control" placeholder="code" aria-label="code" aria-describedby="basic-addon2" name="code">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">Get offer</button>
            </div>
        </div>
    </form>
@endsection