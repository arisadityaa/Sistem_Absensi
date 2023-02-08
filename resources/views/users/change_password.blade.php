@extends('layouts.master')

@section('content')


<div class="container col-5 my-4">
    <div class="card">
        <h1 class="card-header bg-info text-center text-light">Change Password User</h1>
        <div class="card-body">
            <form action="/profile/update/{{$user->id}}" method="POST">
                @csrf
                <div class="form-group">
                  <label for="password">New Password</label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="New Password">
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-warning "><i class="fa fa-refresh" aria-hidden="true"></i> Change Password</button>
                    <a class="btn btn-warning" href="/profile"><i class="fa fa-times" aria-hidden="true"></i> Cancel</a>
                </div>
              </form>
        </div>

    

</div>
</div>
@endsection