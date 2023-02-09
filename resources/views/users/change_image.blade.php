@extends('layouts.master')

@section('content')

<div class="container col-5 my-4">
    <div class="card">
        <h1 class="card-header bg-info text-center text-light">Change Image User</h1>
        <div class="card-body">
            <div class="text-center mb-4">
                @if ($user->image)
                        <img class="card-img-top rounded-circle" style="height:270px; width:270px;"
                            src="{{asset('storage/' . $user->image)}}"
                            alt="Card image cap">
                    @else
                        <img class="card-img-top" style="height:270px; width:270px;"
                            src="https://static.vecteezy.com/system/resources/thumbnails/007/407/996/small_2x/user-icon-person-icon-client-symbol-login-head-sign-icon-design-vector.jpg"
                            alt="Card image cap">
                    @endif
            </div>
            <form action="/profile/image/update/{{$user->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="image">New Image</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image">
                    @error('image')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-info "><i class="fa fa-file-image-o" aria-hidden="true"></i>
                        Change Image</button>
                    <a class="btn btn-warning" href="/profile"><i class="fa fa-times" aria-hidden="true"></i> Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
    
@endsection