@extends('admin.master')
@section('title',__('module.title.career_index'))
@section('controller',__('module.controller.career'))
@section('action',__('module.action.index'))

@push('themejs')
<script src="{{ asset(PLUGIN_PATH.'/notifications/sweet_alert.min.js') }}"></script>
<script src="{{ asset(ASSETS_PATH.'/js/custom.js') }}"></script>
@endpush

@section('content')
<div class="row">
    <div class="col-xl-12">
        @include('admin.blocks.button_list',['exit' => 'admin.career.create'])

        @cardTable(['title' => 'module.title.career_index'])
            @php
                $locale = \App::getLocale();
            @endphp
            <thead>
                <tr>
                    <th>{{ __('form.table.id') }}</th>
                    <th>{{ __('form.career.name_'.$locale) }}</th>
                    <th>{{ __('form.career.status') }}</th>
                    <th width="50px">{{ __('form.table.delete') }}</th>
                    <th width="50px">{{ __('form.table.edit') }}</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $locale = \App::getLocale();
                @endphp
                @foreach ($careers as $career)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @if ($locale == 'vi')
                            {{ $career->name_vi }}
                        @else
                            {{ $career->name_en }}
                        @endif
                    </td>
                    <td>
                        @if ($career->status == 'on')
                            <span class="badge badge-success">Active</span>
                        @else
                            <span class="badge badge-secondary">Deactive</span>
                        @endif
                    </td>
                    <td><a href="{{ route('admin.career.destroy',['id' => $career->id]) }}" class="accept_delete">{{ __('form.table.delete') }}</a></td>
                    <td><a href="{{ route('admin.career.edit',['id' => $career->id]) }}">{{ __('form.table.edit') }}</a></td>
                </tr>
                @endforeach
            </tbody>
        @endcardTable
    </div>
</div>
@endsection
