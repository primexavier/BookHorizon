@extends('frontend.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form method="POST" action="{{ route('register') }}">
                @csrf
				<div class="login-form">
					<h4 class="login-title">{{ __('Register') }}</h4>
			    	<p><span class="font-weight-bold">I am a new customer</span></p>
						<div class="row">
							<div class="col-md-12 col-12 mb--15">
								<label for="email">{{ __('Name') }}</label>
								<input class="mb-0 form-control  @error('name') is-invalid @enderror" type="text" id="name" placeholder="Enter your full name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
							<div class="col-12 mb--20">
								<label for="email">{{ __('E-Mail Address') }}</label>
                                <input class="mb-0 form-control @error('email') is-invalid @enderror" type="email" id="email" placeholder="Enter Your Email Address Here.." name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
							<div class="col-lg-6 mb--20">
								<label for="password">{{ __('Password') }}</label>
								<input class="mb-0 form-control  @error('password') is-invalid @enderror" type="password" id="password" placeholder="Enter your password" name="password" value="{{ old('password') }}" required autocomplete="password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
							<div class="col-lg-6 mb--20">
								<label for="password">{{ __('Confirm Password') }}</label>
								<input class="mb-0 form-control" type="password" id="repeat-password" placeholder="Repeat your password" name="password_confirmation" required autocomplete="new-password">

                            </div>
							<div class="col-md-12">
                                <button type="submit" class="btn btn-outlined">
                                    {{ __('Register') }}
                                </button>                                 
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif                                                 
                                @if (Route::has('login'))
                                    <a class="btn btn-link" href="{{ route('login') }}">
                                        {{ __('Login') }}
                                    </a>
                                @endif
							</div>
						</div>
					</div>
				</div>
			</form>
        </div>
    </div>
</div>
<br>
@endsection
