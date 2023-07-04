@extends('admin.layouts.master')
@section('content')
    @include('sweetalert::alert')

    <main class="page-content">
        <div class="container">
            <a href="{{ route('products.create') }}" class="btn btn-primary">Add new</a>
            <a href="{{ route('products.exportProduct') }}" class="btn btn-success">Export to Excel</a>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NAME</th>
                        <th scope="col">PRICE</th>
                        <th scope="col">IMAGE</th>

                        <th adta-breakpoints="xs">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $key => $product)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $product->name }}</td>
                            <td>{{ str_replace(',', '.', number_format(floatval($product->price))) . ' VND' }}</td>
                            <td><img width="90px" height="90px" src="{{ asset($product->image) }}" alt=""></td>
                            <td>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <a href="{{ route('products.edit', $product->id) }}"
                                        class="btn btn-primary btn-sm">Edit</a>
                                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm">See</a>
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Chuyễn vào thùng rác')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <nav class="float-right">
                {{ $products->links() }}
            </nav>
        </div>
    </main>
    @endsection
