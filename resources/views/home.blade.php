@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">@lang('linguagem.dashboard')</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <!-- Permissão para listar usuários -->
                        @can('list-users')
                            
                            <div class="col-md-3">
                                <div style="cursor:pointer" onclick="window.location = '{{ route('users.index') }}'" class="card text-white bg-primary mb-3">
                                    <div class="card-header">@lang('linguagem.list',['page'=>__('linguagem.user_list')])</div>
                                    <div class="card-body">
                                        <p class="card-text">{{ __('linguagem.create_or_edit') }}</p>
                                    </div>
                                </div>
                            </div>

                        @endcan
                        <div class="col-md-3">
                            <div style="cursor:pointer" onclick="window.location = '{{ route('roles.index') }}'" class="card text-white bg-success mb-3">
                                <div class="card-header">@lang('linguagem.list',['page'=>__('linguagem.role_list')])</div>
                                <div class="card-body">
                                    <p class="card-text">{{ __('linguagem.create_or_edit') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div style="cursor:pointer" onclick="window.location = '{{ route('permissions.index') }}'" class="card text-white bg-danger mb-3">
                                <div class="card-header">@lang('linguagem.list',['page'=>__('linguagem.permission_list')])</div>
                                <div class="card-body">
                                    <p class="card-text">{{ __('linguagem.create_or_edit') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
