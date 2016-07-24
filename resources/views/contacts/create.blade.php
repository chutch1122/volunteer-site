@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title">
                            Create a Contact
                        </h4>

                        @include('shared.errors')

                        <p class="card-text">

                            {!! Form::open(['url' => '/organizations/'.$organization_id.'/contacts/create', 'method' => 'POST']) !!}

                            @include('contacts.partials.form')

                            <button class="btn btn-primary" type="submit">Create!</button>

                            {!! Form::close() !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection