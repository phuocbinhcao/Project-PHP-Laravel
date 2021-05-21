<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.admin')

@section('title')
<title>Trang chu</title>
@endsection

@section('css')
 <link rel="stylesheet" href="{{ asset('admins/slider/add/add.css') }}">
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header',['name'=> 'Slider', 'key' => 'Edit'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('slider.update', ['id' => $slider->id]) }}" method ="post" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <label>Tên slider</label>
                            <input type="text"
                            class="form-control @error('name') is-invalid @enderror"
                            name="name"
                            value="{{ $slider->name }}"
                            placeholder="Nhập tên slider">
                            @error('name')
                                <div class="alert text-danger py-0 px-0">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Mô tả slider</label>
                            <textarea
                            class="form-control @error('description') is-invalid @enderror"
                            name="description" rows="3">
                            {{ $slider->description }}
                            </textarea>
                            @error('description')
                                <div class="alert text-danger py-0 px-0">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Hình ảnh</label>
                            <input type="file"
                            class="form-control-file @error('image_path') is-invalid @enderror"
                            name="image_path">
                            <div class="col-md-4">
                                <div class="row">
                                    <img class="image_slider" src="{{ $slider->image_path }}" alt="">
                                </div>
                            </div>
                            @error('image_path')
                                <div class="alert text-danger py-0 px-0">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
