@extends('layouts.admin')

@section('title')
    <title>Quản lý tài khoản</title>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Tài khoản', 'key' => 'Danh sách'])
        <div class="content">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-12">
                        <a href="{{ route('users.create') }}" class="btn btn-success float-right m-2">Thêm tài khoản</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên</th>
                                    <th>Email</th>
                                    <th>Ngày tạo</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->user_id }}</td>
                                        <td>{{ $user->name ?? $user->username }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->created_at ?? '' }}</td>
                                        <td>
                                            <a href="{{ route('users.edit', ['id' => $user->user_id]) }}"
                                                class="btn btn-warning btn-sm">Sửa</a>
                                            <form action="{{ route('users.destroy', ['id' => $user->user_id]) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Bạn chắc chắn muốn xóa?')">Xóa</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-3">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection