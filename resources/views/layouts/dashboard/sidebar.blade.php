<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('home') }}" class="brand-link">
        <img src="{{ asset('/img/logo.png') }}" alt="Oversee Logo" class="brand-image img-circle" />
        <span class="brand-text font-weight-light">
            {{ config('app.name', 'Oversee Server') }}
        </span>
    </a>

    <div class="sidebar">
        {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img
                    src="{{ asset(Auth::user()->avatar ?? "/bower_components/admin-lte/img/user2-160x160.jpg") }}"
                    class="img-circle elevation-2"
                    alt="{{ Auth::user()->name ?? __('John Doe') }}"
                />
            </div>
            <div class="info">
                <a href="#" class="d-block">
                    {{ Auth::user()->name ?? __('John Doe') }}
                </a>
            </div>
        </div> --}}

        {{-- {{ $myMenu }} --}}
    </div>
</aside>
