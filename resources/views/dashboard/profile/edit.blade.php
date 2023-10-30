@extends('dashboard.main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Post</h1>
</div>

<div class="col-lg-8">

    <form action="/dashboard/profile/edit" method="POST" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error('name')is-invalid @enderror" id="name" name="name"
                value="{{ old('name', auth()->user()->name) }}" autofocus>
            @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control @error('username')is-invalid @enderror" id="username" name="username"
                value="{{ old('username', auth()->user()->username) }}" autofocus>
            @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email')is-invalid @enderror" id="email" name="email"
                value="{{ old('email', auth()->user()->email) }}">
            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        {{-- <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control @error('password')is-invalid @enderror" id="password"
                name="password" value="{{ old('password', auth()->user()->password) }}">
            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div> --}}

        <div class="mb-3">
            <label for="profile" class="form-label @error('profile')is-invalid @enderror">Profile Image</label>
            <input type="hidden" name="oldImage" value="{{ auth()->user()->profile }}">
            @if (auth()->user()->profile)
            <img src="{{ asset('storage/' . auth()->user()->profile) }}"
                class="img-preview img-fluid mb-3 col-sm-5 d-block">
            @else
            <img class="img-preview img-fluid mb-3 col-sm-5">
            @endif
            <img class="img-preview img-fluid mb-3 col-sm-5">
            <input class="form-control" type="file" id="profile" name="profile" onchange="previewImage()">
            @error('image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mb-5">update</button>
    </form>
</div>



@endsection