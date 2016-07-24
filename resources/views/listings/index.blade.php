@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <h3 class="card-title">
                    Listings

                    @if (Auth::user() && Auth::user()->organization_id != null)
                        <a href="/listings/create" class="btn btn-sm btn-primary btn-sm-card-header pull-right">
                            Create a Volunteer Listing
                        </a>
                    @endif
                </h3>

                @include('shared.success')

                @foreach ($listings as $listing)
                    <div class="card">
                        <div class="card-block">
                            <div style="width: 100%; display: inline-block">
                                <div class="col-md-3 no-padding" style="display: inline-block;">
                                    <a href="/listings/{{$listing->id}}">
                                        <img src="/img/puppy1.png"
                                             alt="..."
                                             class="img-thumbnail"
                                             style="max-width: 100%"/>
                                    </a>
                                </div>
                                <div class="col-md-6" style="display: inline-block; overflow: hidden">
                                    <div class="card-text">
                                        <h4 style="margin-bottom: 2px;">
                                            <a href="/listings/{{$listing->id}}" style="font-weight: 500">{{ $listing->title }}</a>
                                        </h4>
                                        <span>
                                            <a href="/organizations/{{ $listing->organization->id }}">{{ $listing->organization->name }}</a><br>
                                            <div style="margin-top: 5px; overflow: hidden;">
                                                @if (strlen($listing->description) > 95)
                                                    <em>
                                                        <?php
                                                        $pos = strpos($listing->description, ' ', 95);;
                                                        ?>
                                                        {{ substr($listing->description,0, $pos) }}...
                                                    </em>
                                                @else
                                                    <em>
                                                        {{ $listing->description }}
                                                    </em>
                                                @endif
                                            </div>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-3" style="display: inline-block;">
                                    <small>
                                        <strong>Starts On:</strong> {{ $listing->starts_at->format('m-d-Y') }} <br>
                                        <strong>Category:</strong>  {{ $listing->category['name'] }} <br>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{--
                                <div class="card">
                    <div class="card-block">
                        <div style="width: 100%">
                            <div style="max-width: 25%; display: inline-block;">
                                @if ($listing->id % 2 == 0)
                                    <img src="http://i.imgur.com/Cv2G1vm.jpg" alt="..." style="max-width: 100%"/>
                                @else
                                    <img src="http://mdbootstrap.com/images/regular/nature/img%20(25).jpg" alt="..." style="max-width: 100%"/>
                                @endif
                            </div>
                            <div class="pull-right" style="width: 73%">
                                <div class="card-text">
                                    <h4><a href="/listings/{{$listing->id}}">{{ $listing->title }}</a></h4>
                                    <p>Test</p>
                                    <p>{{ $listing->starts_at }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                --}}
            </div>
        </div>
    </div>

@endsection