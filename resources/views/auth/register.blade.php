@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-block">
                    <div class="card-title">
                        <h4>Register</h4>
                    </div>
                    <div class="card-text">

                        @include('shared.errors')

                        <form method="POST" action="{{ url('/register') }}">
                            {{ csrf_field() }}

                            <div class="md-form">
                                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                {!! Form::label('name', 'Full Name') !!}
                            </div>

                            <div class="md-form">
                                {!! Form::email('email', null, ['class' => 'form-control']) !!}
                                {!! Form::label('email', 'Email Address') !!}
                            </div>

                            <div class="md-form">
                                {!! Form::password('password', null, ['class' => 'form-control']) !!}
                                {!! Form::label('password', 'Password') !!}
                            </div>

                            <div class="md-form">
                                {!! Form::password('password_confirmation', null, ['class' => 'form-control']) !!}
                                {!! Form::label('password_confirmation', 'Confirm Password') !!}
                            </div>

                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-user"></i> Register
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
