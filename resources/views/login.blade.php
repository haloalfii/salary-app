@extends('layout.auth')

@section('content')
    <div class="row" style="height: 100vh">
        <div class="col-md-8 bg-auth"></div>
        <div class="col-md-4 d-flex align-items-center justify-content-center">
            <div class="card o-hidden shadow-sm " style="width: 340px">
                <div class="card-body p-0">
                    <div class="" style="padding: 32px">
                        <div class="mb-3">
                            <h1 class="h4 text-gray-900 mb-0">Login!</h1>
                            <span>Please enter email and password to Login</span>
                        </div>
                        <form class="user" action="/login" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email"
                                    class="form-control @error('email')
                                is-invalid
                            @enderror"
                                    id="email" placeholder="Email Address...">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password"
                                    class="form-control @error('password')
                                is-invalid
                            @enderror"
                                    id="password" placeholder="Password...">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">
                                Login
                            </button>

                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="/register">Doesn't have an account? Register!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
