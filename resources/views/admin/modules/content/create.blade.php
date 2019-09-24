@extends('admin.master')
@section('title',__('module.title.content_create'))
@section('controller',__('module.controller.content'))
@section('action',__('module.action.create'))

@push('themejs')
<script src="{{ asset(PLUGIN_PATH.'/forms/styling/switch.min.js') }}"></script>
<script src="{{ asset(ASSETS_PATH.'/js/custom.js') }}"></script>
@endpush

@section('content')
<form action="{{ route('admin.content.store',['pageid' => $pageid]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')

    <div class="card card-body border-top-primary">		
        <div class="text-left">
            <button type="submit" name="btnSave" value="btnSave" class="btn btn-success btn-labeled btn-labeled-left ml-2"><b><i class="icon-add"></i></b> {{ __('form.button.save') }}</button>
            <button type="submit" name="btnSaveClose" value="btnSaveClose" class="btn bg-teal-400 btn-labeled btn-labeled-left"><b><i class="icon-add-to-list"></i></b> {{ __('form.button.saveclose') }}</button>
            <a href="{{ route('admin.content.index',["pageid" => $pageid]) }}" class="btn btn-danger btn-labeled btn-labeled-left"><b><i class="icon-close2"></i></b> {{ __('form.button.close') }}</a>
        </div>
    </div>
    
    <div class="row">
        <div class="col-xl-6">
            @card(['title' => 'module.card.infor_vi'])
                <div class="form-group">
                    <label>{{ __('form.content.content_vi') }}: <span class="text-danger">*</span></label>
                    <input type="text" name="content_vi" class="form-control" value="{{ old('content_vi') }}" />
                </div>
            @endcard
        </div>

        <div class="col-xl-6">
            @card(['title' => 'module.card.infor_en'])
            <div class="form-group">
                <label>{{ __('form.content.content_en') }}: <span class="text-danger">*</span></label>
                <input type="text" name="content_en" class="form-control" value="{{ old('content_en') }}" />
            </div>
            @endcard
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            @card(['title' => 'module.card.information'])
                <div class="form-group">
                    <label>{{ __('form.content.page_id') }}: <span class="text-danger">*</span></label>
                    <select name="page_id" class="form-control">
                        @foreach ($pages as $page)
                        <option value="{{ $page->id }}" {{ (old('page_id',$pageid) == $page->id) ? 'selected' : '' }}>{{ $page->title_vi }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>{{ __('form.content.code') }}: <span class="text-danger">*</span></label>
                    <input type="text" name="code" class="form-control" value="{{ old('code') }}" />
                </div>
            @endcard
        </div>
    </div>
</form>
@endsection

