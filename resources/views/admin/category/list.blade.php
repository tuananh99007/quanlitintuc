@extends('admin.layout.index')
@section('main_content')
    <div class="col-md-12">
        <!--   Kitchen Sink -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Category List
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th style="text-align: center"><a class="btn btn-primary"
                                        href="{{ route('admin.category.add') }}">ADD</a></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categorysList as $index => $categoryList)
                                <tr id="category-{{ $categoryList->id }}">
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $categoryList->name }}</td>
                                    <td style="text-align: center">
                                        <a class="btn btn-success"
                                            href="{{ route('admin.category.detail', ['id' => $categoryList->id]) }}">Detail</a>
                                        <a class="btn btn-warning"
                                            href="{{ route('admin.category.update', ['id' => $categoryList->id]) }}">Update</a>
                                        <button class="event-delete btn btn-danger" data-id="{{ $categoryList->id }}">Delete
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $categorysList->links('Admin.components.pagination') }}
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $(".event-delete").click(function() {
                    swal({
                            title: "Are you sure?",
                            text: "Nếu xóa danh mục sẽ biến mất vĩnh viễn",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                var id = $(this).data('id');
                                $.ajax({
                                    url: '/admin/category/delete?id=' + id,
                                    type: 'GET',
                                    success: function(html) {
                                        $("#category-" + id).remove();
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
                $("#alert").slideUp(3000);
            });
        </script>
    </div>
@endsection
