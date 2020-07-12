@extends('backend.layouts.app')

@section('content')
    <main class="page-section inner-page-sec-padding-bottom">
		<div class="container">
            <div class="row justify-content-center">
				<div class="col-sm-12 col-md-12 col-lg-10 col-xs-12">
                    <form method="POST" action="{{ route('admin.authenticate') }}">
                        @csrf
						<div class="login-form">
							<h4 class="login-title">{{ __('Login') }}</h4>
							<p><span class="font-weight-bold">I am a returning customer</span></p>
							<div class="row">
								<div class="col-md-12 col-12 mb--15">
									<label for="email">{{ __('E-Mail Address') }}</label>
                                    <input class="mb-0 form-control @error('email') is-invalid @enderror" id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
								</div>
								<div class="col-12 mb--20">
									<label for="password">{{ __('Password') }}</label>
                                    <input class="mb-0 form-control @error('password') is-invalid @enderror" type="password" id="login-password" placeholder="Enter your password" name="password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
								<div class="col-md-12">
                                    <button type="submit" class="btn btn-outlined">
									    {{ __('Login') }}
                                    </button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</main>
@endsection
