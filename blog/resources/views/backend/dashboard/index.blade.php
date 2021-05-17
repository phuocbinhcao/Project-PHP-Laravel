@extends('layout.master')

@section('main')
    <h2>Dashboard</h2>
    @include('backend.partition.table_view',['data' =>$dashboard ?? null])
@endsection
