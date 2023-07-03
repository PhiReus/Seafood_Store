@extends('admin.layouts.master')
@section('content')
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>

    <!-- Hiển thị chi tiết cầu thủ hiện tại -->
    <table class="table" border="1">
        <thead class="thead-dark">
            <tr>
                <th scope="col">SLUG</th>
                <th scope="col">DESCRETION</th>
                <th scope="col">QUANTITY</th>
                <th scope="col">STATUS</th>
                <th scope="col">CATEGORIES</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $productshow->slug }}</td>
                <td>{!! $productshow->description !!}</td>
                <td>{{ $productshow->quantity }}</td>
                <td>{{ $productshow->status }}</td>
                <td>{{ $productshow->category->name }}</td>
            </tr>
        </tbody>
    </table>
    <button class="btn btn-dark" onclick="window.history.back()">
        <i class="fa fa-arrow-left mr-2"></i> Quay lại
    </button>
@endsection
