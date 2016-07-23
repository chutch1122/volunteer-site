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
                        <table class="table">
                            @foreach($listings as $listing)
                            <tr>
                                <td>{{ $listing->id }}</td>
                                <td class="pull-xs-left">
                                    <img src="{{$listing->url}}" alt="...">
                                </td>
                                <td>
                                    <div class="row">
                                        <a href="/listing/{{ $listing->id }}">{{ $listing->title }}</a>
                                    </div>
                                    <div class="row">
                                        <p>{{$listing->organization->name}}</p>
                                    </div>
                                    <div class="row">
                                        <p>{{$listing->start_time}}</p>
                                    </div>
                                </td>

                            </tr>
                            @endforeach
                        </table>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection