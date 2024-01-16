@props([
    'action' => '',
    'method' => 'GET',
    'enctype' => 'multipart/form-data',
])

<form
    @class([
            'form',
            $attributes->get('class'),
        ])>

    {{ $slot }}
</form>