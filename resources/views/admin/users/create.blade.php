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
                                <h1 class="offset-4">Đăng ký tài khoản</h1>
                            </header>
                            <div class="page-section">
                                <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                                      @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="tf1">Email<abbr name="Trường bắt buộc">*</abbr></label>
                                            <input name="email" type="text" class="form-control"
                                                value="{{ old('email') }}">
                                            <small id="" class="form-text text-muted"></small>
                                            @error('email')
                                                <div class="text text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="tf1">Pass Word<abbr name="Trường bắt buộc">*</abbr></label>
                                            <input name="password" type="text" class="form-control"
                                                value="{{ old('password') }}">
                                            <small id="" class="form-text text-muted"></small>
                                            @error('password')
                                                <div class="text text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="tf1">Full Name<abbr name="Trường bắt buộc">*</abbr></label>
                                            <input name="name" type="text" class="form-control"
                                                value="{{ old('name') }}">
                                            <small id="" class="form-text text-muted"></small>
                                            @error('name')
                                                <div class="text text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="tf1">Phone<abbr name="Trường bắt buộc">*</abbr></label>
                                            <input name="phone" type="number" class="form-control"
                                                value="{{ old('phone') }}">
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
                                                value="{{ old('birthday') }}">
                                            <small id="" class="form-text text-muted"></small>
                                            @error('birthday')
                                                <div class="text text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="tf1">Address<abbr name="Trường bắt buộc">*</abbr></label>
                                            <input name="address" type="text" class="form-control"
                                                value="{{ old('address') }}">
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
                                                <option value="{{ $group->id }}">{{ $group->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if ('group_id')
                                            <p style="color:red">{{ $errors->first('group_id') }}</p>
                                        @endif
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label" for="flatpickr01">Gender<abbr
                                                name="Trường bắt buộc">*</abbr></label>
                                        <select name="gender" id="" class="form-control">
                                            <option value="">--Vui lòng chọn--</option>
                                            <option value="Nam">Nam</option>
                                            <option value="Nữ">Nữ</option>
                                            <option value="Khác">Khác</option>
                                            {{-- @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach --}}
                                        </select>
                                        @if ('gender')
                                            <p style="color:red">{{ $errors->first('gender') }}</p>
                                        @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3">Image</label>
                                        <input type="file" class="form-control" name="image">
                                        @error('image')
                                        <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">Register</button>
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
