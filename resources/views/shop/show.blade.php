@extends('app')

@section('content')
    <div class="container">
        <div class="row">


            @include('errors.list')
            <div class="col-md-10 col-md-offset-1">
                <h1 id="h1">Shop Name: {{ $shop->name }}</h1>
                <div class="panel panel-default" style="padding: 30px;">
                    <p>Shop Description: {{$shop->description}}</p>

                </div>
            </div>
        </div>

        <aside>
            {!! link_to_action('ProductController@create', 'List an Item') !!}
        </aside>
    </div>
@endsection