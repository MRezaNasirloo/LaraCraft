@extends('app')

@section('content')
    <div class="container">
        <div class="row">


            @include('errors.list')
            <div class="col-md-10 col-md-offset-1">
                <h1 id="h1">Shop Name: {{ $shop->name }}</h1>
                <div class="panel panel-default" style="padding: 30px;">
                    <p>Shop Description: {{$shop->description}}</p>

                    {{--Edit this shop--}}
                    <div>
                        @if(Auth::user() == $shop->user()->first())
                            {!! link_to_action('Shop\ShopController@edit', 'Edit', $shop->slug)!!}
                        @endif
                    </div>

                    {{--Add a new product to this shop--}}
                    <div style="margin-top: 20px">
                        @if(Auth::user() == $shop->user()->first())
                            {!! link_to_action('ProductController@create', 'List an Item') !!}
                        @endif
                    </div>
                </div>

                {{--This Shop products listings--}}
                <div>
                    @foreach($shop->products()->get() as $product)
                        <ul>
                            {!! link_to_action('ProductController@show', $product->name, $product->slug) !!}
                        </ul>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection