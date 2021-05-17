@extends('layout.master')

@section('main')
    <h2>User</h2>
    @include('backend.partition.table_view',['data' =>$users ?? null])
@endsection