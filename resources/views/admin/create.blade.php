@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="{{ route(config('constants.locale'),'admin.home') }}" class="text-sm text-gray-700 underline card-header">@lang('home.home')</a>
                <div class="card">
                    <div class="card-header">@lang('home.add_user')</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route(config('constants.locale'),'admin.store-admin') }}">
                            @csrf

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">@lang('home.username')</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="username">
                                    @if($errors->has('username'))
                                        <div class="alert alert-danger">{{ $errors->first('username') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">@lang('home.password')</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">{@lang('home.confirm_password')</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="confirm_password">
                                    @if($errors->has('username'))
                                        <div class="alert alert-danger">{{ $errors->first('confirm_password') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        @lang('home.save')
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
