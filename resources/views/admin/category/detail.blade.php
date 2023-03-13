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
                                <th>Name</th>
                                <th>Hot_flag</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $categoryID->id }}</td>
                                <td>{{ $categoryID->name }}</td>
                                <td>{{ $categoryID->hot_flag }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{ route('admin.category.list') }}" class="btn btn-info">Back</a>
                </div>
            </div>
        </div>

    </div>
@endsection
