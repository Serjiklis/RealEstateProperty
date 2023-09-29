@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <div class="col-md-6 col-xl-8">
            <div class="card p-3">
                <div class="card-body">
                    <h6 class="card-title">Add amenity type</h6>
                    <form method="POST" action="{{route('update.permission')}}" class="forms-sample">
                        @csrf

                        <input type="hidden" name="id" value="{{$permission->id}}">
                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Permission Name</label>
                            <input type="text" name="name" class="form-control" value="{{$permission->name}}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Group Name</label>
                            <select name="group_name" class="form-control" id="exampleInputUsername1">
                                <option selected="" disabled="">Select Group</option>
                                <option value="type" {{$permission->group_name == 'type' ? 'selected': ''}}>Property Type</option>
                                <option value="state" {{$permission->group_name == 'state' ? 'selected': ''}}>State</option>
                                <option value="amenities" {{$permission->group_name == 'amenities' ? 'selected': ''}}>Amenities</option>
                                <option value="property" {{$permission->group_name == 'property' ? 'selected': ''}}>Property</option>
                                <option value="history" {{$permission->group_name == 'history' ? 'selected': ''}}>Package History</option>
                                <option value="message" {{$permission->group_name == 'message' ? 'selected': ''}}>Property Message</option>
                                <option value="post" {{$permission->group_name == 'post' ? 'selected': ''}}>Blog Post</option>
                                <option value="role" {{$permission->group_name == 'post' ? 'selected': ''}}>Role & Permission</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Update Permission</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

