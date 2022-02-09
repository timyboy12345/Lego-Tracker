@extends('layouts.default')
@section('pageTitle', 'Nieuwe set toevoegen')

@section('content')
    <div class="p-4">
        <h1 class="text-xl text-blue-800 font-bold">Nieuwe set toevoegen</h1>

        <form method="post" action="{{ route('sets.store', $box->id) }}" class="mt-4">
            @csrf

            <div class="mb-4">
                <x-input
                    id="identifier"
                    label="Setnummer"
                    placeholder="Voer 4-cijferige setnummer in"
                    type="number"
                ></x-input>
            </div>

            <div class="mb-4">
                <x-input
                    id="name"
                    label="Naam"
                    placeholder="Voer een naam in (mocht je de standaard naam willen overschrijven)"
                ></x-input>
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
