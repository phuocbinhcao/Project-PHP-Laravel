<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.admin')

@section('title')
<title>Trang chu</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('admins/role/add.css') }}">
@endsection

@section('js')
    <script src="{{ asset('admins/role/add.js')}}"></script>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header',['name'=> 'Roles', 'key' => 'Edit'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <form action="{{ route('roles.update', ['id' => $role->id]) }}" method="post" enctype="multipart/form-data" class="w-100">
                    <div class="col-md-12">

                        @csrf
                        <div class="form-group">
                            <label>Tên vai trò</label>
                            <input type="text" class="form-control " name="name"
                                value="{{ $role->name }}" placeholder="Nhập tên vai trò">
                            
                        </div>

                        <div class="form-group">
                            <label>Mô tả va trò</label>
                            <textarea class="form-control " name="display_name"
                                rows="3">
                                {{ $role->display_name }}
                            </textarea>
                            
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="">
                            <input type="checkbox" class="checkall">
                            Checkall
                        </label>

                    </div>
                    <div class="col-md-12">
                        
                    @foreach($permissionsParent as $permissionsParentItem)
                        <div class="col-md-12 card border-primary mb-3">
                            <div class="card-header bg-info">
                                <label for="">
                                    <input type="checkbox" value="" 
                                    class="checkbox_wrapper">
                                </label>
                                Module {{ $permissionsParentItem->name }}
                            </div>
                            
                            <div class="card-body text-primary d-flex justify-content-between">
                            @foreach ($permissionsParentItem->permissionsChildrent as $permissionsChildrentItem)
                                <h5 class="card-title">
                                    <label for="">
                                        <input type="checkbox" name="permission_id[]"
                                        {{ $permissionsChecked->contains('id', $permissionsChildrentItem->id) ? 'checked' : '' }}
                                        class="checkbox_childrent" 
                                        value="{{ $permissionsChildrentItem->id }}">
                                    </label>
                                    {{ $permissionsChildrentItem->name}}
                                </h5>
                                @endforeach
                            </div>
                            
                        </div>
                        @endforeach
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

</div>

@endsection