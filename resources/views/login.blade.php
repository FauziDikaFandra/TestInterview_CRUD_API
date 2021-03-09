@extends('Layout/main')

@section('container')
<div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="/images/login.jpg" alt="login" class="login-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper">
                <img src="/images/logo.svg" alt="logo" class="logo">
              </div>
              <p class="login-card-description">Sign into your account</p>
              <form action="{{url('/login')}}" method="post">
                  <div class="form-group">
                    <label for="user" class="sr-only">User Name</label>
                    <input type="text" name="user" id="user" class="form-control" placeholder="User Id">
                  </div>
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="***********">
                  </div>
                  <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
                  <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                  <span style="color: red;">{{$status ?? '' != '' ?  'Username or password Invalid !!!' : ''}}</span>
                </form>                
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection