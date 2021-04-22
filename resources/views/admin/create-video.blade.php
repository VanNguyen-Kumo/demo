@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="{{ route('home') }}" class="text-sm text-gray-700 underline card-header">Home</a>
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action=" {{ route('admin.store-video') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label text-md-right">{{ __('Name') }}</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="name">
                                    @if($errors->has('name'))
                                        <div class="error">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label text-md-right">{{ __('URL') }}</label>
                                <div class="col-md-9">
                                        <input type="text" class="form-control" name="url">
                                    @if($errors->has('url'))
                                        <div class="error">{{ $errors->first('url') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label ">{{ __('Thumbnail Url') }}</label>
                                <div class="col-md-9">
                                    <input type="file" class="form-control" name="thumbnail_url" style="height: calc(1.6em + 0.75rem + 7px);">
                                    @if($errors->has('thumbnail_url'))
                                        <div class="error">{{ $errors->first('thumbnail_url') }}</div>
                                    @endif
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
