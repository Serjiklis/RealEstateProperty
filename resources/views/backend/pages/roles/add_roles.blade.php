@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <div class="col-md-6 col-xl-8">
            <div class="card p-3">
                <div class="card-body">
                    <h6 class="card-title">Add Roles</h6>
                    <form method="POST" action="{{route('store.roles')}}" class="forms-sample">
                        @csrf


                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Role Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary me-2">Add Role</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

