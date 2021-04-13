@extends('layouts.app')
<style>
    .table th, .table td {
        padding: 10px 10px !important;
    }
    .demo a{
        margin-bottom: 10px;
    }
</style>
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
                    <a href="{{ route('admin.exportCSV-user') }}" tyle="margin-left: 70px;">Export CSV</a>
                    <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" style="
                            margin-left: 50px;color: #3F7DC7">Xin chào {{ Auth::guard('admin')->user()->username }}
                            <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li style="text-align: center;padding: 5px 0;">
                                <a href="{{ route('admin.logout') }}">logout</a>
                            </li>
                            <li style="text-align: center;padding: 5px 0;">
                                <a href="{{ route('admin.create') }}">Register</a>
                            </li>
                            <li style="text-align: center;padding: 5px 0;">
                                @if( Auth::guard('admin')->user()->is_super_admin === 1)
                                    <a href=" {{ route('admin.create-user') }}">Create User</a>
                                @endif
                            </li>
                            <li style="text-align: center;padding: 5px 0;">
                                @if( Auth::guard('admin')->user()->is_super_admin === 1)
                                    <a href="{{ route('admin.create-admin') }}">Create Admin</a>
                                @endif
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
                    <a class="nav-link active" data-toggle="tab" href="#menu1">User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#menu2">Admin</a>
                </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div id="menu1" class="container tab-pane active"><br>
                    <table class="table table-stripped">
                        <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Email</th>
                            <th scope="col">Sevurity Code</th>
                            <th scope="col">Video Type</th>
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
                                <td>{{$item->video_type}}</td>
                                <td>
                                    @if( Auth::guard('admin')->user()->is_super_admin === 1)
                                    <a href="{{ route('admin.edit-user',$item->id) }}" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i> Update </a>
                                    <a href="{{ route('admin.destroy-user',$item->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> Delete </a>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            {{--            <p class="text-center">適応ユーザーが見つけません。ご確認ください。</p>--}}
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <div id="menu2" class="container tab-pane fade"><br>
                    <table class="table table-stripped">
                        <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">UserName</th>
                            <th scope="col">PassWord</th>
                            <th scope="col" id="sort">Is_super_admin<span class="fa fa-sort"></span></th>
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
                                <td>{{$admins->is_super_admin}}</td>
                                <td>
                                    @if( Auth::guard('admin')->user()->is_super_admin === 1)
                                        <div class="demo">
                                            <a href="{{ route('admin.edit-admin',$admins->id) }}" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i> Update </a>
                                        </div>
                                    <a href="{{ route('admin.destroy-admin',$admins->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> Delete </a>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            {{--            <p class="text-center">適応ユーザーが見つけません。ご確認ください。</p>--}}
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

@endsection


