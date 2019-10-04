@extends('admin.master')
@section('title',__('module.title.news_index'))
@section('controller',__('module.controller.news'))
@section('action',__('module.action.index'))

@push('themejs')
<script src="{{ asset(PLUGIN_PATH.'/notifications/sweet_alert.min.js') }}"></script>
<script src="{{ asset(ASSETS_PATH.'/js/custom.js') }}"></script>
@endpush

@section('content')
<div class="row">
    <div class="col-xl-12">
        @include('admin.blocks.button_list',['exit' => 'admin.news.create'])

        @cardTable(['title' => 'module.title.career_index'])
            @php
                $locale = \App::getLocale();
            @endphp
            <thead>
                <tr>
                    <th>{{ __('form.table.id') }}</th>
                    <th>{{ __('form.news.title_'.$locale) }}</th>
                    <th>{{ __('form.news.status') }}</th>
                    <th width="50px">{{ __('form.table.delete') }}</th>
                    <th width="50px">{{ __('form.table.edit') }}</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $locale = \App::getLocale();
                @endphp
                @foreach ($news as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @if ($locale == 'vi')
                            {{ $item->title_vi }}
                        @else
                            {{ $item->title_en }}
                        @endif
                    </td>
                    <td>
                        @if ($item->status == 'on')
                            <span class="badge badge-success">Active</span>
                        @else
                            <span class="badge badge-secondary">Deactive</span>
                        @endif
                    </td>
                    <td><a href="{{ route('admin.news.destroy',['id' => $item->id]) }}" class="accept_delete">{{ __('form.table.delete') }}</a></td>
                    <td><a href="{{ route('admin.news.edit',['id' => $item->id]) }}">{{ __('form.table.edit') }}</a></td>
                </tr>
                @endforeach
            </tbody>
        @endcardTable
    </div>
</div>
@endsection
