@extends('layouts.admin')

@section('content')
    <div class="container-fluid m-0">
        <div class="d-flex flex-wrap justify-content-evenly gap-2">
            @foreach ($packages as $package)
                <div class="card" style="max-width: 49%;">
                    <div class="row g-0 h-100">
                        <div class="col-md-4 h-100">
                            <img class="img-fluid rounded-start h-100" style="object-fit: cover; min-height: 200px"
                                @if (!str_starts_with($package->thumbnail, 'http')) src="{{ asset('storage/images/packages/' . $package->thumbnail) }}"
                                @else
                                    src="{{ $package->thumbnail }}" @endif />
                        </div>
                        <div class="col-md-8 h-100">
                            <div class="card-body d-flex flex-column h-100">
                                <h5 class="card-title">{{ $package->name }}</h5>
                                @if (!empty($package->description))
                                    <p class="card-text">{{ $package->description }}</p>
                                @endif
                                <p class="card-text fs-2 mt-auto">{{ Number::currency($package->price) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
