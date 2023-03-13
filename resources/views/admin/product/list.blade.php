@extends('admin.layout.index')
@section('main_content')
    <div class="col-md-12">
        <!--   Kitchen Sink -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Danh sách bài viết
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>User_id</th>
                                <th style="text-align: center"><a class="btn btn-primary"
                                        href="{{ route('admin.product.add') }}">ADD</a></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productsList as $index => $productList)
                                <tr id="product-{{ $productList->id }}">
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $productList->name }}</td>
                                    <td><img src="{{ asset($productList->image) }}" alt="" style="height: 60px ">
                                    </td>
                                    {{-- <td>{{ $productList->category_name }}</td> --}}
                                    <td>{{ $productList->user_id }}</td>
                                    <td style="text-align: center">
                                        <a class="btn btn-success"
                                            href="{{ route('admin.product.detail', ['id' => $productList->id]) }}">Detail</a>
                                        <a class="btn btn-warning"
                                            href="{{ route('admin.product.update', ['id' => $productList->id]) }}">Update</a>
                                        <button class="event-delete btn btn-danger" data-id="{{ $productList->id }}">delete
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $productsList->links('Admin.components.pagination') }}
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $(".event-delete").click(function() {
                swal({
                        title: "Are you sure?",
                        text: "Nếu xóa bài viết sẽ mất",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            var id = $(this).data('id');
                            $.ajax({
                                url: '/admin/product/delete?id=' + id,
                                type: 'GET',
                                success: function(html) {
                                    $("#product-" + id).remove();
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
@endsection
