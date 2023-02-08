@extends('layouts.master')

@section('content')
    <div class="container d-flex justify-content-center">
        <h1>Register User</h1>
    </div>

    <div class="container col-lg-5 mt-4">
        <form action="/register" method="post">
            @csrf
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Username" required>
                @error('username')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" required>
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-info col-sm-5">Register Now</button>
            </div>
            <div class="text-center mt-2">Or <a class="text-info" href="/login">Login</a> if have an account!</div>
        </form>
    </div>
@endsection
