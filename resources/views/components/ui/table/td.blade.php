@props([
    'text' => null,
])

<td {{ $attributes }}>
    {!! $text !!}

    {{ $slot ?? null }}
</td>