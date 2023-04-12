@extends('layouts.master')
@section('title','Register')
@section('content')
<section class="login-page">
    <div class="login-form-box">
        <div class="login-title">Register</div>
        <div class="login-form">
            <form action="{{route('register')}}" method="post">
                

                <div class="field">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="@error('name') has-error @enderror" placeholder="name">
                    @error('name')
                        <span class="field-error">{{$message}}</span>
                    @enderror
                </div>

                <div class="field">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="@error('email') has-error @enderror" placeholder="email">
                    @error('email')
                        <span class="field-error">{{$message}}</span>
                    @enderror
                </div>

                <div class="field">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="@error('password') has-error @enderror" placeholder="*******">
                    @error('password')
                        <span class="field-error">{{$message}}</span>
                    @enderror
                </div>

                <div class="field">
                    <label for="password_confirmation"> Confirm Password</label>
                    <input type="password" id="password" name="password_confirmation" placeholder="********">
                </div>

                <div class="field">
                    <button type="submit" class="btn btn-primary btn-block" >Register</button>
                </div>
                @csrf
                <a href="{{route('login')}}" style="margin-top: 2.5em;  font-weight: bold;">Log In</a>
            </form>
        </div>
    </div>
</section>
@endsection