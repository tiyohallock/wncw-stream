@extends('layouts.masterstripped')

@section('app-content')

    <div class="row" style ="width:300px; margin: 0 auto;">
        <div>

            <h1 class="text-center">Admin Login</h1>

            <form method="POST" action="/login">
                {!! csrf_field() !!}
                <div class="col-md-12 raw-margin-top-24">
                    <label>Email</label>
                    <input class="form-control" type="email" name="email" value="{{ old('email') }}">
                </div>
                <div class="col-md-12 raw-margin-top-24">
                    <label>Password</label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>
                <div class="col-md-12 raw-margin-top-24">
                    <label>
                        Remember Me <input type="checkbox" name="remember">
                    </label>
                </div>
                <div class="col-md-12 raw-margin-top-24">
                    <a class="btn btn-default pull-left" href="/password/email">Forgot Password</a>
                    <button class="btn btn-primary pull-right" type="submit">Login</button>
                </div>

                <div class="col-md-12 raw-margin-top-24">
                <br>
                    <a class="btn raw100 btn-info" href="/register">Become a member of WNCW</a>
                </div>
            </form>

        </div>
    </div>

@stop

