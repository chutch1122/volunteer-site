@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            @include('shared.success')

            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">
                        Organizations

                        @if (Auth::user() && !Auth::user()->organization())
                        <a href="/organizations/create" class="btn btn-sm btn-primary btn-sm-card-header pull-right">
                            Create an Organization
                        </a>
                        @endif
                    </h4>
                    <p class="card-text">

                        <table class="table">
                            @foreach($organizations as $organization)
                            <tr>
                                <td>{{ $organization->id }}</td>
                                <td>
                                    <a href="/organizations/{{ $organization->id }}">{{ $organization->name }}</a>
                                </td>
                                <td>{{ $organization->mission_statement }}</td>
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