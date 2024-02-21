<div class="container-fluid">
    <h4 class="font-weight-bold text-center">
        Dados do Pacote: {{ $package->name }}
    </h4>

    <hr />

    <div class="d-flex">
        <div class="card">
            <img src="{{ asset('storage/images/packages/' . $package->thumbnail) }}"
                class="img-fluid card-img-top w-100 h-100" style="object-fit: cover;">
            <div class="card-body">
                <h5 class="card-title">{{ $package->name }}</h5>
                @if (!empty($package->description))
                    <p class="card-text">{{ $package->description }}</p>
                @endif
                <p class="fs-2">{{ Number::currency($package->price) }}</p>
            </div>
        </div>
    </div>
</div>
