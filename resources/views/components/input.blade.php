<div class="mb-4">
    @if (($type ?? 'text') === 'options')
        <label for="{{ $id }}" class="text-gray-800 mb-1 block text-sm">{{ $label ?? '' }}</label>
        <select id="{{ $id }}" name="{{ $id }}"
                class="border border-gray-200 py-1 px-2 rounded w-full outline-none">
            @foreach ($options as $option)
                <option value="{{ $option['value'] }}">{{ $option['text'] }}</option>
            @endforeach
        </select>
    @else
        <label for="{{ $id }}" class="text-gray-800 mb-1 block text-sm">{{ $label ?? '' }}</label>
        <input id="{{ $id }}" placeholder="{{ $placeholder ?? '' }}" name="{{ $id }}" type="{{ $type ?? 'text' }}"
               class="border border-gray-200 py-1 px-2 rounded w-full outline-none"
               value="{{ old($id, $value ?? '') }}">
    @endif

    @error($id)
    <div class="text-xs italic text-red-600 block mt-1">
        {{ $message }}
    </div>
    @enderror
</div>
