@extends('admin.master')
@section('title',__('module.title.content_index'))
@section('controller',__('module.controller.content'))
@section('action',__('module.action.index'))

@push('themejs')
<script src="{{ asset(PLUGIN_PATH.'/notifications/sweet_alert.min.js') }}"></script>
<script src="{{ asset(ASSETS_PATH.'/js/custom.js') }}"></script>
@endpush

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card card-body border-top-primary">		
            <div class="text-left">
                <a href="{{ route('admin.content.create',['pageid' => $pageid]) }}" class="btn bg-teal-400 btn-labeled btn-labeled-left"><b><i class="icon-add-to-list"></i></b> {{ __('form.button.create') }}</a>
            </div>
        </div>

                
        @cardTable(['title' => 'module.title.content_index'])
            <thead>
                <tr>
                    <th>{{ __('form.table.id') }}</th>
                    <th>{{ __('form.content.code') }}</th>
                    <th>{{ __('form.content.content_vi') }}</th>
                    <th>{{ __('form.content.content_en') }}</th>
                    <th width="50px">{{ __('form.table.delete') }}</th>
                    <th width="50px">{{ __('form.table.edit') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pages->content as $content)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><a href="#">{{ $content->code }}</a></td>
                    <td><a href="#">{{ $content->content_vi }}</a></td>
                    <td><a href="#">{{ $content->content_en }}</a></td>
                
                    <td><a href="{{ route('admin.content.destroy',['pageid' => $pageid,'id' => $content->id,]) }}" class="accept_delete">{{ __('form.table.delete') }}</a></td>
                    <td><a href="{{ route('admin.content.edit',['pageid' => $pageid,'id' => $content->id]) }}">{{ __('form.table.edit') }}</a></td>
                </tr>
                @endforeach
            </tbody>
        @endcardTable
    </div>
</div>
@endsection
