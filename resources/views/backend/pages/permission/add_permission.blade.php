@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <div class="col-md-6 col-xl-8">
            <div class="card p-3">
                <div class="card-body">
                    <h6 class="card-title">Add amenity type</h6>
                    <form method="POST" action="{{route('store.permission')}}" class="forms-sample">
                        @csrf


                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Permission Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Group Name</label>
                            <select name="group_name" class="form-control" id="exampleInputUsername1">
                                <option selected="" disabled="">Select Group</option>
                                <option value="type">Property Type</option>
                                <option value="state">State</option>
                                <option value="amenities">Amenities</option>
                                <option value="property">Property</option>
                                <option value="history">Package History</option>
                                <option value="message">Property Message</option>
                                <option value="post">Blog Post</option>
                                <option value="type">Role & Permission</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Add Permission</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

