@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title">
                            Edit {{ $listing->name }}
                        </h4>

                        <p class="card-text">

                            {!! Form::model($listing, ['url' => '/listings/' . $listing->id, 'method' => 'PUT']) !!}

                            @include('listings.partials.form')

                            <button class="btn btn-primary" type="submit">Save!</button>

                            {!! Form::close() !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection