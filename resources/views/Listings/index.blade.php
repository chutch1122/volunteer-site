@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @include('shared.success')

                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title">
                            Listings
                        </h4>
                        <p class="card-text">
                            @foreach($listings as $listing)
                                <div class="card">
                                    <div class="card-block">
                                        <div class="col-md-3">
                                            <img src="{{$listing->url}}" style="max-width:12%" alt="..."/>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="row">
                                                <a href="/listing/{{$listing->id}}">{{$listing->title}}</a>
                                            </div>
                                            <div class="row">
                                                <p>{{$listing->orginization->name}}</p>
                                            </div>
                                            <div class="row">
                                                <p>{{$listing->starts_at}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection