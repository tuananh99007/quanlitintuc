@extends('admin.layout.index')
@section('main_content')
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Update
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form role="form" method="POST"
                            action="{{ route('admin.category.postupdate', ['id' => $categoryID->id]) }}">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" type="text" name="name" value="{{ $categoryID->name }}">
                                @error('name')
                                    <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Hot_flag</label>
                                <input class="form-control" type="text" name="hot_flag"
                                    value="{{ $categoryID->hot_flag }}">
                                @error('hot_flag')
                                    <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="update btn btn-default">Update</button>
                            <a href="{{ route('admin.category.list') }}" class="btn btn-info">Back</a>
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
