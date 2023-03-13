@extends('admin.layout.index')
@section('main_content')
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Thêm Category
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form role="form" method="POST" action="{{ route('admin.category.postadd') }}">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" type="text" name="name" placeholder="Nhập Name">
                                @error('name')
                                    <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Hot_flag</label>
                                <input class="form-control" type="text" name="hot_flag" placeholder="Nhập hot_flag">
                                @error('hot_flag')
                                    <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-default">Add</button>
                            <a href="{{ route('admin.category.list') }}" class="btn btn-info">Back</a>
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
