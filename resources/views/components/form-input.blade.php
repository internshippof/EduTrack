@props(['name', 'label', 'type' => 'text', 'value' => null, 'icon' => null, 'required' => false])

<div class="mb-3">
    <label class="et-form-label" for="{{ $name }}">
        {{ $label }} @if($required)<span class="text-danger">*</span>@endif
    </label>

    <div class="{{ $icon ? 'et-input-icon-group' : '' }}">
        @if($icon)
            <i class="bi {{ $icon }}"></i>
        @endif
        <input
            type="{{ $type }}"
            name="{{ $name }}"
            id="{{ $name }}"
            class="form-control @error($name) is-invalid @enderror"
            value="{{ old($name, $value) }}"
            {{ $attributes }}
        >
    </div>

    @error($name)
        <div class="text-danger small mt-1">{{ $message }}</div>
    @enderror
</div>
