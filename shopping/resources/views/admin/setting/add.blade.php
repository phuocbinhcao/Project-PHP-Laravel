<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.admin')

@section('title')
<title>Trang chu</title>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header',['name'=> 'settings', 'key' => 'Add'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('settings.store') . '?type=' . request()->type }}" method ="post">
                    @csrf
                        <div class="form-group">
                            <label>Config key</label>
                            <input type="text" 
                            class="form-control @error('config_key') is-invalid @enderror" 
                            name="config_key"
                            placeholder="Nhap config key">
                            @error('config_key')
                                <div class="alert text-danger py-0 px-0">{{ $message }}</div>
                            @enderror

                        </div>
                    @if(request()->type === 'Text')
                        <div class="form-group">
                            <label>Config value</label>
                            <input type="text" 
                            class="form-control @error('config_value') is-invalid @enderror" 
                            name="config_value"
                            placeholder="Nhap config value">
                            @error('config_value')
                                <div class="alert text-danger py-0 px-0">{{ $message }}</div>
                            @enderror

                        </div>
                        @elseif(request()->type === 'Textarea')
                        <div class="form-group">
                            <label>Config value</label>
                            <textarea 
                            
                            class="form-control" 
                            name="config_value"
                            placeholder="Nhap config value"
                            rows="5" 
                            >

                            </textarea>

                        </div>

                    @endif
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
   
</div>

@endsection