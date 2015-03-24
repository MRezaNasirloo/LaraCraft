@extends('app')

@section('content')
    <div class="container">
        <div class="row">

            @include('errors.list')
            <div class="col-md-10 col-md-offset-1">
                <h1 id="h1">Browse Shops</h1>
                @foreach($shops as $shop)

                    <div class="panel panel-default" style="padding: 15px;">
                        <div class="row">
                            <div class="col-lg-2">
                                <img style="width: 85px; height: 85px;" src={{ $shop->image_banner }}>
                            </div>
                            <div class="col-lg-2">
                                <p><a href="/shop/{{$shop->slug}}">{{$shop->name}}</a>
                                    <i>Owner: </i>{{$shop->user()->first()->name}}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {!! $shops->render() !!}
        </div>
    </div>
@endsection