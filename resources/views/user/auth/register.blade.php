@extends('masterLayout')

@section('content')

<div class="row mt-3">
    <div class="col-8 offset-2">
        @include('errors.error')
        <h3>Register</h3>
        <form action="{{ route('user.register')}}" method="POST">
            @csrf
            <label class="form-label">Username: </label>
            <input class="form-control" type="text" name="username" value="{{ old('username')}}">
            <label class="form-label">Email: </label>
            <input class="form-control" type="email" name="email" value="{{ old('email')}}">
            <label class="form-label">Password: </label>
            <input class="form-control" type="password" name="password">
            <label class="form-label">Confirm Password: </label>
            <input class="form-control" type="password" name="password_confirmation">
            <input class="btn btn-block btn-success mt-3" type="submit" name="register" value="Register">
        </form>
    </div>
</div>

@endsection
