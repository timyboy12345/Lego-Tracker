@extends('layouts.default')
@section('pageTitle', $box->name)

@section('content')
    <div class="divide-y divide-gray-100">
        @foreach ($box->sets as $set)
            <a
                href="{{ route('sets.show', [$box->id, $set->id]) }}"
                class="hover:bg-gray-100 items-center transition block py-2 px-4 flex flex-row"
            >
                <div class="w-8 h-8 mr-4 rounded-full bg-gray-200 overflow-hidden">
                    <img
                        src="{{ $set->image_url }}"
                        class="w-full h-full object-center object-cover"
                    >
                </div>

                <div class="flex flex-col">
                    <div class="text-blue-800">{{ $set->name }}</div>
                    <div class="text-sm text-gray-600">{{ $set->identifier }}</div>
                </div>
            </a>
        @endforeach

        <a href="{{ route('sets.create', [$box->id]) }}"
           class="hover:bg-gray-100 items-center transition block py-2 px-4 flex flex-row text-gray-500">
            + Nieuwe set toevoegen
        </a>
    </div>
@endsection
