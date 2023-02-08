@extends('layouts.master')

@section('content')
    <div class="container d-flex justify-content-center">
        <h1>Login User</h1>
    </div>

    <div class="container col-lg-5 mt-4">
        <form action="/login" method="post">
            @csrf
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Username">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-info col-sm-5">Login User Now</button>
            </div>
        </form>
        <div class="text-center mt-2">
            Not Have Account? <a class="text-info" href="/register">Register Now!</a>
        </div>
    </div>
@endsection
