@extends('layouts.app')
@section('content')
    <form method="GET" action="{{ route('search',app()->getLocale()) }}">
        <div style="padding: 0 1rem;" class="form-group row">
            <label class="col-form-label text-md-right">@lang('home.keyword')</label>
            <div class="col-md-4">
                <div class="d-flex align-items-center">
                    <input class="form-control" placeholder="@lang('home.placeholder')"
                           value="" name="keyword">
                </div>
            </div>
            <div class="col-md-7">
                <div class="d-flex align-items-center">
                    <button class="form-control btn btn-primary" style="width: 120px"
                            type="submit">@lang('home.search')
                    </button>
                    <ul class="navbar-nav mr-auto" style="padding-left: 90px;">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" id="dropdown09" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">@lang('home.language')

                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdown09">
                                <a class="dropdown-item" href="{{ url('en/admin/') }}"><span
                                        class="flag-icon flag-icon-us"> </span> @lang('home.english')</a>
                                <a class="dropdown-item" href="{{ url('vi/admin/') }}"><span
                                        class="flag-icon flag-icon-vn"> </span> @lang('home.vietnamese')</a>

                            </div>
                        </li>
                    </ul>

                    <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" style="
                            margin-left: 30px;color: #3F7DC7">CSV
                            <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li style="padding: 5px 0;">

                                <a href="{{ route('admin.fileCSV-user',app()->getLocale()) }}"
                                   style="margin-left:13px "> @lang('home.import') CSV</a>
                            </li>
                            <li style="padding: 5px 0;">

                                <a href="{{ route('admin.exportCSV-user',app()->getLocale()) }} "
                                   style="margin-left:13px">@lang('home.export') CSV</a>
                            </li>
                        </ul>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" style="
                            margin-left: 30px;color: #3F7DC7"> @lang('home.hello') {{ Auth::guard('admin')->user()->username }}
                            <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li style="text-align: center;padding: 5px 0;">

                                <a href="{{ route('admin.logout',app()->getLocale()) }}">@lang('home.logout')</a>
                            </li>
                            <li style="text-align: center;padding: 5px 0;">

                                <a href="{{ route('admin.create',app()->getLocale()) }}">@lang('home.create_admin')</a>
                            </li>
                            <li style="text-align: center;padding: 5px 0;">
                                <a href=" {{ route('admin.create-user',app()->getLocale()) }}">@lang('home.create_user')</a>
                            </li>
                            <li style="text-align: center;padding: 5px 0;">
                                <a href="{{ route('admin.create-video',app()->getLocale()) }}">@lang('home.create_video')</a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </form>
    <div class="container">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#user">@lang('home.user')</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#admin">@lang('home.admin')</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#video">@lang('home.video')</a>
            </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <div id="user" class="container tab-pane active"><br>
                <table class="table table-stripped">
                    <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">@lang('home.email')</th>
                        <th scope="col">@lang('home.security_code')</th>
                        <th scope="col">@lang('home.video_name')</th>
                        <th scope="col">@lang('video.url')</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($user as $item)
                        <tr>
                            @if(app('request')->input('page'))
                                <th scope="row">{{ $loop->iteration + 20*(app('request')->input('page') - 1) }}</th>
                            @else
                                <th scope="row">{{ $loop->iteration }}</th>
                            @endif
                            <td>{{$item->email}}</td>
                            <td>{{$item->security_code}}</td>
                            <td>{{$item->video->name}}</td>
                            <td>
                                <a target="_blank" href="{{$item->video->url}}">
                                    <img src="{{asset('/images/'.$item->video->thumbnail_url)}}" alt=""
                                         class="switching" width="150" height="200">
                                </a>
                            </td>
                            <td>
                                @if( Auth::guard('admin')->user()->is_super_admin === 1)

                                    <a href="{{ route('admin.edit-user',['id'=>$item->id,'locale'=>(app()->getLocale())])}}"
                                       class="btn btn-info btn-sm"><i
                                            class="fa fa-pencil"></i> </a>
                                    <a href="{{ route('admin.destroy-user',['id'=>$item->id,'locale'=>(app()->getLocale())]) }}"
                                       class="btn btn-danger btn-sm"><i
                                            class="fa fa-trash-o"></i></a>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <p class="text-center">適応ユーザーが見つけません。ご確認ください。</p>
                    @endforelse
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {!! $user->links() !!}
                </div>
            </div>
            <div id="admin" class="container tab-pane fade"><br>
                <table class="table table-stripped">
                    <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">@lang('home.username')</th>
                        <th scope="col">@lang('home.password')</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody class="demo">
                    @forelse($admin as $admins)
                        <tr>
                            @if(app('request')->input('page'))
                                <th scope="row">{{ $loop->iteration + 20*(app('request')->input('page') - 1) }}</th>
                            @else
                                <th scope="row">{{ $loop->iteration }}</th>
                            @endif
                            <td>{{$admins->username}}</td>
                            <td>{{$admins->password}}</td>
                            <td>
                                @if( Auth::guard('admin')->user()->is_super_admin === 1)
                                    <div class="demo">

                                        <a href="{{ route('admin.edit-admin',['id'=>$admins->id,'locale'=>(app()->getLocale())]) }}"
                                           class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
                                    </div>
                                    <a href="{{ route('admin.destroy-admin',['id'=>$admins,'locale'=>(app()->getLocale())])}}"
                                       class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <p class="text-center">適応ユーザーが見つけません。ご確認ください。</p>
                    @endforelse
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {!! $admin->links() !!}
                </div>
            </div>
            <div id="video" class="container tab-pane fade"><br>
                <table class="table table-stripped">
                    <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">@lang('video.name')</th>
                        <th scope="col">@lang('video.thumbnail_url')</th>
                        <th scope="col">@lang('video.url')</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($video as $videos)
                        <tr>
                            @if(app('request')->input('page'))
                                <th scope="row">{{ $loop->iteration + 20*(app('request')->input('page') - 1) }}</th>
                            @else
                                <th scope="row">{{ $loop->iteration }}</th>
                            @endif
                            <td>{{$videos->name}}</td>
                            <td><a target="_blank" href="{{$videos->url}}">
                                    <img src="{{asset('/images/'.$videos->thumbnail_url)}}" alt="" class="switching" width="150" height="200">
                                </a>
                            </td>
                            <td>{{$videos->url}}</td>
                            <td>
                                @if( Auth::guard('admin')->user()->is_super_admin === 1)

                                    <a href="{{ route('admin.edit-video',['id'=>$videos->id,'locale'=>(app()->getLocale())]) }}" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i> </a>
                                    <a href="{{ route('admin.destroy-video',['id'=>$videos->id,'locale'=>(app()->getLocale())]) }}"  class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <p class="text-center">適応ユーザーが見つけません。ご確認ください。</p>
                    @endforelse
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {!! $user->links() !!}
                </div>
            </div>
        </div>
    </div>

@endsection


