@extends('layouts.default')
@section('pageTitle', 'Nieuwe check toevoegen')

@section('content')
    <div class="p-4">
        <h1 class="text-xl text-blue-800 font-bold">Nieuwe check toevoegen</h1>

        <form method="post" action="{{ route('checks.store', [$box->id, $set->id]) }}" class="mt-4">
            @csrf

            <div class="mb-4">
                <x-input
                    type="options"
                    id="type"
                    label="Type Check"
                    placeholder="Selecteer het type check"
                    :options="$typeOptions"
                ></x-input>
            </div>

            <div class="mb-4">
                <x-input
                    id="comments"
                    label="Commentaar"
                    placeholder="Voer eventueel commentaar in"
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
