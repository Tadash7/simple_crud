<div class="container-fluid">
    <h4 class="font-weight-bold text-center">
        Dados Usuário: {{ $user->name }}
    </h4>

    <hr />

    <dl>
        <dt>
            <h5 class="font-weight-bold">@lang('user.name')</h5>
        </dt>
        <dd>
            <p class="ml-4">{{ $user->name }}</p>
        </dd>
    </dl>

    <dl>
        <dt>
            <h5 class="font-weight-bold">@lang('user.email')</h5>
        </dt>
        <dd>
            <p class="ml-4">{{ $user->email }}</p>
        </dd>
    </dl>

</div>
