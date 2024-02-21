@extends('layouts.admin')

@if ($package->exists)
    @section('title', __('package.edit', ['package' => $package->name]))
@else
    @section('title', __('package.new'))
@endif

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('packages.index') }}">
            {{ __('labels.packages') }}
        </a>
    </li>
@endsection

@section('content')
    <div class="container-fluid col-lg-8">
        <form class="form-horizontal" method="POST" enctype="multipart/form-data"
            action=" @if ($package->exists) {{ route('packages.update', $package) }} @else {{ route('packages.store') }} @endif ">
            @if ($package->exists)
                @method('PUT')
            @endif
            <div class="card">
                @csrf
                <div class="card-body">
                    <div class="d-flex">
                        <div class="container-fluid d-flex flex-column align-items-center justify-content-center"
                            style="max-width: 300px;">
                            <label for="thumbnail" class="form-label">
                                <div class="w-100" style="max-width: 200px; height: 200px;">
                                    <img id="imgThumbnail"
                                        @if (!empty($package->thumbnail)) src="{{ asset('storage/images/packages/' . $package->thumbnail) }}"
                                        @else
                                            src="https://i0.wp.com/thinkfirstcommunication.com/wp-content/uploads/2022/05/placeholder-1-1.png?fit=1200%2C800&ssl=1" @endif
                                        class="img-fluid img-thumbnail @error('thumbnail') border-danger @enderror w-100 h-100"
                                        style="object-fit: cover;">
                                </div>
                            </label>
                            <input type="file" accept="image/*"
                                class="form-control d-none @error('thumbnail') is-invalid @enderror" name="thumbnail"
                                id="thumbnail" />
                            @error('thumbnail')
                                <span class="invalid-feedback w-100 text-center" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="container-fluid" style="max-width: 300px;">
                                <button class="btn btn-info w-100" type="button" onclick="choseImage()">Upload</button>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <div class="row mb-3">
                                <label for="name" class="form-label">
                                    {{ __('package.name') }}
                                </label>
                                <div>
                                    <input id="name" name="name" type="text"
                                        class="form-control focus:outline-none focus:shadow-outline @error('name') invalid-input @enderror"
                                        value="{{ old('name', $package->name) }}" required
                                        placeholder="{{ __('package.name') }}" />
                                </div>
                                @error('name')
                                    <span class="text-red-500 text-xs italic mt-4">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label for="description" class="form-label">
                                    {{ __('package.description') }}
                                </label>
                                <div>
                                    <input name="description" type="text"
                                        class="form-control focus:outline-none focus:shadow-outline @error('description') invalid-input @enderror"
                                        value="{{ old('description', $package->description) }}"
                                        placeholder="{{ __('package.description') }}" />
                                </div>
                                @error('description')
                                    <span class="text-red-500 text-xs italic mt-4">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label for="price" class="form-label">
                                    {{ __('package.price') }}
                                </label>
                                <div>
                                    <input name="price" type="number" step=".01"
                                        class="form-control focus:outline-none focus:shadow-outline @error('price') invalid-input @enderror"
                                        value="{{ old('price', Number::format($package->price, precision: 2)) }}"
                                        placeholder="{{ __('package.price') }}" />
                                </div>
                                @error('price')
                                    <span class="text-red-500 text-xs italic mt-4">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-grid gap-3 d-md-flex justify-content-md-end">
                        <a role="button" href="{{ route('packages.index') }}" class="btn btn-outline-secondary">
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
    <script>
        function choseImage() {
            $('[name="thumbnail"]').click();
        }
        window.onload = function() {
            $('[type="file"]').on('change', function(e) {
                const file = e.target.files[0];
                $('#imgThumbnail').attr('src', URL.createObjectURL(file));
            });
        }
    </script>
@endsection
