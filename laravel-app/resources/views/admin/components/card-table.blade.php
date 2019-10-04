@push('themejs')
<script src="{{ asset(PLUGIN_PATH.'/tables/datatables/datatables.min.js') }}"></script>
<script src="{{ asset(PLUGIN_PATH.'/forms/selects/select2.min.js') }}"></script>
<script src="{{ asset(PLUGIN_PATH.'/tables/datatables/extensions/jszip/jszip.min.js') }}"></script>
<script src="{{ asset(PLUGIN_PATH.'/tables/datatables/extensions/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset(PLUGIN_PATH.'/tables/datatables/extensions/pdfmake/vfs_fonts.min.js') }}"></script>
<script src="{{ asset(PLUGIN_PATH.'/tables/datatables/extensions/buttons.min.js') }}"></script>
@endpush

<div class="card">
    <div class="card-header bg-white header-elements-inline">
        <h6 class="card-title">{{ __($title) }}</h6>
        <div class="header-elements">
            <div class="list-icons">
                <a class="list-icons-item" data-action="collapse"></a>
                <a class="list-icons-item" data-action="reload"></a>
                <a class="list-icons-item" data-action="remove"></a>
            </div>
        </div>
    </div>
    <table class="table datatable-button-html5-columns">
        {{ $slot }}
    </table>
</div>