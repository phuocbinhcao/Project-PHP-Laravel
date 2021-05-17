@extends('layout.master')

@section('main')
    <h2>Product</h2>
    @include('backend.partition.table_view',['data' =>$product ?? null])
@endsection