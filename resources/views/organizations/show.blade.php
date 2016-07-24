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

                            @if (Auth::user() && Auth::user()->organization_id != null && $organization->user_id == Auth::user()->organization->user_id )

                            @endif
                        </h4>
                        <span class="card-text">
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
                        </span>
                    </div>
                </div>

                @if(Auth::user() && Auth::user()->organization_id == $organization->id)
                    <div class="card">
                        <div class="card-block">
                            <div class="card-text">
                                <h4>
                                    Manage your Organization

                                    <a href="/organizations/{{ $organization->id }}/edit"
                                       class="btn btn-sm btn-primary btn-sm-card-header pull-right">
                                        Edit {{ $organization->name }}
                                    </a>
                                    <a href="/organizations/{{ $organization->id }}/contacts/create"
                                       class="btn btn-sm btn-secondary btn-sm-card-header pull-right">
                                        Add a Contact
                                    </a>
                                </h4>

                                <p>
                                <h5>Contacts</h5>
                                @if (count($contacts) == 0)
                                    <em>You haven't created any contacts for your organization!</em>
                                @else
                                @foreach ($contacts as $contact)
                                @endforeach
                                @endif
                                </p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection