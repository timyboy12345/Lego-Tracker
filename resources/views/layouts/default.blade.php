<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('pageTitle', 'Lego Tracker')</title>

    <link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}"/>
</head>
<body class="antialiased bg-gray-100">
<div class="mx-4 mt-4 max-w-6xl lg:mx-auto">
    @isset($breadcrumbs)
        <div class="flex flex-row items-center gap-x-2 mb-4">
            @foreach($breadcrumbs as $breadcrumb)
                @isset($breadcrumb['href'])
                    <a class="underline" href="{{ $breadcrumb['href'] }}">
                        {{ $breadcrumb['title'] }}
                    </a>
                @else
                    <div>{{ $breadcrumb['title'] }}</div>
                @endisset

                @if (!$loop->last)
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                @endif
            @endforeach
        </div>
    @endisset

    <div class="grid lg:grid-cols-4 gap-4">
        <div class="lg:grid-span-1 bg-white shadow rounded overflow-hidden divide-y divide-gray-100">
            @foreach (\App\Models\Box::all() as $menuBox)
                <a
                    href="{{ route('boxes.show', $menuBox->id) }}"
                    class="block py-2 px-4 transition hover:bg-gray-100 {{ \Illuminate\Support\Facades\Request::segment(2) == $menuBox->id ? 'text-blue-800 bg-blue-100 hover:bg-blue-200' : '' }}"
                >
                    {{ $menuBox->name }}
                </a>
            @endforeach
        </div>

        <div class="lg:col-span-3 bg-white shadow rounded">
            @yield('content')
        </div>
    </div>

    <div class="w-full flex flex-row justify-between items-center mt-8 mb-4">
        <div class="text-sm text-gray-500">
            Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
        </div>

        @isset($box)
            <a href="{{ route('sets.create', $box->id) }}"
               class="block text-sm bg-blue-800 text-white rounded shadow py-2 px-4">
                Nieuwe set toevoegen
            </a>
        @endisset
    </div>
</div>
</body>
</html>
