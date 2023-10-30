@extends('dashboard.main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Change Password</h1>
</div>

<div class="col-lg-4">

    <form action="/dashboard/changepassword" method="POST" enctype="multipart/form-data">
        @method('put')
        @csrf

        <div class="mb-3">
            <label for="password" class="form-label">New Password</label>
            <input type="password" class="form-control @error('password')is-invalid @enderror" id="password"
                name="password">
            @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>


        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input type="password" class="form-control @error('password')is-invalid @enderror"
                id="password_confirmation" name="password_confirmation">
            @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>


        <button type="submit" class="btn btn-primary mb-5">Submit</button>
    </form>
</div>



@endsection