@extends('layouts.auth')

@section('title', 'Register')

@section('content')

@if($errors->any())
<div class="alert alert-danger">
    <ul style="padding-left: 12px;">
        @foreach($errors->all() as $err)
            <li>{{ $err }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('auth.post_register') }}" method="POST">
    @csrf
    <div class="form-group">
        <label class="font-weight-semibold" for="username">Username</label>
        <div class="input-affix">
            <i class="prefix-icon anticon anticon-user"></i>
            <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="{{ old('username') }}">
        </div>
    </div>
    <div class="form-group">
        <label class="font-weight-semibold" for="email">Email</label>
        <div class="input-affix">
            <i class="prefix-icon anticon anticon-mail"></i>
            <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{ old('email') }}">
        </div>
    </div>
    <div class="form-group">
        <label class="font-weight-semibold" for="password">Password</label>
        <div class="input-affix m-b-10">
            <i class="prefix-icon anticon anticon-lock"></i>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
        </div>
    </div>
    <div class="form-group">
        <label class="font-weight-semibold" for="password_confirmation">Password Confirmation</label>
        <div class="input-affix m-b-10">
            <i class="prefix-icon anticon anticon-lock"></i>
            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Password Confirmation">
        </div>
    </div>
    <div class="form-group">
        <div class="d-flex align-items-center justify-content-end">
            <span class="font-size-13 text-muted">
            <button class="btn btn-primary">Register</button>
        </div>
    </div>
</form>
@endsection
