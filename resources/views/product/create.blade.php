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

            <select name="image_ids[]" hidden="hidden" multiple="multiple">
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

        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('.thumbnail a').on('click', function (e) {
                console.log('input clicked!!');
                $(this).siblings('input').click();
            });
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
                                .appendTo('form select');
                    }
                });
            })

        });
    </script>
@endsection









