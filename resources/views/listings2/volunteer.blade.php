@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title">
                            Applying to volunteer for
                            <a href="/listings/{{ $listing->id }}">
                                {{ $listing->title }}
                            </a>
                        </h4>

                        <p class="card-text">

                            {!! Form::open(['url' => '/listings/'.$listing->id.'/volunteer', 'method' => 'POST']) !!}

                            <div class="md-form">
                                {!! Form::textarea('pitch', null, ['class' => 'md-textarea']) !!}
                                {!! Form::label('pitch', 'Why would you like to volunteer for us?') !!}
                            </div>

                            <button class="btn btn-primary" type="submit">Apply!</button>

                            {!! Form::close() !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection