@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('home.login')</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.login',app()->getLocale())}}">
                        @csrf
                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">@lang('home.username')</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username">
                                @if($errors->has('username'))
{{--                                    <div class="alert alert-danger">{{ $message }}</div>--}}
                                    <div class="alert alert-danger">{{ $errors->first('username') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">@lang('home.password')</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">
                                @if($errors->has('password'))
                                    <div class="alert alert-danger">{{ $errors->first('password') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    @lang('home.login')
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
