@extends('app')

@section('content')

    <div class="container">
        <h1>List a new Item</h1>

        <div class="col-md-6 col-md-offset-1">
            @include('errors.list')
            {!! Form::open(['url' => 'product']) !!}{{--, 'enctype' => 'multipart/form-data'--}}
            <div class="form-group">
                {!! Form::label('name', 'Product\'s name:') !!}
                {!! Form::text('name', null,['class' => 'form-control', 'placeholder' => 'Name your product']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('description', 'Product\'s description:') !!}
                {!! Form::text('description', null,['class' => 'form-control', 'placeholder' => 'Describe your product']) !!}
            </div>

            <select class="image_id" name="image_ids[]" hidden="hidden" multiple="multiple">
                <option value=""></option>
            </select>

            <select class="category_id" name="category" hidden="hidden">
                <option value=""></option>
            </select>

            <p>Product's photos:</p>

            <div class="row photo_upload_row clearfix">
                @include('product.partials.imageInput')
                @include('product.partials.imageInput')
                @include('product.partials.imageInput')
            </div>

            <div class="form-group">
                {!! Form::submit('Add this Item', ['class' => 'btn-primary form-control']) !!}
            </div>

            {!! Form::close() !!}

            {!! Form::select('category', \App\Models\Category::roots()->lists('name', 'id'), '<option value="" selected>None<option value="" disabled>Select your Category</option>', ['class' => 'form-control category']) !!}

        </div>
    </div>
    <div><br></div>
    <div><br></div>
    <div><br></div>
    <div><br></div>
    <div><br></div>
    <div><br></div>
    <div><br></div>
    <div><br></div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            //Gets the selected Categories children.
            $('body').on('change', 'select.category', function(){
                console.log('Changed!!');
                console.log($(this).val());
                $('form select.category_id').children('option').remove();
                $('<option>')
                        .attr('value', $(this).val())
                        .attr('selected', 'selected')
                        .appendTo('form select.category_id');

                var id = $(this).val();
                var select = $(this);
                $.ajax({
                    url: '/category/children/' + id,
                    type: 'GET',
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        console.log('GET successfully.');
                        console.log(data);
                        $(select.nextAll('.category')).remove();
                        if(data.length == 0) return;
                        $(select.parent()).append( $('<select class="form-control category"><option value="" selected>None<option value="" disabled>Select your Category</option></select>'));
                        $.each(data, function(index, element){
                            $(select.next('.category')).append( $('<option></option>').val(element['id']).html(element['name']) )
                        });
                    }
                });
            });
            //Clicks the file input.
            $('.thumbnail a').on('click', function (e) {
                console.log('input clicked!!');
                $(this).siblings('input').click();
            });
            //Uploads selected file to server
            $('input[name=image]').change(function () {
                console.log('changed!!');
                var input = $(this);
                var data = new FormData();
                data.append('file', $(this)[0].files[0]);
                $.ajax({
                    url: '/photo/',
                    type: 'POST',
                    processData: false,
                    contentType: false,
                    data: data,
                    headers: {'X-CSRF-Token': '{{ csrf_token() }}'},
                    success: function (data) {
                        console.log('Uploaded successfully.');
                        $(input).siblings('li').find('img').attr({src: data['thumb']});
                        $(input).siblings('a').remove();
                        $('<option>')
                                .attr('value', data['id'])
                                .attr('selected', 'selected')
                                .appendTo('form select.image_id');
                    }
                });
            });

        });
    </script>
@endsection









