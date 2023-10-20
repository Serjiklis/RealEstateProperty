@extends('admin.admin_dashboard')
@section('admin')

    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <a href="{{route('add.roles')}}" class="btn btn-inverse-info">Add Admin</a>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Admin All</h6>

                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Admin Name</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($alladmin as $key => $item)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->status}}</td>
                                        <td><img src="{{(!empty($item->photo)) ? url('upload/admin_images/'.$item->photo) : url('upload/no_image.jpg')}}" style="width: 70px; height: 70px"></td>
                                        <td>
                                            <a href="{{route('edit.role', $item->id)}}" class="btn btn-inverse-warning">Edit</a>
                                            <a href="{{route('delete.role', ['id'=>$item->id])}}" class="btn btn-inverse-danger" id="delete">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

