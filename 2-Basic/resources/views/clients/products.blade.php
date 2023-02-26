@extends('layouts.client')
@php
    $title = 'Sản phẩm';
@endphp
@section('title', $title)

@section('sidebar')
    @parent
    <h1>Home Sidebar</h1>
@endsection

@section('content')
    <h2>Nội dung sản phẩm</h2>
    @datetime(now())

    @env('local')
        <h3>Môi trường local</h3>
    @else
        <h3>Môi trường product</h3>
    @endenv
    
    @push('scripts')
        <script>
            console.log('Push lần 2');
        </script>
    @endpush
@endsection

@push('scripts')
    <script>
        console.log('Push lần 1');
    </script>
@endpush

@section('js')
    <script>
        console.log('file js');
    </script>
@endsection
