<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.admin')

@section('title')
<title>Trang chu</title>
@endsection

@section('css')
<link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('admins/product/add/add.css') }}" rel="stylesheet" />
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header',['name'=> 'product', 'key' => 'Edit'])
    <!-- /.content-header -->

    <!-- Main content -->
    <form action="{{ route('products.update', ['id' => $product->id] ) }}" method="post" enctype="multipart/form-data">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        @csrf
                        <div class="form-group">
                            <label>Ten san pham</label>
                            <input type="text"
                            class="form-control"
                            name="name"
                            placeholder="Nhap ten san pham"
                            value="{{ $product->name }}"
                            >

                        </div>
                        <div class="form-group">
                            <label>Gia san pham</label>
                            <input type="text"
                            class="form-control"
                            name="price"
                            placeholder="Nhap gia san pham"
                            value="{{ $product->price }}"
                            >

                        </div>
                        <div class="form-group">
                            <label>Anh dai dien</label>
                            <input type="file" class="form-control-file" name="feature_image_path">
                            <div class="col-md-12 container_feature_img">
                                <div class="row">
                                    <div class="col-md-3">
                                        <img class="feature_img" src="{{ $product->feature_image_path }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Anh chi tiet san pham</label>
                            <input type="file" multiple class="form-control-file" name="image_path[]">
                            <div class="col-md-12 container_image_detail">
                                <div class="row">
                                @foreach($product->productImages as $productImageItem)
                                    <div class="col-md-3">
                                        <img class="image_detail_product" src="{{ $productImageItem->image_path }}" alt="">
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Chon danh muc</label>
                            <select class="form-control select2_init" name="category_id">
                                <option value="">Chon danh muc</option>
                                {!! $htmlOption!!}
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nhap tags cho san pham</label>
                            <select name="tags[]" class="form-control tags_select_choose" multiple="multiple">
                                @foreach($product->tags as $tagItem)
                                    <option value="{{ $tagItem->name }}" selected> {{ $tagItem->name }} </option>
                                @endforeach
                            </select>
                        </div>


                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Nhap noi dung</label>
                            <textarea class="form-control tinymce_editor_init" name="contents" rows="8">{{ $product->content }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>

@endsection

@section('js')
<script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script src="{{ asset('admins/product/add/add.js') }}"></script>
@endsection
