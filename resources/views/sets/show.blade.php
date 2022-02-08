@extends('layouts.default')
@section('pageTitle', $set->name)

@section('content')
    @isset($set->image_url)
        <a class="h-96 w-full rounded-t overflow-hidden block" href="{{ $set->image_url }}" target="_blank">
            <img src="{{ $set->image_url }}" class="object-contain h-full w-full">
        </a>
    @endisset

    <div class="p-4">
        {{ $set->name }}
    </div>
@endsection
