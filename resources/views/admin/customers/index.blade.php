@extends('admin.layouts.master')
@section('content')
    @include('sweetalert::alert')

    <main class="page-content">
        <div class="container">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NAME</th>
                        <th scope="col">PHONE</th>
                        <th scope="col">ADDRESS</th>
                        <th scope="col">EMAIL</th>
                        <th scope="col">IMAGE</th>
                        <th adta-breakpoints="xs">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $key => $customer)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->phone }}</td>
                            <td>{{ $customer->address }}</td>
                            <td>{{ $customer->email }}</td>
                            <td><img width="90px" height="90px" src="{{ asset($customer->image) }}" alt=""></td>
                            <td>
                                <form action="{{ route('customers.destroy', $customer->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <a href="{{ route('customers.edit', $customer->id) }}"
                                        class="btn btn-primary btn-sm">Edit</a>
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Bạn có muốn xóa ?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <nav class="float-right">
                {{ $customers->links() }}
            </nav>
        </div>
    </main>
@endsection
