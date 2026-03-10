@extends('layouts.layout')

@section('title','profile')

@section('content')
<x-profile />
@endsection

@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="{{ asset('js/logout.js') }}"></script>
@endpush