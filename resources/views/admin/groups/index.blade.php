@extends('admin.layouts.master')
@section('content')
    @include('sweetalert::alert')

    <main class="page-content">
        <div class="container">
            <section class="wrapper">
                <div class="table-agile-info">
                    <div class="panel-panel-default">
                        <header class="page-title-bar">

                        </header>
                        <hr>
                        <div class="panel-heading">
                            <h2 class="offset-4">Danh Sách Nhóm Nhân Viên</h2>
                        </div>
                        <nav aria-label="breadcrumb">
                            @if (Auth::user()->hasPermission('Group_create'))
                                <a href="{{ route('groups.create') }}" class="btn btn-success">Create a staff group</a>
                            @endif

                        </nav>
                        <div>
                            <table class="table" ui-jq="footable"
                                ui-options='{
                "paging": {
                "enabled": true
                },
                "filtering": {
                "enabled": true
                },
                "sorting": {
                "enabled": true
                }}'>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>NAME</th>
                                        <th>UNDERTAKER</th>
                                        <th data-breakpoints="xs">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    @foreach ($groups as $key => $group)
                                        <tr data-expanded="true" class="item-{{ $group->id }}">
                                            <td>{{ $key + 1 }}</td>

                                            <td>{{ $group->name }} </td>
                                            <td>Hiện có {{ count($group->users) }} người</td>
                                            <td>
                                                <form action="{{ route('groups.destroy', $group->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    @if (Auth::user()->hasPermission('Group_update'))
                                                        <a class="btn btn-primary "
                                                            href="{{ route('groups.detail', $group->id) }}">Grant
                                                            Permission</a>
                                                    @endif
                                                    @if (Auth::user()->hasPermission('Group_edit'))
                                                        <a href="{{ route('groups.edit', $group->id) }}"
                                                            class="btn btn-warning">Edit</a>
                                                    @endif
                                                    @if (Auth::user()->hasPermission('Group_edit'))
                                                        <a href="{{ route('groups.destroy', $group->id) }}"
                                                            id="{{ $group->id }}"
                                                            class="btn btn-danger sm deleteIcon">Delete</a>
                                                    @endif
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $groups->appends(request()->query()) }}
                        </div>
                    </div>
            </section>
        </div>
    </main>
@endsection
