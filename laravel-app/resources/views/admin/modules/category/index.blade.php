@extends('admin.master')
@section('title',__('module.title.user_index'))
@section('controller',__('module.controller.user'))
@section('action',__('module.action.index'))

@push('themejs')
<script src="{{ asset(PLUGIN_PATH.'/notifications/sweet_alert.min.js') }}"></script>
<script src="{{ asset(ASSETS_PATH.'/js/custom.js') }}"></script>
@endpush

@section('content')
<div class="row">
    <div class="col-xl-12">
        @include('admin.blocks.button_list',['exit' => 'admin.category.create'])

        <div class="card">
            <div class="card-header bg-white header-elements-inline">
                <h6 class="card-title">{{ __('module.title.category_index') }}</h6>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        @php
                            $locale = \App::getLocale();
                        @endphp
                        <th width="150px">{{ __('form.table.id') }}</th>
                        <th>{{ __('form.category.name_'.$locale) }}</th>
                        <th>{{ __('form.category.status') }}</th>
                        <th width="200px">{{ __('form.table.created_at') }}</th>
                        <th width="50px">{{ __('form.table.delete') }}</th>
                        <th width="50px">{{ __('form.table.edit') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @if (empty($categories))
                        <tr><td colspan="6" align="center">Không Có Dữ Liệu</td></tr>
                    @else
                        @php recursionTable($categories) @endphp
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
