@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @include('shared.success')

                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title">
                            {{ $organization->name }}

                            @if (Auth::user() && $organization->user_id == Auth::user()->organization->user_id )
                                <a href="/organizations/{{ $organization->id }}/edit" class="btn btn-sm btn-primary btn-sm-card-header pull-right">
                                    Edit {{ $organization->name }}
                                </a>
                            @endif
                        </h4>
                        <p class="card-text">
                            <p>
                                <strong>Website:</strong> {{ $organization->website }}
                            </p>
                            <p>
                                <strong>Mission Statement:</strong> {{ $organization->mission_statement }}
                            </p>
                            <p>
                                <strong>Creator: </strong> {{ $organization->creator->name }}
                            </p>
                            <p>
                                {{ $organization->description }}
                            </p>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection