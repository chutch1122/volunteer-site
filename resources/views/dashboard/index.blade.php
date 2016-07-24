@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-block">
                    @if (str_contains(Auth::user()->name, ' '))
                        <h4 class="card-title" style="font-weight: 400">Welcome to your dashboard, {{ substr(Auth::user()->name, 0, strpos(Auth::user()->name, " ")) }}!</h4>
                    @else
                        <h4 class="card-title" style="font-weight: 400">Welcome to your dashboard, {{ Auth::user()->name }}!</h4>
                    @endif
                    <p class="card-text">
                        From here, you will be able to view your notifications, current listings, and receive recommendations on volunteer opportunities in Cape Girardeau!
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
