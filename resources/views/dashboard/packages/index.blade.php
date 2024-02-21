@extends('layouts.admin')

@section('title', __('labels.packages'))

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mb-4 d-flex gap-3 justify-content-end">
                <a href="{{ route('packages.create') }}" class="btn text-white btn-success" title="@lang('buttons.new')">
                    <i class="fas fa-plus"></i>
                    @lang('buttons.new')
                </a>
                <form method="get" onSubmit="(e) => e.preventDefault()">
                    <div class="input-group">
                        <input type="search" id="table_search" name="table_search" class="form-control"
                            placeholder="{{ __('buttons.search') }}" style="border-radius: 5rem 0 0 5rem;" />
                        <button type="button" class="btn btn-primary text-white" style="border-radius: 0 5rem 5rem 0;">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-12">
                <table class="table table-head-fixed table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">
                                #
                            </th>
                            <th scope="col">
                                {{ __('package.name') }}
                                <br><small class="color-gray">{{ __('package.description') }}</small>
                            </th>
                            <th scope="col">
                                {{ __('package.price') }}
                            </th>
                            <th scope="col" width="5%">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($packages as $package)
                            <tr>
                                <th scope="row">
                                    {{ $package->id }}
                                </th>
                                <td>
                                    <div class="d-flex gap-2">
                                        <div class="w-100" style="max-width: 75px; height: 75px;">
                                            <img id="imgThumbnail"
                                                src="{{ asset('storage/images/packages/' . $package->thumbnail) }}"
                                                class="img-fluid img-thumbnail w-100 h-100" style="object-fit: cover;">
                                        </div>
                                        <p>
                                            {{ $package->name }}
                                            <br>
                                            <small>{{ $package->description ?: '' }}</small>
                                        </p>
                                    </div>
                                </td>
                                <td>{{ Number::currency($package->price / 100) }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <button class="btn text-success" data-toggle="modal" data-target="#modal"
                                            title="@lang('buttons.show')" onclick="showDetails({{ $package->id }})">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <a href="{{ route('packages.edit', ['package' => $package->id]) }}"
                                            class="btn text-info" title="@lang('buttons.edit')">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form method="POST"
                                            action="{{ route('packages.destroy', ['package' => $package->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn text-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">
                                    {{ __('labels.empty') }}
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $packages->onEachSide(2)->withQueryString()->links() }}
            </div>
        </div>
    </div>
    <script>
        function showDetails(i) {
            const url = "{{ route('packages.show', ':package') }}".replace(":package", i);

            $('#loader').show();

            $("#showModal .modal-body").load(url, function(res, status, xhr) {
                $('#loader').hide();
                if (xhr.status >= 400) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    Toast.fire({
                        icon: 'error',
                        title: "{{ __('labels.cantFind') }}"
                    });
                    return;
                }
                $("#showModal").modal('show');
            });
        }
    </script>
@endsection
