@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title" style="font-weight: 400;">
                            Welcome to HelpCape.org!
                        </h4>

                        <p class="card-text">
                            Our community is built by you, the people.<br>
                            It takes great organizations who are dedicated to helping others to build a community. It
                            also takes great volunteers to give their time and make a difference.<br>
                            We provide the tools to match up volunteers with organizations that make a difference.<br>
                        </p>

                        <div align="center";>
                            <a href="/login" class="btn btn-primary">
                                Log In
                            </a>
                            <strong> OR </strong>
                            <a href="/register" class="btn btn-primary">
                                Register
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
