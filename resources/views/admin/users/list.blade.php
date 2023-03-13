@extends('admin.layout.index')
@section('main_content')
    <div class="col-md-12">
        <!--   Kitchen Sink -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Users List ADmin
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
                                <th style="text-align: center"><a class="btn btn-primary"
                                        href="{{ route('admin.users.add') }}">ADD</a></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usersList as $index => $userList)
                                <tr id="user-{{ $userList->id }}">
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $userList->name }}</td>
                                    <td><img src="{{ asset($userList->avatar) }}" alt="" style="height: 60px "></td>
                                    <td>{{ $userList->email }}</td>
                                    <td style="text-align: center">
                                        <a class="btn btn-success"
                                            href="{{ route('admin.users.detail', ['id' => $userList->id]) }}">Detail</a>
                                        <a class="btn btn-warning"
                                            href="{{ route('admin.users.update', ['id' => $userList->id]) }}">Update</a>
                                        <button class="event-delete btn btn-danger" data-id="{{ $userList->id }}">delete
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $usersList->links('Admin.components.pagination') }}
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $(".event-delete").click(function() {
                    swal({
                            title: "Are you sure?",
                            text: "Nếu xóa tài khoản sẽ biễn mất vĩnh viễn",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                var id = $(this).data('id');
                                $.ajax({
                                    url: '/admin/users/delete?id=' + id,
                                    type: 'GET',
                                    success: function(html) {
                                        $("#user-" + id).remove();
                                    }
                                });
                                swal("Đã xóa thành công", {
                                    icon: "success",
                                });
                            } else {
                                swal("ko xoa thi thoi");
                            }
                        });
                });
            });
        </script>
    </div>
@endsection
