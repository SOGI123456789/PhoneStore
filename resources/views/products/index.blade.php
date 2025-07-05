@extends('layouts.admin')

@section('content')
    <h1>Danh sách sản phẩm</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Thêm sản phẩm</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tên</th>
                <th>Mô tả</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Ảnh</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ number_format($product->price, 0, ',', '.') }} đ</td>
                <td>{{ $product->quantity }}</td>
                <td>
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="Ảnh" width="60">
                    @else
                        Không có ảnh
                    @endif
                </td>
                <td>
                    <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-warning">Sửa</a>
                    <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Bạn chắc chắn muốn xóa?')">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection