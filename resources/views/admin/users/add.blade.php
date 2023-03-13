@extends('admin.layout.index')
@section('main_content')
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Thêm Tài Khoản
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form role="form" method="POST" action="{{ route('admin.users.postadd') }}">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" type="text" name="name" value="{{ old('name') }}"
                                    placeholder="nhap name">
                                @error('name')
                                    <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>email</label>
                                <input class="form-control" type="text" name="email" value="{{ old('email') }}"
                                    placeholder="nhap name">
                                @error('email')
                                    <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>password</label>
                                <input class="form-control" type="password" name="password" placeholder="nhap name">
                                @error('password')
                                    <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>xac nhan password</label>
                                <input class="form-control" type="password" name="password_confirmation"
                                    placeholder="nhap name">
                                @error('password')
                                    <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Role</label>
                                <select name="role">
                                    @if ($usersLogin->role == 9)
                                        <option value="">Chọn Role . . .</option>
                                        <option value="9">Manager</option>
                                        <option value="1">Admin</option>
                                        <option value="0">Users</option>
                                    @else
                                        <option value="0">Users</option>
                                    @endif
                                </select>
                                @error('role')
                                    <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-default">Add</button>
                            <a href="{{ route('admin.users.list') }}" class="btn btn-info">Back</a>
                        </form>
                    </div>
                    <!-- /.col-lg-6 (nested) -->
                </div>
                <!-- /.row (nested) -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
@endsection
