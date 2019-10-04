@extends('admin.master')
@section('title',__('module.title.employer_index'))
@section('controller',__('module.controller.employer'))
@section('action',__('module.action.index'))

@push('themejs')
<script src="{{ asset(PLUGIN_PATH.'/notifications/sweet_alert.min.js') }}"></script>
<script src="{{ asset(ASSETS_PATH.'/js/custom.js') }}"></script>
@endpush

@section('content')
<div class="row">
    <div class="col-xl-12">
        @include('admin.blocks.button_list',['exit' => 'admin.job.create'])

        @cardTable(['title' => 'module.title.employer_index'])
            @php
                $locale = \App::getLocale();
            @endphp
            <thead>
                <tr>
                    <th>{{ __('form.table.id') }}</th>
                    <th>{{ __('form.employer.name_'.$locale) }}</th>
                    <th>{{ __('form.employer.phone') }}</th>
                    <th>{{ __('form.employer.status') }}</th>
                    <th width="100px">{{ __('form.employer.job') }}</th>
                    <th width="50px">{{ __('form.table.delete') }}</th>
                    <th width="50px">{{ __('form.table.edit') }}</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $locale = \App::getLocale();
                @endphp
                @foreach ($employers as $employer)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @if ($locale == 'vi')
                            {{ $employer->name_vi }}
                        @else
                            {{ $employer->name_en }}
                        @endif
                    </td>
                    <td>{{ $employer->phone }}</td>
                    <td>
                        @if ($employer->status == 'on')
                            <span class="badge badge-success">Active</span>
                        @else
                            <span class="badge badge-secondary">Deactive</span>
                        @endif
                    </td>
                    <td><a href="{{ route('admin.employer.job',['id' => $employer->id]) }}">{{ __('form.employer.job') }}</a></td>
                    <td><a href="{{ route('admin.employer.destroy',['id' => $employer->id]) }}" class="accept_delete">{{ __('form.table.delete') }}</a></td>
                    <td><a href="{{ route('admin.employer.edit',['id' => $employer->id]) }}">{{ __('form.table.edit') }}</a></td>
                </tr>
                @endforeach
            </tbody>
        @endcardTable
    </div>
</div>
@endsection
