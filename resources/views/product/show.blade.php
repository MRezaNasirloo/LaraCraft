@extends('app')

@section('content')
    <div class="container">
        <div class="row">

            @include('errors.list')
            <div class="col-md-10 col-md-offset-1">
                <h1 id="h1">{!! link_to_action('Shop\ShopController@show', $product->shop()->first()->name, $product->shop()->first()->slug)!!}</h1>
                    <div class="panel panel-default" style="padding: 30px;">
                        <h3>{{$product->name}}</h3>

                        <p>
                            {{$product->description}}
                        </p>
                        @if(Auth::user() == $product->shop()->first()->user()->first())
                            {!! link_to_action('ProductController@edit', 'Edit', $product->slug)!!}
                        @endif
                    </div>
            </div>
        </div>
    </div>
@endsection