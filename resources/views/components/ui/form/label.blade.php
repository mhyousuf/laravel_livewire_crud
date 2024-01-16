@props([
    'for' => null,
    'text' => null,
    'required' => false,
])

<label
    @if($for) for="{{ $for }}" @endif
    @class(['form-label', 'required' => $required, $attributes->get('class')])
    {{ $attributes }}>
    {!! $text !!}

    {{ $slot }}
</label>
