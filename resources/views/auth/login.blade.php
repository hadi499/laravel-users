@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center ">
        <div class="col-md-4">
            @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            @endif
            @if (session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('loginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            @endif
            <div class="card p-3 mt-3 " style="background-color: #F5F7F8">
                {{-- <h2 class="text-center">Login</h2> --}}
                <form action="/login" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" autofocus
                            value="{{old('email')}}">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    {{-- <div class="mb-3 ">
                        {!! NoCaptcha::display() !!}
                        @if ($errors->has('g-recaptcha-response'))
                        <span class="text-danger">
                            <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                        </span>
                        @endif
                    </div> --}}
                    <div class="mb-3 d-grid col-8 mx-auto">
                        <button class="btn btn-outline-dark" type="submit">Log in</button>
                    </div>
                </form>
                <small class="d-block text-center">Not registered? <a href="/register"
                        class="text-decoration-none">Register
                        now!</a></small>
            </div>
        </div>
    </div>
</div>
@endsection