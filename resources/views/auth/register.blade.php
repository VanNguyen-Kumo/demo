@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">@lang('home.register')</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.store',app()->getLocale()) }}">
                            @csrf

                            <div class="form-group row">
                                <label for="username"
                                       class="col-md-4 col-form-label text-md-right">@lang('home.username')</label>

                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control" name="username"
                                           autocomplete="username">
                                    @if($errors->has('username'))
                                        <div class="alert alert-danger">{{ $errors->first('username') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right">@lang('home.password')</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password">
                                    @if($errors->has('password'))
                                        <div class="alert alert-danger">{{ $errors->first('password') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="confirm_password"
                                       class="col-md-4 col-form-label text-md-right">@lang('home.confirm_password')</label>
                                <div class="col-md-6">
                                    <input  type="password" class="form-control" name="confirm_password">
                                    @if($errors->has('confirm_password'))
                                        <div class="alert alert-danger">{{ $errors->first('confirm_password') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        @lang('home.register')
                                    </button>

                                </div>

                            </div>
                            <a href="{{ route('admin.login',app()->getLocale()) }}" class="text-sm text-gray-700 underline">@lang('home.login')</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
