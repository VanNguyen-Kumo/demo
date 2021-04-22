@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="{{ route('home') }}" class="text-sm text-gray-700 underline card-header">Home</a>
                <div class="card">
                    <div class="card-header">{{ __('Thêm người dùng mới') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.store-admin') }}">
                            @csrf

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="username">
                                    @if($errors->has('username'))
                                        <div class="error">{{ $errors->first('username') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">{{ __('ConFirm Password') }}</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="confirm_password">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Save') }}
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
