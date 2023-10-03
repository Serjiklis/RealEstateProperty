@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <div class="col-md-6 col-xl-8">
            <div class="card p-3">
                <div class="card-body">
                    <h6 class="card-title">Edit Role</h6>
                    <form method="POST" action="{{route('update.role')}}" class="forms-sample">
                        @csrf

                        <input type="hidden" name="id" value="{{$role->id}}">
                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Role Name</label>
                            <input type="text" name="name" class="form-control" value="{{$role->name}}">
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Update Role</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

