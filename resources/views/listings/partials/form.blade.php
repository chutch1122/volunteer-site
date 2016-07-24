<div class="md-form">
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
    {!! Form::label('title', 'Listing Title') !!}
</div>
<div class="form-group">
    {!! Form::select('category_id', $categories, null, ['placeholder' => 'Pick a category...', 'class' => 'form-control']) !!}
</div>

<div class="md-form">
    {!! Form::textarea('description', null, ['class' => 'md-textarea']) !!}
    {!! Form::date('starts_at', \Carbon\Carbon::now()) !!}
    {!! Form::label('description', 'Description') !!}
</div>