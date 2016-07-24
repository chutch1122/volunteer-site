@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @include('shared.success')
                @if(count($contacts) == 0)
                    <div class="alert alert-warning" role="alert">
                        <strong>No contacts!</strong> You need to add a contact before you can create a listing.
                    </div>
                @endif

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
                                    <table class="table table-hover table-sm">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email Address</th>
                                            <th>Phone Number</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($contacts as $contact)
                                            <tr>
                                                <td style="vertical-align: middle;">
                                                    {{ $contact->name }}
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    {{ $contact->email }}
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    {{ $contact->formattedPhoneNumber() }}
                                                </td>
                                                <td class="text-center" style="width: 20%; vertical-align: middle;">
                                                    <a class="btn btn-sm btn-primary-outline no-margin"
                                                       href="/organizations/{{ $organization->id }}/contacts/{{ $contact->id }}/edit" >
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-sm btn-danger-outline no-margin"
                                                       href="/organizations/{{ $organization->id }}/contacts/{{ $contact->id }}/delete">
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
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