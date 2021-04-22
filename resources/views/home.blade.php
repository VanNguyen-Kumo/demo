@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
{{--                    <div class="card-body">--}}
{{--                        <form method="GET" action="{{ route('sendMail') }}">--}}
{{--                            @csrf--}}
{{--                            <div class="form-group row">--}}
{{--                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <input type="email" class="form-control" name="email" required>--}}
{{--                                    @if($errors->has('email'))--}}
{{--                                        <div class="error">{{ $errors->first('email') }}</div>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="form-group row mb-0">--}}
{{--                                <div class="col-md-8 offset-md-4">--}}
{{--                                    <button type="submit" class="btn btn-primary">--}}
{{--                                        {{ __('Send') }}--}}
{{--                                    </button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
                    <h3>{{ $video->name }}</h3>
                </div>
            </div>
        </div>
    </div>

@endsection
