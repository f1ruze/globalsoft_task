@extends('layouts.page')

@section('content')
    {{ $dataTable->table() }}
@endsection

@push('javascript')
    {{ $dataTable->scripts() }}
@endpush
