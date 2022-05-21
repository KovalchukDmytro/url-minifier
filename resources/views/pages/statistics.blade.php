@php($urlModel = $urlModel ?? false)

@extends('layouts.app')
@section('content')
    @include('components.statistics_form')
    @if($urlModel)
        @include('components.statistics_table')
    @endif
@endsection
