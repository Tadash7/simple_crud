@extends('layouts.admin')

@if ($user->exists)
    @section('title', __('user.edit', ['user' => $user->name]))
@else
    @section('title', __('user.new'))
@endif

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('users.index') }}">
            {{ __('labels.users') }}
        </a>
    </li>
@endsection

@section('content')
    <div class="container-fluid col-lg-8">
        <form class="form-horizontal" method="POST"
            action=" @if ($user->exists) {{ route('users.update', $user) }} @else {{ route('users.store') }} @endif ">
            @if ($user->exists)
                @method('PUT')
            @endif
            <div class="card">
                @csrf
                <div class="card-body row g-3">
                    <div class="col-12">
                        <label for="name" class="form-label">
                            {{ __('user.name') }}
                        </label>
                        <input id="name" name="name" type="text"
                            class="form-control focus:outline-none focus:shadow-outline @error('name') invalid-input @enderror"
                            value="{{ old('name', $user->name) }}" required placeholder="{{ __('user.name') }}" />
                        @error('name')
                            <p class="text-red-500 text-xs italic mt-4">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="email" class="form-label">
                            {{ __('user.email') }}
                        </label>
                        <input name="email" type="text"
                            class="form-control focus:outline-none focus:shadow-outline @error('email') invalid-input @enderror"
                            value="{{ old('email', $user->email) }}" required placeholder="{{ __('user.email') }}" />
                        @error('email')
                            <p class="text-red-500 text-xs italic mt-4">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="password" class="form-label">
                            {{ __('user.password') }}
                        </label>
                        <input name="password" type="password"
                            class="form-control focus:outline-none focus:shadow-outline @error('password') invalid-input @enderror"
                            value="{{ old('password', '') }}" placeholder="{{ __('user.password') }}" />
                        @error('password')
                            <p class="text-red-500 text-xs italic mt-4">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="d-grid gap-3 d-md-flex justify-content-md-end">
                        <a role="button" href="{{ route('users.index') }}" class="btn btn-outline-secondary">
                            {{ __('buttons.back') }}
                        </a>
                        <button type="submit" class="btn btn-info">
                            {{ __('buttons.save') }}
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
