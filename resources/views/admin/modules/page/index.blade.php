@extends('admin.master')
@section('title',__('module.title.page_index'))
@section('controller',__('module.controller.page'))
@section('action',__('module.action.index'))

@push('themejs')
<script src="{{ asset(PLUGIN_PATH.'/notifications/sweet_alert.min.js') }}"></script>
<script src="{{ asset(ASSETS_PATH.'/js/custom.js') }}"></script>
@endpush

@section('content')
<div class="row">
    <div class="col-xl-12">
        @cardTable(['title' => 'module.title.page_index'])
            <thead>
                <tr>
                    <th>{{ __('form.table.id') }}</th>
                    <th>{{ __('form.page.title_vi') }}</th>
                    <th>{{ __('form.page.status') }}</th>
                    <th width="200px">{{ __('form.table.content') }}</th>
                    <th width="50px">{{ __('form.table.delete') }}</th>
                    <th width="50px">{{ __('form.table.edit') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pages as $page)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><a href="#">{{ $page->title_vi }}</a></td>
                    <td>
                        @if ($page->status == 'on')
                            <span class="badge badge-success">Active</span>
                        @else
                            <span class="badge badge-secondary">Deactive</span>
                        @endif
                    </td>
                    <td><a href="{{ route('admin.content.index',['pageid' => $page->id]) }}">{{ __('form.table.content') }}</a></td>
                    <td><a href="{{ route('admin.page.destroy',['id' => $page->id]) }}" class="accept_delete">{{ __('form.table.delete') }}</a></td>
                    <td><a href="{{ route('admin.page.edit',['id' => $page->id]) }}">{{ __('form.table.edit') }}</a></td>
                </tr>
                @endforeach
            </tbody>
        @endcardTable
    </div>
</div>
@endsection
