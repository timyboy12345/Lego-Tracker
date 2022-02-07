@extends('layouts.default')
@section('pageTitle', 'Nieuwe set toevoegen')

@section('content')
    <div class="p-4">
        <h1 class="text-xl text-blue-800 font-bold">Nieuwe set toevoegen</h1>

        <form method="post" action="{{ route('sets.store', $box->id) }}" class="mt-4">
            @csrf

            <div class="mb-4">
                <label for="identifier" class="text-gray-800 mb-1 block text-sm">Setnummer</label>
                <input id="identifier" placeholder="Setnummer" name="identifier" type="text"
                       class="border border-gray-200 py-1 px-2 rounded w-full outline-none">

                @error('identifier')
                <div class="text-xs italic text-red-600 block mt-1">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="name" class="text-gray-800 mb-1 block text-sm">Naam</label>
                <input id="name" placeholder="Naam" name="name" type="text"
                       class="border border-gray-200 py-1 px-2 rounded w-full outline-none">

                @error('name')
                <div class="text-xs italic text-red-600 block mt-1">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <button
                class="ml-auto block rounded text-white bg-blue-800 hover:bg-blue-900 transition duration-100 py-2 px-4"
                type="submit"
            >
                Opslaan
            </button>
        </form>
    </div>
@endsection
