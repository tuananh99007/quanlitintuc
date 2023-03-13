@extends('admin.layout.index')
@section('main_content')
    <div class="col-md-12">
        <!--   Kitchen Sink -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Chi tiết tài khoản
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Avatar</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $userID->id }}</td>
                                <td>{{ $userID->name }}</td>
                                <td><img src="{{ asset($userID->avatar) }}" alt="" style="height: 60px "></td>
                                <td>{{ $userID->email }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{ route('admin.users.list') }}" class="btn btn-info">Back</a>
                </div>
            </div>
        </div>
        <!-- End  Kitchen Sink -->
    </div>
@endsection
