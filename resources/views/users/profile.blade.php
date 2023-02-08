@extends('layouts.master')
@section('content')



<div class="container col-5 my-4">
    <div class="card">
        <div class="text-center">
            <h3 class="card-header bg-info">Profil User</h3>
        </div>
        <div class="card-body">
            <div class="text-center mb-4">
                <img class="card-img-top" style="height:270px; width:270px;" src="https://static.vecteezy.com/system/resources/thumbnails/007/407/996/small_2x/user-icon-person-icon-client-symbol-login-head-sign-icon-design-vector.jpg" alt="Card image cap">
            </div>
            <fieldset disabled="disabled">
                <div class="row form-group">
                    <label class="col-3" for="username">Username</label>
                    <input type="text" class="form-control col-8" readonly id="username" value="{{$user->username}}">
                  </div>
            </fieldset>
            <fieldset disabled="disabled">
                <div class="row form-group">
                    <label class="col-3" for="email">Email</label>
                    <input type="text" class="form-control col-8" readonly id="email" value="{{$user->email}}">
                  </div>
            </fieldset>
            <div class="text-center">
                <a class="btn btn-warning" href="/profile/edit/{{$user->id}}" role="button"><i class="fa fa-refresh" aria-hidden="true"></i> Change Password</a>
                <a class="btn btn-warning" href="#" role="button"><i class="fa fa-picture-o" aria-hidden="true"></i> Change Image Profile</a>
            </div>
        </div>
      </div>
</div>
@endsection
