@extends('dashboard.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 mt-4">
            <h4>Welcome, {{ auth()->user()->name }}</h4>
        </div>
    </div>
</div>

@endsection