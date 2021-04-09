@extends('layouts.app')

@section('content')

    <form method="GET" action="">
        <div style="padding: 0 1rem;" class="form-group row">
            <label class="col-form-label text-md-right">Từ Khoá</label>
            <div class="col-md-5">
                <div class="d-flex align-items-center">
                    <input class="form-control" placeholder="Vui lòng nhập địa chỉ email hoặc mật khẩu xem của bạn."
                           value="" name="keyword">
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-center">
                    <button class="form-control btn btn-primary" style="margin: 0 20px; width: 120px"
                            type="submit">Tìm kiếm
                    </button>
                    @if( Auth::guard('admin')->user()->is_super_admin === 1)
                        <a href=" {{ route('admin.create-user') }}">Thêm </a>
                @endif
                    <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" style="
                            margin-left: 100px;">Xin chào {{ Auth::guard('admin')->user()->username }}
                            <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li style="text-align: center">
                                <a href="{{ route('admin.logout') }}">logout</a>
                            </li>
                            <li style="text-align: center">
                                <a href="{{ route('admin.create') }}">Register</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <h4 style="text-align: center;margin:25px 0">Danh sách khách hàng</h4>
    <table class="table table-stripped">
        <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">Email</th>
            <th scope="col">Mã Code</th>
            <th scope="col" id="sort">Khu video <span class="fa fa-sort"></span>
            </th>
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
                <td>{{$item->video_type}}</td>
            </tr>
        @empty
            {{--            <p class="text-center">適応ユーザーが見つけません。ご確認ください。</p>--}}
        @endforelse
        </tbody>
    </table>
    {{--    {!! $users->links('pagination') !!}--}}
@endsection


