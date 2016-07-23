@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title">
                            Create an Organization
                        </h4>

                        <p class="card-text">

                            {!! Form::open(['url' => '/organizations', 'method' => 'POST']) !!}

                            @include('organizations.partials.form')

                            <button class="btn btn-primary" type="submit">Create!</button>

                            {!! Form::close() !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection