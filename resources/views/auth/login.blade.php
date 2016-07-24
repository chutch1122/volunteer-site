@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-block">
                    <div class="card-title">
                        <h4>Login</h4>
                    </div>
                    <div class="card-text">

                        @include('shared.errors')

                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                            {{ csrf_field() }}

                            <div class="md-form">
                                {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => ' ']) !!}
                                {!! Form::label('email', 'Email Address') !!}
                            </div>

                            <div class="md-form">
                                {!! Form::password('password', null, ['class' => 'form-control', 'placeholder' => ' ']) !!}
                                {!! Form::label('password', 'Password') !!}
                            </div>

                            <label>
                                <input type="checkbox" name="remember"> Remember Me
                            </label>

                            <button type="submit" class="btn btn-primary btn-block">
                                <i class="fa fa-btn fa-user"></i> Login
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
