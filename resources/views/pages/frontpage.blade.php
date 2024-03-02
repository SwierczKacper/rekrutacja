@extends('layouts.app')

@include('layouts.head')
@include('layouts.styles')
@include('layouts.scripts')

@section('custom_css')
@endsection

@section('custom_js')
@endsection

@section('main-content')
    @livewire('article-list-component')
@endsection
