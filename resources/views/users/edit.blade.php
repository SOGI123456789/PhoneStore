
@extends('layouts.admin')

@section('title')
<title>Sửa tài khoản</title>
@endsection

@section('content')
<div class="content-wrapper">
    @include('partials.content-header', ['name' => 'Tài khoản', 'key' => 'Sửa'])
    <div class="content">
        <div class="container-fluid">
            <form action="{{ route('users.update', ['id' => $user->user_id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Tên đăng nhập</label>
                    <input type="text" name="username" class="form-control" value="{{ $user->username }}" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                </div>
                <div class="form-group">
                    <label>Mật khẩu mới (bỏ trống nếu không đổi)</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <label>Xác nhận mật khẩu mới</label>
                    <input type="password" name="password_confirmation" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </form>
        </div>
    </div>
</div>
@endsection