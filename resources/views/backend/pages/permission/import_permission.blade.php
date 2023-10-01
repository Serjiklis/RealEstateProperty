@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <a href="{{route('export.permission')}}" class="btn btn-inverse-danger">Download Xlsx</a>
            </ol>
        </nav>

        <div class="col-md-6 col-xl-8">
            <div class="card p-3">
                <div class="card-body">
                    <h6 class="card-title">Import Permissions</h6>
                    <form method="POST" action="{{route('import')}}" class="forms-sample" enctype="multipart/form-data">
                        @csrf


                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Xlsx File Import</label>
                            <input type="file" name="import_file" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-inverse-warning">Upload File</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

