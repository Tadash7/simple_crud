@extends('layouts.admin')

@section('title', __('labels.users'))

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mb-4 d-flex gap-3 justify-content-end">
                <a href="{{ route('users.create') }}" class="btn text-white btn-success" title="@lang('buttons.new')">
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
                                {{ __('labels.name') }}
                            </th>
                            <th scope="col">
                                {{ __('labels.email') }}
                            </th>
                            <th scope="col" width="5%">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                            <tr>
                                <th scope="row">
                                    {{ $user->id }}
                                </th>
                                <td>
                                    {{ $user->name }}
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <button class="btn text-success" data-toggle="modal" data-target="#modal"
                                            title="@lang('buttons.show')" onclick="showDetails({{ $user->id }})">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="btn text-info"
                                            title="@lang('buttons.edit')">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form method="POST" action="{{ route('users.destroy', ['user' => $user->id]) }}">
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
                {{ $users->onEachSide(2)->withQueryString()->links() }}
            </div>
        </div>
    </div>
    <script>
        function showDetails(i) {
            const url = "{{ route('users.show', ':user') }}".replace(":user", i);

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
