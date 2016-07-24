<div class="md-form">
    {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => ' ']) !!}
    {!! Form::label('title', 'Listing Title') !!}
</div>

<div class="form-group">
    <small>Listing Contact</small>
    {!! Form::select('contact_id', $contacts, null, ['placeholder' => 'Pick a contact...', 'class' => 'form-control']) !!}
</div>

<div class="form-group">
    <small>Category</small>
    {!! Form::select('category_id', $categories, null, ['placeholder' => 'Pick a category...', 'class' => 'form-control']) !!}
</div>

<div class="form-group">
    <small>Start Date</small>
    {!! Form::date(
        'starts_at',
        (isset($listing)) ? $listing->starts_at : null,
        ['class' => 'form-control', 'placeholder' => ' ']
        )
    !!}
</div>

<div class="md-form">
    {!! Form::textarea('description', null, ['class' => 'md-textarea']) !!}
    {!! Form::label('description', 'Description') !!}
</div>

