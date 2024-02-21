@extends('layouts.app')

@section('body')
    <section class="vh-100" style="background-color: #9A616D;">
        <div class="container-lg h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-6 d-flex align-items-center h-100">
                    <div class="card shadow" style="flex: 1; border-radius: 1rem;">
                        <div class="card-header">{{ __('Reset Password') }}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf

                                <div class="form-group">
                                    <label for="email" class="form-label text-md-right">{{ __('labels.email') }}</label>

                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="pt-1 d-flex justify-content-end mt-4">
                                    <button type="submit" class="btn btn-primary text-white">
                                        {{ __('Send Password Reset Link') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
