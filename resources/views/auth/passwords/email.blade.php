@extends('website_layouts.master')
@section('content')
<!-- <div class="px-3 px-md-0 mt-5 pt-3">
    <div class="mt-3">
        <div class="p-3 bg-white border_radius">
            <h4 class="text-center py-3">Forgot Password</h4>
            <h6>Please enter your email address to request a password reset.</h6>
            <div class="form-group">
                <label for="fn" style="font-size: 13px;font-weight: 500" class="">Username / Email</label>
                <input type="text" class="form-control p-2" placeholder="Enter username or email" id="fn">
            </div>


            <div>
              <a href="">
                 <button class="btn btn-primary w-100">Forgot Password</button>
              </a>
            </div>
        </div>
    </div>
</div> -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                      @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
