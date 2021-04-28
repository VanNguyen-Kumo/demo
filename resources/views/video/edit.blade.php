@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="{{ route('home',app()->getLocale()) }}" class="text-sm text-gray-700 underline card-header">@lang('home.home')</a>
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action=" {{ route('admin.update-video',['id'=>$video->id,'locale'=>(app()->getLocale())])}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label text-md-right">@lang('video.name')</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="name" value="{{old('name', $video->name)}}">
                                    @if($errors->has('name'))
                                        <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label text-md-right">@lang('video.url')</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="url" value="{{old('url', $video->url)}}">
                                    @if($errors->has('url'))
                                        <div class="alert alert-danger">{{ $errors->first('url') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label ">@lang('video.thumbnail_url')</label>
                                <div class="col-md-9">
                                    <input type="file" class="form-control" name="thumbnail_url" value="{{old('video', $video->thumbnail_url)}}" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                                    @if($errors->has('thumbnail_url'))
                                        <div class="alert alert-danger">{{ $errors->first('thumbnail_url') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-9" style="padding-left: 19%">
                                    <img src="{{asset('/images/'.$video->thumbnail_url)}}" id="output" alt="" class="switching" width="300px" height="300px" >
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary" style="width: 80%" >
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
