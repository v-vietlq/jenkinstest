
<div class="form-group">
    <label>{{ __($title) }}: </label>
    <textarea name="{{ $name }}">{{ $slot }}</textarea>
    <script type="text/javascript">
        CKEDITOR.replace('{{ $name }}');
    </script>
</div>