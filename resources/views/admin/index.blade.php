@extends('layouts.app')

@section('content')

    <form method="GET" action="">
        <div style="padding: 0 2rem;" class="form-group row">
            <label class="col-form-label text-md-right">Từ Khoá</label>
            <div class="col-md-6">
                <div class="d-flex align-items-center">
                    <input class="form-control" placeholder="Vui lòng nhập địa chỉ email hoặc mật khẩu xem của bạn."
                           value="" name="keyword">
                </div>
            </div>
            <div class="col-md-5">
                <div class="d-flex align-items-center">
                    <button class="form-control btn btn-primary" style="margin: 0 20px; width: 120px"
                            type="submit">Tìm kiếm
                    </button>
                    <a href="" class="form-control btn btn-success w-auto"
                       role="button">Thêm </a>
{{--                    <a href="" class="form-control btn btn-danger w-auto"--}}
{{--                       style="margin-left: 20px"--}}
{{--                       role="button">CSV Export</a>--}}
                </div>
            </div>
        </div>
    </form>



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
{{--        <tbody>--}}
{{--        @forelse($users as $user)--}}
{{--            <tr>--}}
{{--                @if(app('request')->input('page'))--}}
{{--                    <th scope="row">{{ $loop->iteration + 20*(app('request')->input('page') - 1) }}</th>--}}
{{--                @else--}}
{{--                    <th scope="row">{{ $loop->iteration }}</th>--}}
{{--                @endif--}}
{{--                <td>{{$user->email}}</td>--}}
{{--                <td>{{$user->security_code}}</td>--}}
{{--                <td>{{$user->video_type}}</td>--}}
{{--            </tr>--}}
{{--        @empty--}}
{{--            <p class="text-center">適応ユーザーが見つけません。ご確認ください。</p>--}}
{{--        @endforelse--}}
{{--        </tbody>--}}
    </table>
{{--    {!! $users->links('pagination') !!}--}}
    <script>
        document.getElementById('sort').addEventListener('click', click)

        function click () {
            var url = window.location.href

            var order = 'desc'

            if (url.indexOf('desc') > -1) {
                order = 'asc'
            }

            window.location = updateQueryStringParameter(url, 'sort', order)
        }

        function updateQueryStringParameter (uri, key, value) {
            var re = new RegExp('([?&])' + key + '=.*?(&|$)', 'i')
            var separator = uri.indexOf('?') !== -1 ? '&' : '?'
            if (uri.match(re)) {
                return uri.replace(re, '$1' + key + '=' + value + '$2')
            } else {
                return uri + separator + key + '=' + value
            }
        }
    </script>
@endsection


