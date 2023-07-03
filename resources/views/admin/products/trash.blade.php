@extends('admin.layouts.master')
@section('content')
    <table class="table" style="text-align: center;">
        <h1 style="text-align: center; color: black;">Thùng rác</h1>
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NAME</th>
                <th scope="col">PRICE</th>
                <th scope="col">SLUG</th>
                <th scope="col">DESCRETION</th>
                <th scope="col">QUANTITY</th>
                <th scope="col">STATUS</th>
                <th scope="col">CATEGORIES</th>
                <th scope="col">IMAGE</th>
                <th scope="col">ATC</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($softs as $key => $soft)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>{{ $soft->name }}</td>
                    <td>{{ number_format($soft->price, 0, ',', '.') }} VND</td>
                    <td>{{ $soft->slug }}</td>
                    <td>{{ $soft->description }}</td>
                    <td>{{ $soft->quantity }}</td>
                    <td>{{ $soft->status }}</td>
                    <td>{{ $soft->category->name  }}</td>
                    <td><img width="90px" height="90px" src="{{ asset($soft->image) }}" alt=""></td>
                    <td>
                        <a href="{{ route('products.restore', [$soft->id]) }}"
                            onclick="return confirm('Bạn có muốn khôi phục không?');" class="btn btn-warning">Khôi phục
                           </a>
                        <a href="{{ route('products.deleteforever', [$soft->id]) }}"
                            onclick="return confirm('Bạn có chắc chắn xóa vĩnh viễn không?');" class="btn btn-secondary">Xóa
                            vĩnh viễn</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('products.index') }}" class="btn btn-info">Trở lại</a> <br>
@endsection
