@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <div class="col-md-6 col-xl-8">
            <div class="card p-3">
                <div class="card-body">
                    <h6 class="card-title">Add amenity type</h6>
                    <form method="POST" action="{{route('update.amenity')}}" class="forms-sample">
                        @csrf
                        <input type="hidden" name="id" value="{{$amenities->id}}">

                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Amenity Name</label>
                            <input type="text" name="amenities_name" class="form-control @error('amenities_name') is-invalid @enderror" value="{{$amenities->amenities_name}}" >
                            @error('amenities_name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary me-2">Update Amenity</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
