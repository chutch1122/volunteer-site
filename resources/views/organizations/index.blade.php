@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
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

                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection