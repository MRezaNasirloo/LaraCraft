@extends('app')

@section('content')
    <div class="container">
        <div class="row">

            @include('errors.list')
            <div class="col-md-10 col-md-offset-1">
                <h1 id="h1">Browse Shops</h1>
                @foreach($shops as $shop)
                    <div class="panel panel-default" style="padding: 30px;">
                        <p><a href="/shop/{{$shop->slug}}">{{$shop->name}}</a> <i>Owner: </i>{{$shop->user()->first()->name}}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection