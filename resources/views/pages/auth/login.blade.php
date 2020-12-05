@extends('layout.master2')

@section('content')
<div class="page-content d-flex align-items-center justify-content-center">
    <div class="row w-100 mx-0 auth-page">
        <div class="col-md-8 col-xl-6 mx-auto">
             <div class="form-group">
                <a class="small" href="#">Home</a>
            </div>
            <div class="card">
                <div class="row">
                    <div class="col-md-4 pr-md-0">
                        <div class="auth-left-wrapper" style="background-image: url({{ url('https://via.placeholder.com/219x452') }})"></div>
                    </div>
                    <div class="col-md-8 pl-md-0">
                        <div class="auth-form-wrapper px-4 py-5">
                            <a href="#" class="noble-ui-logo d-block mb-2">INVESTORS <span>CONNECT</span></a>
                            <h5 class="text-muted font-weight-normal mb-4">Welcome back! Log in to your account.</h5>

                           @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                            @endif

                            @if($errors->any())
                            <ul>
                                <p style="color:red;">Unauthorized Access !!! </p>
                            </ul>
                            @endif


                            <form action="{{url('logincheck')}}" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                <input class="form-control py-4" id="inputEmailAddress" name="email" type="email" placeholder="Enter email address" />
                                @if ($errors->has('email'))
                                <span class="error">{{ $errors->first('email') }}</span>
                                @endif
                                </div>
                                
                                <div class="form-group">
                                <label class="small mb-1" for="inputPassword">Password</label>
                                <input class="form-control py-4" id="inputPassword" type="password" name="password" placeholder="Enter password" />
                                @if ($errors->has('password'))
                                <span class="error">{{ $errors->first('password') }}</span>
                                @endif
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" />
                                        <label class="custom-control-label" for="rememberPasswordCheck">Remember password</label>
                                    </div>
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                   <!--  <a class="small" href="#">Forgot Password?</a> -->
                                    <button class="btn btn-primary" type="submit">Login</button>
                                </div>
                               
                                <a href="{{ url('/auth/register') }}" class="d-block mt-3 text-muted">Not a user? Sign up</a> 
                                <a href="{{ url('/auth/setpasswd') }}" class="d-block mt-3 text-muted">Set Password</a>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection