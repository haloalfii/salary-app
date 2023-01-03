@extends('layout.auth')

@section('content')
    <div class="row" style="height: 100vh">
        <div class="col-md-8 bg-auth"></div>
        <div class="col-md-4 d-flex align-items-center justify-content-center">
            <div class="card o-hidden shadow-sm " style="width: 340px">
                <div class="card-body p-0">
                    <div class="" style="padding: 32px">
                        <div class="mb-3">
                            <h1 class="h4 text-gray-900 mb-0">Create an Account!</h1>
                            <span>Please enter your data to Register</span>
                        </div>
                        <form class="user" action="/register" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name"
                                    class="form-control @error('name')
                                is-invalid
                            @enderror"
                                    id="name" placeholder="Full Name..">

                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
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
                                Register Account
                            </button>

                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="/login">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
