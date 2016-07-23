@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">Welcome, {{ Auth::user()->name }}!</h4>
                    <p class="card-text">
                        Hey, {{ Auth::user()->name }}! Welcome to Volunteer Site!
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
