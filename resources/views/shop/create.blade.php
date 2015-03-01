@extends('app')

@section('content')
    <div class="container">
        <div class="row">

            @include('errors.list')
            <div class="col-md-7 col-md-offset-3">
                <h1 id="h1">Open Your Shop</h1>

                <div class="panel panel-default" style="padding: 30px;">
                    {!! Form::open(['url' => 'shop']) !!}
                    @include('shop.partials.form', ['submitButton' => 'Open My Shop'])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection