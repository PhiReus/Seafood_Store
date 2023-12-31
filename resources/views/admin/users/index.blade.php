@extends('admin.layouts.master')
@section('content')
    @include('sweetalert::alert')

    <style>
        img#avt {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            -moz-border-radius: 50%;
            -webkit-border-radius: 50%;
        }
    </style>
    <main class="page-content">

        <section class="wrapper">
            <section class="wrapper">
                <div class="table-agile-info">
                    <div class="panel-panel-default">
                        <header class="page-title-bar">
                            <h1 class="offset-4">Nhân sự</h1>
                            @if (Auth::user()->hasPermission('User_create'))
                                <a href="{{ route('users.create') }}" class="btn btn-info">Register for an HR account</a>
                                <a href="{{ route('users.export') }}" class="btn btn-success">Export Excel</a>
                            @endif
                        </header>
                        <hr>
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
                                        <th data-breakpoints="xs">ID</th>
                                        <th>AVATAR</th>
                                        <th>NAME</th>
                                        <th>PHONE</th>
                                        <th>POSITION</th>
                                        <th data-breakpoints="xs">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    @foreach ($users as $key => $user)
                                        <tr data-expanded="true" class="item-{{ $user->id }}">
                                            <td>{{ ++$key }}</td>
                                            <td><a href=""><img id="avt" src="{{ asset($user->image) }}"
                                                        alt=""></a></td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td>{{ $user->group->name }}</td>
                                            <td>
                                                @if (Auth::user()->hasPermission('User_update'))
                                                    <a href="{{ route('users.edit', $user->id) }}"
                                                        class="btn btn-warning">Edit</a>
                                                @endif
                                                @if (Auth::user()->hasPermission('User_forceDelete'))
                                                    <a data-href="{{ route('users.destroy', $user->id) }}"
                                                        id="{{ $user->id }}" class="btn btn-info deleteIcon">Delete</i></a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <nav class="float-right">
                        {{ $users->links() }}
                    </nav>
                </div>
            </section>
            <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
            {{-- <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js'></script> --}}
            <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.js"></script>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                $(document).on('click', '.deleteIcon', function(e) {
                    let id = $(this).attr('id');
                    let href = $(this).data('href');
                    let csrf = '{{ csrf_token() }}';
                    console.log(id);
                    Swal.fire({
                        title: 'Bạn có chắc không?',
                        text: "Bạn sẽ không thể hoàn nguyên điều này!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Có, xóa!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: href,
                                method: 'delete',
                                data: {
                                    _token: csrf
                                },
                                success: function(res) {
                                    Swal.fire(
                                        'Deleted!',
                                        'Tệp của bạn đã bị xóa!',
                                        'success'
                                    )
                                    $('.item-' + id).remove();
                                }
                            })
                            window.location.reload();
                        }
                    })
                });
            </script>
        </section>
    </main>
@endsection
