@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @include('shared.success')

                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title">
                            {{ $listing->title }}

                        </h4>
                        <p class="card-text">
                            <p>
                                <strong>Website:</strong> {{ $listing->website }}
                            </p>
                            <p>
                                <strong>Mission Statement:</strong> {{ $listing->mission_statement }}
                            </p>
                            <p>
                                {{ $listing->description }}
                            </p>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection