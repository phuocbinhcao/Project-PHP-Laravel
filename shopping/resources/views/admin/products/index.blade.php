<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.admin')

@section('title')
<title>Add product</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('admin/product/index/list.css')}}">
@endsection

@section('js')

@endsection

@section('content')

<div class="content-wrapper">
    
    @include('partials.content-header',['name'=> 'product', 'key' => 'List'])
    

    
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md 12">
                    <a href="{{ route('products.create')}}" class="btn btn-success float-right m-2">Add</a>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên san pham</th>
                                <th scope="col">Gia san pham</th>
                                <th scope="col">Hinh anh</th>
                                <th scope="col">Danh muc</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $productItem)
                            <tr>
                                <th scope="row">{{ $productItem->id }}</th>
                                <td> {{ $productItem->name }}</td>
                                <td> {{ number_format($productItem->price) }}</td>
                                <td><img class="product_image" src=" {{ $productItem->feature_image_path }}" alt=""></td>
                                <td>{{ optional($productItem->category)->name }}</td>
                                <td>
                                    <a href="{{ route('products.edit', ['id' => $productItem->id]) }}" 
                                    class="btn btn-success">Edit</a>
                                    <a href="" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">
                {{ $products->links() }}
                </div>
            </div>
            
        </div>
    </div>
    
</div>

@endsection