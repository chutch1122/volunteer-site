<div class="md-form">
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => ' ']) !!}
    {!! Form::label('name', 'Organization Name') !!}
</div>

<div class="md-form">
    {!! Form::text('website', null, ['class' => 'form-control', 'placeholder' => ' ']) !!}
    {!! Form::label('website', 'Website') !!}
</div>

<div class="md-form">
    {!! Form::text('mission_statement', null, ['class' => 'form-control', 'placeholder' => ' ']) !!}
    {!! Form::label('mission_statement', 'Mission Statement') !!}
</div>

<div class="md-form">
    {!! Form::textarea('description', null, ['class' => 'md-textarea', 'placeholder' => ' ']) !!}
    {!! Form::label('description', 'Description') !!}
</div>