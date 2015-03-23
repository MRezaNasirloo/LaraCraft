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

                <div id="label" class="form-group">
                    {!! Form::label('property', 'Property:') !!}
                    {!! Form::select('property', [], null,['id' => 'property', 'class' => 'form-control']) !!}
                </div>

                <div id="options" class="form-group">

                </div>

                <div id="label2" class="form-group">
                    {!! Form::label('property2', 'Property:') !!}
                    {!! Form::select('property2', [], null,['id' => 'property2', 'class' => 'form-control']) !!}
                </div>

                <div id="options2" class="form-group">

                </div>

                <div class="form-group">
                    {!! Form::submit('Add this Item', ['class' => 'btn-primary form-control']) !!}
                </div>
            </div>
    </div>

@endsection

@section('script')

    <script>

        var values;
        $('#property').append( $('<option value="" disabled selected>Select your property</option>'));
        $.each(laracraft.options, function(index, element){
            $('#property').append( $('<option></option>').val(index).html(index) )
        });

        $(document).on('change', '#property', function() {

            $('#label').append( $('<strong></strong>').val($(this).val()).html($(this).val()) );

            $(document).ready(function () {
                $("#property").fadeOut();
            });
//            console.log(laracraft.options[$(this).val()]);
            values = laracraft.options[$(this).val()];
            $('#options').append( $('<select name="values[]" id="option" class="form-control"  multiple></select>'));
            $('#option').select2({
                placeholder: 'Choose some Options',
                tags: true
            });
//            $('#value').append( $('<option value="" disabled selected>Select your option</option>'));
            $.each(laracraft.options[$(this).val()], function(index, element){
                $('#option').append( $('<option></option>').val(index).html(element));
            });

        });

        $('#property2').append( $('<option value="" disabled selected>Select your property</option>'));
        $.each(laracraft.options, function(index, element){
            $('#property2').append( $('<option></option>').val(index).html(index) )
        });

        $(document).on('change', '#property2', function() {

            $('#label2').append( $('<strong></strong>').val($(this).val()).html($(this).val()) );

            $(document).ready(function () {
                $("#property2").fadeOut();
            });
//            console.log(laracraft.options[$(this).val()]);
            values = laracraft.options[$(this).val()];
            $('#options2').append( $('<select name="values2[]" id="option2" class="form-control"  multiple></select>'));
            $('#option2').select2({
                placeholder: 'Choose some Options',
                tags: true
            });
//            $('#value').append( $('<option value="" disabled selected>Select your option</option>'));
            $.each(laracraft.options[$(this).val()], function(index, element){
                $('#option2').append( $('<option></option>').val(index).html(element));
            });

        });

//        $(document).on('change', '#value', function() {
//            $('#label').append( $('<p></p>').val(values[$(this).val()]).html(values[$(this).val()]) );
//        });
    </script>


@endsection