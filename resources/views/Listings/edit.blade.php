@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title">
                            Edit {{ $lisitng->name }}
                        </h4>

                        <p class="card-text">

                            {!! Form::model($lisitng, ['url' => '/listing/' . $lisitng->id, 'method' => 'PUT']) !!}

                            @include('listing.partials.form')

                            <button class="btn btn-primary" type="submit">Save!</button>

                            {!! Form::close() !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection