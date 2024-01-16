@props([
    'name' => null,
    'id' => null,
    'label' => null,
    'labelClass' => null,
    'inputClass' => 'form-control',
    'type' => 'text',
    'placeholder' => null,
    'value' => null,
])

<div class="form-group">
    <x-ui.form.label :for="$id ?? null" class="{{ $labelClass }}">{{ $label }}</x-ui.form.label>
    <input
        type="{{ $type }}"
        class="{{ $inputClass }}"
        name="{{ $name }}"
        id="{{ $id }}"
        placeholder="{{ $placeholder }}"
        value="{{ ($value) }}"
        {{ $attributes }}
    />
</div>