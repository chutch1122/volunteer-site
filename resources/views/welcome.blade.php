@extends('layouts.app')

@section('carousel')
    <div style="position: absolute; top: 200px; width: 100%">
        <div class="container" style="position: initial;">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="background-color: white">
                        <div class="card-block">
                            <h4 class="card-title" style="font-weight: 400;">
                                Welcome to HelpCape.org!
                            </h4>

                            <p class="card-text">
                                Our community is built by you. It takes great organizations who are dedicated to helping
                                others to build a community.
                                It also takes great volunteers to give their time and make a difference.
                                We provide the tools to match up volunteers with organizations that make a
                                difference.<br>
                            </p>

                            @if(Auth::user())
                                <div align="center">
                                    <a href="/dashboard" class="btn btn-primary">
                                        Go To Your Dashboard
                                    </a>
                                </div>
                            @else
                                <div align="center">
                                    <a href="/login" class="btn btn-primary">
                                        Log In
                                    </a>
                                    <strong> OR </strong>
                                    <a href="/register" class="btn btn-primary">
                                        Register
                                    </a>
                                    @endif
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="carousel-example-1" class="carousel slide carousel-fade" data-ride="carousel"
         style="width:100%; z-index: -999">
        <div class="carousel-inner" role="listbox">

            <div class="carousel-item active">
                <img src="/img/carousel1.png" alt="First slide" style="width:100%">
            </div>

            <div class="carousel-item">
                <img src="/img/carousel2.png" alt="Second slide" style="width:100%">
            </div>

            <div class="carousel-item">
                <img src="/img/carousel3.png" alt="Third slide" style="width:100%">
            </div>
        </div>
    </div>
@endsection
