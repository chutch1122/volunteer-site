@extends('layouts.app')

@section('content')
    <div class="container">

        @include('shared.success')

        <div id="carousel-example-1" class="carousel slide carousel-fade" data-ride="carousel">

            <ol class="carousel-indicators">
                <li data-target="#carousel-example-1" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-1" data-slide-to="1"></li>
                <li data-target="#carousel-example-1" data-slide-to="2"></li>
            </ol>

            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img src="/img/puppy1.png" alt="First slide" style="width: 100%">
                </div>

                <div class="carousel-item">
                    <img src="/img/puppy2.png" alt="Second slide" style="width: 100%">
                </div>

                <div class="carousel-item">
                    <img src="/img/puppy3.png" alt="Third slide" style="width: 100%">
                </div>
            </div>

            <a class="left carousel-control" href="#carousel-example-1" role="button" data-slide="prev">
                <span class="icon-prev" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-1" role="button" data-slide="next">
                <span class="icon-next" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <div class="card-text">
                            <h4>
                                <a href="/listings/{{$listing->id}}">{{ $listing->title }}</a>

                                @if (Auth::user() && $listing->closed_at == null && !$has_volunteered)
                                    <a href="/listings/{{ $listing->id }}/volunteer"
                                       class="btn btn-secondary btn-card-header pull-right">
                                        Volunteer!
                                    </a>
                                @elseif (Auth::user() && $listing->closed_at == null && $has_volunteered)
                                    <a href="/listings/{{ $listing->id }}/withdraw"
                                       class="btn btn-warning btn-card-header pull-right">
                                        Retract Volunteer Application
                                    </a>
                                @endif
                            </h4>
                            <p>
                                <strong>Organization: </strong>
                                <a href="/organizations/{{ $listing->organization['id'] }}">{{ $listing->organization['name'] }}</a>
                            </p>
                            <p>
                                <strong>Start Date:</strong>
                                {{ $listing->starts_at->format('Y-m-d') }}
                            </p>
                            @if($listing->ends_at)
                                <p>
                                    <strong>End Date:</strong>
                                    {{ $listing->ends_at->format('Y-m-d') }}
                                </p>
                            @endif

                            <p>
                                {{ $listing->description }}
                            </p>
                        </div>
                    </div>
                </div>


            </div>
        </div>

        @if(Auth::user() && Auth::user()->organization_id == $listing->organization_id)
            <div class="card">
                <div class="card-block">
                    <div class="card-text">
                        <h4>
                            Manage your Listing
                            <a href="/listings/{{ $listing->id }}/edit"
                               class="btn btn-primary btn-card-header pull-right">
                                Edit
                            </a>
                            @if ($listing->closed_at == null)
                                <a href="/listings/{{ $listing->id }}/close"
                                   class="btn btn-danger btn-card-header pull-right">
                                    Close Volunteer Applications
                                </a>
                            @else
                                <a href="/listings/{{ $listing->id }}/open"
                                   class="btn btn-secondary btn-card-header pull-right">
                                    Re-Open Volunteer Applications
                                </a>
                            @endif
                        </h4>

                        <p>
                        <h5>Registered Volunteers</h5>
                        @if (count($volunteers) == 0)
                            <em>No volunteers... yet!</em>
                        @else
                        <table class="table table-hover table-sm">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Volunteered At</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($volunteers as $volunteer)
                                <tr>
                                    <td style="vertical-align: middle;">
                                        {{ $volunteer->user['name'] }}
                                    </td>
                                    <td style="vertical-align: middle;">
                                        {{ $volunteer->created_at->format('Y-m-d') }}
                                    </td>
                                    <td style="vertical-align: middle;">
                                        @if ($volunteer->rejected_at)
                                            Rejected
                                        @elseif ($volunteer->approved_at)
                                            Approved
                                        @else
                                            Applied
                                        @endif
                                    </td>
                                    <td class="text-center" style="width: 20%; vertical-align: middle;">
                                        <a class="btn btn-sm btn-success-outline no-margin"
                                           href="/listings/{{$listing->id}}/volunteers/{{$volunteer->id}}/approve" >
                                            Approve
                                        </a>
                                        <a class="btn btn-sm btn-danger-outline no-margin"
                                            href="/listings/{{$listing->id}}/volunteers/{{$volunteer->id}}/reject">
                                            Reject
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
@endsection