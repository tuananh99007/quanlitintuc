@extends('admin.layout.index')
@section('main_content')
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Thêm bài viết
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form role="form" enctype="multipart/form-data" method="POST"
                            action="{{ route('admin.product.postadd') }}">
                            @csrf
                            <div class="form-group">
                                <label>Danh mục</label>
                                <select name="category_id">
                                    <option value="{{ old('category_id') }}">Chọn danh mục . . .</option>
                                    @foreach ($categorysList as $index => $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('name')
                                    <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>name</label>
                                <input class="form-control" type="text" value="{{ old('name') }}" name="name"
                                    placeholder="nhap name">
                                @error('name')
                                    <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>title</label>
                                <input class="form-control" type="text" value="{{ old('title') }}" name="title"
                                    placeholder="nhap title">
                                @error('title')
                                    <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>content</label>
                                <div>
                                    <textarea class="form-control" type="text" name="content" value="{{ old('content') }}" placeholder="Thêm bài viết"></textarea>
                                    @error('content')
                                        <div style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>user_id</label>
                                <div>
                                    <input class="form-control" type="text" disabled value="{{ $usersLogin->id }}"
                                        name="user_id">
                                    @error('user_id')
                                        <div style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>ảnh</label>
                                <input type="file" name="image" value="{{ old('image') }}">
                                @error('image')
                                    <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-default">Add</button>
                            <a href="{{ route('admin.product.list') }}" class="btn btn-info">Back</a>
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
