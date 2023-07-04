@extends('admin.layouts.master')
@section('content')
    @include('sweetalert::alert')
    <main class="page-content">
        <div class="container">
            <a href="{{ route('categories.create') }}" class="btn btn-primary">Add new</a>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" class='w-5'>ID</th>
                        <th scope="col">NAME</th>
                        <th adta-breakpoints="xs">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $key => $category)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $category->name }}</td>
                            <td>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <a href="{{ route('categories.edit', $category->id) }}"
                                        class="btn btn-primary btn-sm">Edit</a>
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Chuyễn vào thùng rác')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- {{ $categories->appends(request()->query())->links('pagination::bootstrap-4') }} -->
        </div>
        <div class="card-footer">
            <nav class="float-right">
                {{ $categories->links() }}
            </nav>
        </div>
    </main>
@endsection
