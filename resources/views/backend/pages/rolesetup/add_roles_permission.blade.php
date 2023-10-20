@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <style type="text/css">
        .form-check-label{
            text-transform: capitalize;
        }
    </style>
    <div class="page-content">
        <div class="col-md-12 col-xl-12">
            <div class="card p-3">
                <div class="card-body">
                    <h6 class="card-title">Add Roles in Permission</h6>
                    <form method="POST" action="{{route('role.permission.store')}}" class="forms-sample">
                        @csrf


                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Role Name</label>
                            <select name="role_id" class="form-control" id="exampleInputUsername1">
                                <option selected="" disabled="">Select Group</option>
                                @foreach($roles as $role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>
    <div class="form-checkbox mb-2" >
        <input type="checkbox" class="form-check-input" id="checkDefaultMain">
        <label class="form-check-label" for="checkDefaultMain">
            Permission All
        </label>
    </div>
                        <hr>
                        @foreach($permission_groups as $group)
<div class="row">
    <div class="col-3">
        <input type="checkbox" class="form-check-input" id="checkDefault">
        <label class="form-check-label" for="checkDefault">
            {{$group->group_name}}
        </label>
    </div>

    <div class="col-9">
@php
$permissions = App\Models\User::getParmissionGroupByName($group->group_name)
@endphp

        @foreach($permissions as $permission)


<div class="form-check mb-2">
        <input type="checkbox" class="form-check-input" name="permission[]" id="checkDefault{{$permission->id}}" value=" {{$permission->id}}">
        <label class="form-check-label" for="checkDefault{{$permission->id}}">
            {{$permission->name}}
        </label>
    </div>
        @endforeach
        <br>
    </div>
</div>
                        @endforeach
                        <button type="submit" class="btn btn-primary me-2">Add Role</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript">
    $('#checkDefaultMain').click(function (){
        if($(this).is(':checked')){
            $('input[type = checkbox]').prop('checked',true)
        }else {
            $('input[type = checkbox]').prop('checked',false)
        }

    });
</script>

@endsection

