@extends('layouts.default')
@section('pageTitle', 'Nieuwe Doos Toevoegen')

@section('content')
    <div class="p-4">
        <form method="post" action="{{ route('boxes.store') }}">
            @csrf

            <x-input id="name" type="string" label="Naam" placeholder="Naam van deze doos"></x-input>
            <x-input id="color" type="string" label="Kleur" placeholder="Kleur van deze doos"></x-input>
            <x-input id="identifier" type="string" label="Identifier" placeholder="Identifier van deze doos"></x-input>

            <button
                class="ml-auto block rounded text-white bg-blue-800 hover:bg-blue-900 transition duration-100 py-2 px-4"
                type="submit"
            >
                Opslaan
            </button>
        </form>
    </div>
@endsection
