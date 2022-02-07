@extends('layouts.default')
@section('pageTitle', $set->name)

@section('content')
    <div class="p-4">
        {{ $set->name }}
    </div>
@endsection
