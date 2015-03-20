@extends('app')

@section('content')




    <div class="container">
        <h1>List a new Item</h1>
            <div class="col-md-6 col-md-offset-1">
                @include('errors.list')
                {!! Form::open(['url' => 'product']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Product\'s name:') !!}
                    {!! Form::text('name', null,['class' => 'form-control', 'placeholder' => 'Name your product']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('description', 'Product\'s description:') !!}
                    {!! Form::text('description', null,['class' => 'form-control', 'placeholder' => 'Describe your product']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Add this Item', ['class' => 'btn-primary form-control']) !!}
                </div>


        </div>
    </div>


@endsection