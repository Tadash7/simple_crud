@extends('layouts.app')

@section('body')
    <section class="vh-100" style="background-color: #9A616D;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-12 d-flex justify-content-center align-items-center h-100">
                    <div class="card shadow h-75" style="border-radius: 1rem;">
                        <div class="row g-0 h-100">
                            <div class="col-md-4 col-lg-5 d-flex align-items-center h-100 border-end border-black">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form action="{{ route('register') }}" method="post">
                                        @csrf

                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            {{-- <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i> --}}
                                            <span class="h1 fw-bold mb-0">
                                                {{ config('app.name', 'Simple CRUD') }}
                                            </span>
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">
                                            {{ __('labels.subSignUp') }}
                                        </h5>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="name">{{ __('labels.name') }}</label>
                                            <input type="name" id="name" name="name"
                                                class="form-control form-control-lg" value="{{ old('name') }}" required
                                                autofocus autocomplete="name" />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="email">{{ __('labels.email') }}</label>
                                            <input type="email" id="email" name="email"
                                                class="form-control form-control-lg" value="{{ old('email') }}" required
                                                autocomplete="email" />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="password">{{ __('labels.password') }}</label>
                                            <input type="password" id="password" name="password"
                                                class="form-control form-control-lg" required autocomplete="new-password" />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label"
                                                for="password_confirmation">{{ __('labels.confirmPassword') }}</label>
                                            <input type="password" id="password_confirmation" name="password_confirmation"
                                                class="form-control form-control-lg" required autocomplete="new-password" />
                                        </div>

                                        <div class="pt-1 mb-4">
                                            <button class="btn btn-dark btn-lg btn-block"
                                                type="submit">{{ __('buttons.signUp') }}</button>
                                        </div>

                                        <p class="mb-5 pb-lg-2" style="color: #393f81;">{{ __('labels.haveSignIn') }} <a
                                                href="{{ __('login') }}"
                                                style="color: #393f81;">{{ __('buttons.clickHere') }}</a>
                                        </p>
                                        {{-- <a href="#!" class="small text-muted">Terms of use.</a> --}}
                                        {{-- <a href="#!" class="small text-muted">Privacy policy</a> --}}
                                    </form>

                                </div>
                            </div>
                            <div class="col-md-8 col-lg-7 d-none d-md-flex justify-content-center overflow-hidden h-100">
                                <img src="https://img.freepik.com/free-vector/sign-up-concept-illustration_114360-7865.jpg?w=1380&t=st=1707630742~exp=1707631342~hmac=18c9c583965e0b307ae55959f68c2cb487c037bbebce81e706265bf3ba1e48b1"
                                    alt="login form" class="object-fit-cover w-100" style="border-radius: 0 1rem 1rem 0;" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
