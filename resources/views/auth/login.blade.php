@extends('layouts.app')

@section('body')
    <section class="vh-100" style="background-color: #9A616D;">
        <div class="container-lg h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-12 d-flex justify-content-center align-items-center h-100">
                    <div class="card shadow h-75" style="border-radius: 1rem;">
                        <div class="row g-0 h-100">
                            <div class="col-md-8 col-lg-7 d-none d-md-flex justify-content-center overflow-hidden h-100">
                                <img src="https://img.freepik.com/free-vector/sign-concept-illustration_114360-5267.jpg?w=1380&t=st=1707630717~exp=1707631317~hmac=48b4b3617399fa49714caf76a032ee804774b6113f044481d436094f655d42d0"
                                    alt="login form" class="object-fit-cover w-100" style="border-radius: 1rem 0 0 1rem;" />
                            </div>
                            <div class="col-md-4 col-lg-5 d-flex align-items-center h-100 border-start border-black">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form action="{{ route('login') }}" method="post">
                                        @csrf

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="d-flex align-items-center pb-1">
                                                    {{-- <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i> --}}
                                                    <span class="h1 fw-bold mb-0">
                                                        {{ config('app.name', 'Simple CRUD') }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <div class="col-12">
                                                <h5 class="fw-normal pb-3" style="letter-spacing: 1px;">
                                                    {{ __('labels.subSignIn') }}
                                                </h5>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-12">
                                                <div class="form-outline">
                                                    <label class="form-label"
                                                        for="email">{{ __('labels.email') }}</label>
                                                    <input type="email" id="email" name="email"
                                                        class="form-control form-control-lg @error('email') is-invalid @enderror"
                                                        value="{{ old('email') }}" required autoFocus />

                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <div class="col-12">
                                                <div class="form-outline">
                                                    <label class="form-label"
                                                        for="password">{{ __('labels.password') }}</label>
                                                    <input type="password" id="password" name="password"
                                                        class="form-control form-control-lg  @error('password') is-invalid @enderror"
                                                        required autocomplete="current-password" />

                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-12">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="remember"
                                                        id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                    <label class="form-check-label" for="remember">
                                                        {{ __('Remember Me') }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="pt-1 mb-4">
                                            <button class="btn btn-dark btn-lg btn-block"
                                                type="submit">{{ __('buttons.signIn') }}</button>
                                        </div>

                                        @if (Route::has('password.request'))
                                            <a class="small text-muted"
                                                href="{{ route('password.request') }}">{{ __('labels.forgotPassword') }}</a>
                                        @endif
                                        <p class="mb-5 pb-lg-2" style="color: #393f81;">
                                            {{ __('labels.signUpMissing') }} <a href="{{ __('register') }}"
                                                style="color: #393f81;">{{ __('buttons.clickHere') }}</a>
                                        </p>
                                        {{-- <a href="#!" class="small text-muted">Terms of use.</a> --}}
                                        {{-- <a href="#!" class="small text-muted">Privacy policy</a> --}}
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
