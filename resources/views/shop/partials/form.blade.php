<div class="form-group">
    {!! Form::label('name', 'ShopName:') !!}
    {!! Form::text('name', null , ['class' => 'form-control', 'placeholder' => 'Your shop name'] ) !!}
</div>

<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Describe what is this shop and why you make these handmade'] ) !!}
</div>


<div class="form-group">
    {!! Form::submit($submitButton, ['class' => 'btn-primary form-control']) !!}
</div>