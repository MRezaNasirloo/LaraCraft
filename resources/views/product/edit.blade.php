@extends('app')

@section('content')




    <div class="container">
        <h1>Edit</h1>
        <div class="col-md-6 col-md-offset-1">
            {!! Form::model($product, ['method' => 'PATCH', 'action' => ['ProductController@update', $product->slug]]) !!}
            <div class="form-group">
                {!! Form::label('name', 'Product\'s name:') !!}
                {!! Form::text('name', null,['class' => 'form-control', 'placeholder' => 'Name your product']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('description', 'Product\'s description:') !!}
                {!! Form::text('description', null,['class' => 'form-control', 'placeholder' => 'Describe your product']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('update this Item', ['class' => 'btn-primary form-control']) !!}
            </div>
            {!! Form::close() !!}


        </div>
    </div>


@endsection