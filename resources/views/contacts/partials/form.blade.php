<div class="md-form">
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => ' ']) !!}
    {!! Form::label('name', 'Full Name') !!}
</div>

<div class="md-form">
    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => ' ']) !!}
    {!! Form::label('email', 'Email Address') !!}
</div>

<div class="md-form">
    <div class="col-xs-4 no-padding" style="display: inline-block">
        {!!
            Form::text(
                'phone_1',
                (isset($contact)) ? $contact->phoneNumberSegment(1) : null,
                ['class' => 'form-control', 'size' => 3, 'maxlength' => 3, 'placeholder' => 'Ex. 573']
            )
        !!}
        {!! Form::label('phone_1', 'Phone Number') !!}
    </div>
    <div class="col-xs-4" style="display: inline-block">
        {!!
            Form::text(
                'phone_2',
                (isset($contact)) ? $contact->phoneNumberSegment(2) : null,
                ['class' => 'form-control', 'size' => 3, 'maxlength' => 3, 'placeholder' => 'Ex. 555']
            )
        !!}
    </div>
    <div class="col-xs-4 no-padding" style="display: inline-block">
        {!!
            Form::text(
                'phone_3',
                (isset($contact)) ? $contact->phoneNumberSegment(3) : null,
                ['class' => 'form-control', 'size' => 4, 'maxlength' => 4, 'placeholder' => 'Ex. 5555']
            )
        !!}
    </div>
</div>