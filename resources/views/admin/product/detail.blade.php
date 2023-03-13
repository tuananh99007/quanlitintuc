@extends('admin.layout.index')
@section('main_content')
    <div class="col-md-12">
        <!--   Kitchen Sink -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Chi tiết
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>image</th>
                                <th>users_id</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $productId->id }}</td>
                                <td>{{ $productId->title }}</td>
                                <td>{{ $productId->content }}</td>
                                <td><img src="{{ asset($productId->image) }}" alt="" style="height: 60px "></td>
                                <td>{{ $productId->user_id }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- End  Kitchen Sink -->
    </div>
    <div class="col-md-12">
        <!--   Kitchen Sink -->
        <script>
            $(document).ready(function() {
                $(".event-delete").click(function() {
                    swal({
                            title: "Are you sure?",
                            text: "Nếu xóa cmt xẽ biến mất vĩnh viễn",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                var id = $(this).data('id');
                                $.ajax({
                                    url: '/admin/product/deleteComment?product_id=' + id,
                                    type: 'GET',
                                    success: function(html) {
                                        $("#comment-" + id).remove();
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
