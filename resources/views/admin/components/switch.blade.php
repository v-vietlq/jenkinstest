<div class="form-group">
    <label>{{ __($title) }}: </label>
    <div class="form-check form-check-switch form-check-switch-left">
        <label class="form-check-label d-flex align-items-center">
            <input type="checkbox" name="{{ $name }}" data-on-text="{{ $on }}" data-off-text="{{ $off }}" class="form-check-input-switch" {{ $slot }}>
        </label>
    </div>
</div>