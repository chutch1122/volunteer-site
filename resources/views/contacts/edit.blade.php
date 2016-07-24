@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title">
                            Edit {{ $contact->name }}
                        </h4>

                        <p class="card-text">

                            {!! Form::model($contact, ['url' => '/organizations/' . $organization_id . '/contacts/' . $contact->id, 'method' => 'PUT']) !!}

                            @include('contacts.partials.form')

                            <button class="btn btn-primary" type="submit">Save!</button>

                            {!! Form::close() !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection