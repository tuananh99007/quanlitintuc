@extends('admin.layout.index')
@section('main_content')
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Update bài viết
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form role="form" enctype="multipart/form-data" method="POST"
                            action="{{ route('admin.product.postupdate', ['id' => $productId->id]) }}">
                            @csrf
                            <div class="form-group">
                                <label>name</label>
                                <input class="form-control" type="text" value="{{ $productId->name }}" name="name"
                                    placeholder="nhap name">
                                @error('name')
                                    <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>title</label>
                                <input class="form-control" type="text" value="{{ $productId->title }}" name="title"
                                    placeholder="nhap title">
                                @error('title')
                                    <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>content</label>
                                <div>
                                    <textarea class="form-control" type="text" name="content" value="{{ $productId->content }}"
                                        placeholder="Thêm bài viết"></textarea>
                                    @error('content')
                                        <div style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>user_id</label>
                                <div>
                                    <input class="form-control" type="text" disabled value="{{ $userLogin->id }}"
                                        name="user_id">
                                    @error('user_id')
                                        <div style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            {{-- <div class="form-group">
                                <label>category_id</label>
                                <div>
                                    <select name="category_id" class="form-control">
                                        <option value="">Chọn danh mục . . .</option>
                                        @foreach ($categorysList as $index => $category)
                                            <option
                                                @selected($productId->category_id == $category->id) value="{{ $category->id }}">{{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <div style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div> --}}
                            <div class="form-group">
                                <label>ảnh</label>
                                <img src="{{ asset($productId->image) }}" alt="" style="height: 100px ">
                                <input type="file" name="image">
                                @error('image')
                                    <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="update btn btn-default">Update</button>
                            <a href="{{ route('admin.product.list') }}" class="btn btn-info">Back</a>
                        </form>

                    </div>
                    <!-- /.col-lg-6 (nested) -->
                </div>
                <!-- /.row (nested) -->
            </div>
            <!-- /.panel-body -->
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
