<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.admin')

@section('title')
<title>Trang chu</title>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header',['name'=> 'permisions', 'key' => 'Add'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('permissions.store') }}" method ="post">
                    @csrf
                        

                        <div class="form-group">
                            <label>Chon ten module</label>
                            <select class="form-control" name="module_parent">
                            <option value="">Chon ten module</option>
                            @foreach(config('permissions.table_module') as $moduleItem)
                                <option value="{{ $moduleItem}}">{{ $moduleItem}}</option>
                            @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group d-flex justify-content-around">
                        @foreach(config('permissions.module_childrent') as $moduleItemChildrent)
                            <div>
                                <label for="">
                                <input type="checkbox" value="{{ $moduleItemChildrent}}" name="module_childrent[]">
                                {{ $moduleItemChildrent}}
                                </label>
                            </div>
                        @endforeach  
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
   
</div>

@endsection