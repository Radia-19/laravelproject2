@extends('masterLayout')

@section('content')

<div class="row mt-3">
    <div class="col-8 offset-2">
        <h3>Login</h3>
        <form action="{{ route('user.login.show')}}" method="POST">
            @csrf
            <label class="form-label">Username: </label>
            <input class="form-control" type="text" name="username">
            <label class="form-label">Password: </label>
            <input class="form-control" type="password" name="password">

            <input class="btn btn-block btn-success mt-3" type="submit" name="login" value="Login">
        </form>
    </div>
</div>

@endsection
