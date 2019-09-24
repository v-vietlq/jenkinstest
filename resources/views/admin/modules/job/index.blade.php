@extends('admin.master')
@section('title',__('module.title.job_index'))
@section('controller',__('module.controller.job'))
@section('action',__('module.action.index'))

@push('themejs')
<script src="{{ asset(PLUGIN_PATH.'/notifications/sweet_alert.min.js') }}"></script>
<script src="{{ asset(ASSETS_PATH.'/js/custom.js') }}"></script>
@endpush

@section('content')
<div class="row">
    <div class="col-xl-12">
        @include('admin.blocks.button_list',['exit' => 'admin.job.create'])

        @cardTable(['title' => 'module.title.job_index'])
            <thead>
                <tr>
                    <th>{{ __('form.table.id') }}</th>
                    <th>{{ __('form.job.name_vi') }}</th>
                    <th>{{ __('form.job.employer') }}</th>
                    <th>{{ __('form.job.status') }}</th>
                    <th width="50px">{{ __('form.table.delete') }}</th>
                    <th width="50px">{{ __('form.table.edit') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jobs as $job)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><a href="#">{{ $job->name_vi }}</a></td>
                    <td><a href="#">{{ $job->employer->name_vi }}</a></td>
                    <td>
                        @if ($job->status == 'on')
                            <span class="badge badge-success">Active</span>
                        @else
                            <span class="badge badge-secondary">Deactive</span>
                        @endif
                    </td>
                    <td><a href="{{ route('admin.job.destroy',['id' => $job->id]) }}" class="accept_delete">{{ __('form.table.delete') }}</a></td>
                    <td><a href="{{ route('admin.job.edit',['id' => $job->id]) }}">{{ __('form.table.edit') }}</a></td>
                </tr>
                @endforeach
            </tbody>
        @endcardTable
    </div>
</div>
@endsection
