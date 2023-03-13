@extends('admin.layout.index')
@section('main_content')
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Update tài khoản
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form role="form" method="POST" enctype="multipart/form-data"
                            action="{{ route('admin.users.postupdate', ['id' => $userID->id]) }}">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" type="text" name="name" value="{{ $userID->name }}">
                                @error('name')
                                    <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>email</label>
                                <input class="form-control" type="text" name="email" disabled
                                    value="{{ $userID->email }}">
                                @error('email')
                                    <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>password</label>
                                <input class="form-control" type="password" name="password" placeholder="Nhap pw">
                                @error('password')
                                    <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>xac nhan password</label>
                                <input class="form-control" type="password" name="password_confirmation"
                                    placeholder="xac nhan pw">
                                @error('password')
                                    <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>avatar</label>
                                <img src="{{ asset($userID->avatar) }}" alt="" style="height: 100px ">
                                <input type="file" name="avatar">
                                @error('avatar')
                                    <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-warning btn-sm">Update</button>
                            <a href="{{ route('admin.users.list') }}" class="btn btn-info">Back</a>
                        </form>
                    </div>
                </div>
            </div>
            <script>
                $(document).ready(function() {
                    $(".update").click(function() {
                        swal("Update thành công!", "", "success");
                    })
                });
            </script>
        </div>
    @endsection
