@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="{{ route('home') }}" class="text-sm text-gray-700 underline card-header">Home</a>
                <div class="card">

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.store-user') }}" id="myform">
                            @csrf
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email">
                                    @if($errors->has('email'))
                                        <div class="error">{{ $errors->first('email') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">{{ __('Security_code') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="security_code">
                                    @if($errors->has('security_code'))
                                        <div class="error">{{ $errors->first('security_code') }}</div>
                                    @endif
                                </div>
                            </div>
{{--                            <div class="form-group">--}}
{{--                               <div class="row">--}}
{{--                                   <label class="col-md-4 col-form-label text-md-right">{{ __('Video_type') }}</label>--}}
{{--                                   <div class="col-md-6">--}}
{{--                                       <select class="form-control" id="exampleFormControlSelect1" name="video_type">--}}
{{--                                           <option>A</option>--}}
{{--                                           <option>B</option>--}}
{{--                                       </select>--}}
{{--                                   </div>--}}
{{--                               </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group row">--}}
{{--                                <label class="col-md-4 col-form-label text-md-right">{{ __('Token_code') }}</label>--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <input type="text" class="form-control" name="Token_code">--}}
{{--                                </div>--}}
{{--                            </div>--}}
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
    @include('vendor.lrgt.ajax_script', ['form' => '#myform', 'request'=>'App\Http\Requests\RegistrationRequest','on_start'=>true])
@endsection
