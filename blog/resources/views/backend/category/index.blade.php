@extends('layout.master')

@section('main')
    <h2>Category</h2>
    @include('backend.partition.table_view',['data' =>$category ?? null])
@endsection