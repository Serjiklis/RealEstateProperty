@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <div class="col-md-6 col-xl-8">
            <div class="card p-3">
                <div class="card-body">
                    <h6 class="card-title">Add property type</h6>
                    <form method="POST" action="{{route('update.type')}}" class="forms-sample">
                        @csrf
                        <input type="hidden" name="id" value="{{$types->id}}">

                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Type Name</label>
                            <input type="text" name="type_name" class="form-control @error('type_name') is-invalid @enderror" value="{{$types->type_name}}" >
                            @error('type_name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Type Icon</label>
                            <input type="text" name="type_icon" class="form-control @error('type_icon') is-invalid @enderror" value="{{$types->type_icon}}">
                            @error('type_icon')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary me-2">Update Type</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
