@extends('layouts.default')
@section('pageTitle', $set->name)

@section('content')
    @isset($set->image_url)
        <a class="h-96 w-full rounded-t overflow-hidden block" href="{{ $set->image_url }}" target="_blank">
            <img alt="{{ "Afbeelding van {$set->name}" }}" src="{{ $set->image_url }}"
                 class="object-contain h-full w-full">
        </a>
    @endisset

    <div class="p-4">
        <h2 class="text-xl text-blue-800 font-bold">{{ $set->name }}</h2>

        <ul class="pl-8 list-disc mb-4">
            @isset($set->identifier)
                <li>Setnummer: {{ $set->identifier }}</li>
            @endisset
            @isset($set->parts)
                <li>Aantal stukjes: {{ $set->parts }}</li>
            @endisset
            @isset($set->theme_id)
                <li>Thema ID: {{ $set->theme_id }}</li>
            @endisset
            @isset($set->year)
                <li>Jaar: {{ $set->year }}</li>
            @endisset
        </ul>
    </div>

    <div class="flex flex-col divide-y divide-gray-100">
        @foreach ($set->checks as $check)
            <div class="py-2 px-4">
                <h3 class="text-lg">{{ \Carbon\Carbon::make($check->created_at)->diffForHumans() }}
                    / {{ $check->type }}</h3>
                <p class="text-sm text-gray-600">{{ $check->comments }}</p>
            </div>
        @endforeach

        <a
            href="{{ route('checks.create', [$box->id, $set->id]) }}"
            class="block py-2 px-4 hover:bg-gray-100 transition duration-100 text-gray-500 text-sm"
        >
            + Nieuwe check toevoegen
        </a>
    </div>

    <div class="p-4">
        <form
            method="post"
            action="{{ route('sets.destroy', [\Illuminate\Support\Facades\Request::segment(2), $set->id]) }}"
            class="text-right"
        >
            @method('DELETE')
            @csrf

            <button type="submit" class="text-sm underline">Set verwijderen</button>
        </form>
    </div>
@endsection
