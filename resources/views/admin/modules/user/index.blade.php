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
        @include('admin.blocks.button_list',['exit' => 'admin.job.create'])

        @cardTable(['title' => 'module.title.user_index'])
            <thead>
                <tr>
                    <th>{{ __('form.table.id') }}</th>
                    <th>{{ __('form.user.email') }}</th>
                    <th>{{ __('form.user.level') }}</th>
                    <th>{{ __('form.user.status') }}</th>
                    <th width="50px">{{ __('form.table.delete') }}</th>
                    <th width="50px">{{ __('form.table.edit') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><a href="#">{{ $user->email }}</a></td>
                    <td>
                        @if ($user->level == 1) 
                            {{ __('form.user.admin') }}
                        @elseif ($user->level == 2)
                            {{ __('form.user.employer') }}
                        @else
                            {{ __('form.user.member') }}
                        @endif
                    </td>
                    <td>
                        @if ($user->status == 'on')
                            <span class="badge badge-success">Active</span>
                        @else
                            <span class="badge badge-secondary">Deactive</span>
                        @endif
                    </td>
                    <td><a href="{{ route('admin.user.destroy',['id' => $user->id]) }}" class="accept_delete">{{ __('form.table.delete') }}</a></td>
                    <td><a href="{{ route('admin.user.edit',['id' => $user->id]) }}">{{ __('form.table.edit') }}</a></td>
                </tr>
                @endforeach
            </tbody>
        @endcardTable
    </div>
</div>
@endsection
