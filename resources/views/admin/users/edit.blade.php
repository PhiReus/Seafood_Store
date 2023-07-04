@extends('admin.layouts.master')
@section('content')
    @include('sweetalert::alert')

    <main class="page-content">
        <section class="wrapper">
            <div class="panel-panel-default">
                <div class="market-updates">
                    <div class="container">
                        <div class="page-inner">
                            <header class="page-title-bar">
                                <h1 class="offset-4">Chỉnh sửa tài khoản</h1>
                            </header>
                            <div class="page-section">
                                <form action="{{ route('users.update', $user->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="tf1">Email<abbr name="Trường bắt buộc">*</abbr></label>
                                            <input name="email" type="text" class="form-control"
                                                value="{{ $user->email }}">
                                            <small id="" class="form-text text-muted"></small>
                                            @error('email')
                                                <div class="text text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="tf1">Pass word<abbr name="Trường bắt buộc">*</abbr></label>
                                            <input name="password" type="password" class="form-control"
                                                value="{{ $user->password }}">
                                            <small id="" class="form-text text-muted"></small>
                                            @error('password')
                                                <div class="text text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="tf1">Full name<abbr name="Trường bắt buộc">*</abbr></label>
                                            <input name="name" type="text" class="form-control"
                                                value="{{ $user->name }}">
                                            <small id="" class="form-text text-muted"></small>
                                            @error('name')
                                                <div class="text text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="tf1">Phone<abbr name="Trường bắt buộc">*</abbr></label>
                                            <input name="phone" type="number" class="form-control"
                                                value="{{ $user->phone }}">
                                            <small id="" class="form-text text-muted"></small>
                                            @error('phone')
                                                <div class="text text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="tf1">Date<abbr name="Trường bắt buộc">*</abbr></label>
                                            <input name="birthday" type="date" class="form-control"
                                                value="{{ $user->birthday }}">
                                            <small id="" class="form-text text-muted"></small>
                                            @error('birthday')
                                                <div class="text text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="tf1">Address<abbr name="Trường bắt buộc">*</abbr></label>
                                            <input name="address" type="text" class="form-control"
                                                value="{{ $user->address }}">
                                            <small id="" class="form-text text-muted"></small>
                                            @error('address')
                                                <div class="text text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="control-label" for="flatpickr01">Position<abbr
                                                    name="Trường bắt buộc">*</abbr></label>
                                            <select name="group_id" id="" class="form-control">
                                                <option value="">--Vui lòng chọn--</option>
                                                @foreach ($groups as $group)
                                                    <option value="{{ $group->id }}"
                                                        {{ $group->id == $user->group_id ? 'selected' : '' }}>
                                                        {{ $group->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('group_id')
                                                <p style="color:red">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label" for="flatpickr01">Gender<abbr
                                                    name="Trường bắt buộc">*</abbr></label>
                                            <select name="gender" id="" class="form-control">
                                                <option value="">--Vui lòng chọn--</option>
                                                <option value="Nam" {{ $user->gender == 'Nam' ? 'selected' : '' }}>Nam
                                                </option>
                                                <option value="Nữ" {{ $user->gender == 'Nữ' ? 'selected' : '' }}>Nữ
                                                </option>
                                                <option value="Khác" {{ $user->gender == 'Khác' ? 'selected' : '' }}>Khác
                                                </option>
                                            </select>
                                            @error('gender')
                                                <p style="color:red">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3">Image</label>
                                        <input type="file" class="form-control" name="image">
                                        @error('image')
                                            <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                        <img src="{{ asset($user->image) ?? asset('public/images/' . old('image', $user->image)) }}"
                                            width="90px" height="90px" id="blah1" alt="">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a class="btn btn-danger" href="{{ route('users.index') }}">Cancel</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
