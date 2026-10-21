@props([
    'name',
    'label',
    'type' => 'text',
    'textarea' => false,
    'required' => true,
    'errors',
    // Beginwaarde als er (nog) geen eerdere invoer is
    'value' => null,
])

@php
    $id = 'contact-'.$name;
    $error = $errors->first($name);
    $fieldClasses = 'mt-2 block w-full border-0 border-b bg-transparent px-0 py-2.5 text-base text-ivory caret-brass transition-colors placeholder:text-ivory/35 focus:ring-0 focus:outline-none '
        .($error ? 'border-red-400 focus:border-red-300' : 'border-ivory/25 hover:border-ivory/45 focus:border-brass');
@endphp

<div {{ $attributes->only('class') }}>
    <label for="{{ $id }}" class="block text-ivory/70">
        {{ $label }}
        @unless ($required)
            <span class="text-ivory/45">(optioneel)</span>
        @endunless
    </label>

    @if ($textarea)
        <textarea id="{{ $id }}" name="{{ $name }}" rows="8"
                  @if ($required) required @endif
                  @if ($error) aria-invalid="true" aria-describedby="{{ $id }}-error" @endif
                  class="{{ $fieldClasses }} min-h-48 resize-y">{{ old($name, $value) }}</textarea>
    @else
        <input id="{{ $id }}" name="{{ $name }}" type="{{ $type }}" value="{{ old($name, $value) }}"
               {{ $attributes->only('autocomplete') }}
               @if ($required) required @endif
               @if ($error) aria-invalid="true" aria-describedby="{{ $id }}-error" @endif
               class="{{ $fieldClasses }}">
    @endif

    @if ($error)
        <p id="{{ $id }}-error" class="mt-2 text-sm text-red-300">{{ $error }}</p>
    @endif
</div>
