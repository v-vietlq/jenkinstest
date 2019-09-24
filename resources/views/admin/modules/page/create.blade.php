@extends('admin.master')
@section('title',__('module.title.page_create'))
@section('controller',__('module.controller.page'))
@section('action',__('module.action.create'))

@push('themejs')
<script src="{{ asset(PLUGIN_PATH.'/editors/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset(PLUGIN_PATH.'/forms/styling/switch.min.js') }}"></script>
<script src="{{ asset(PLUGIN_PATH.'/forms/inputs/maxlength.min.js') }}"></script>
<script src="{{ asset(ASSETS_PATH.'/js/custom.js') }}"></script>
@endpush

@section('content')
<form action="{{ route('admin.page.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')

    @include('admin.blocks.button',['exit' => 'admin.page.index'])

    <div class="row">
        <div class="col-xl-6">
            @card(['title' => 'module.card.infor_vi'])
                <div class="form-group">
                    <label>{{ __('form.page.title_vi') }}: <span class="text-danger">*</span></label>
                    <input type="text" name="title_vi" class="form-control" value="{{ old('title_vi') }}" />
                </div>

                @editor(['name' => 'intro_vi','title' => 'form.page.intro_vi'])
                    {{ old('intro_vi') }}
                @endeditor

                @editor(['name' => 'content_vi','title' => 'form.page.content_vi'])
                    {{ old('content_vi') }}
                @endeditor

                <div class="form-group">
                    <label>{{ __('form.page.slug_vi') }}: <span class="text-danger">*</span></label>
                    <input type="text" name="slug_vi" class="form-control" value="{{ old('slug_vi') }}" />
                </div>

                <div class="form-group">
                    <label>{{ __('form.page.title_tag_vi') }}: <span class="text-danger">*</span></label>
                    <input type="text" name="title_tag_vi" class="form-control" value="{{ old('title_tag_vi') }}" />
                </div>

                @description(['name' => 'description_tag_vi','title' => 'form.page.description_tag_vi'])
                    {{ old('description_tag_vi') }}
                @enddescription
            @endcard
        </div>

        <div class="col-xl-6">
            @card(['title' => 'module.card.infor_en'])
                <div class="form-group">
                    <label>{{ __('form.page.title_en') }}: <span class="text-danger">*</span></label>
                    <input type="text" name="title_en" class="form-control" value="{{ old('title_en') }}" />
                </div>

                @editor(['name' => 'intro_en','title' => 'form.page.intro_en'])
                    {{ old('intro_en') }}
                @endeditor

                @editor(['name' => 'content_en','title' => 'form.page.content_en'])
                    {{ old('content_en') }}
                @endeditor

                <div class="form-group">
                    <label>{{ __('form.page.slug_en') }}: <span class="text-danger">*</span></label>
                    <input type="text" name="slug_en" class="form-control" value="{{ old('slug_en') }}" />
                </div>

                <div class="form-group">
                    <label>{{ __('form.page.title_tag_en') }}: <span class="text-danger">*</span></label>
                    <input type="text" name="title_tag_en" class="form-control" value="{{ old('title_tag_en') }}" />
                </div>

                @description(['name' => 'description_tag_en','title' => 'form.page.description_tag_en'])
                    {{ old('description_tag_en') }}
                @enddescription
            @endcard
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            @card(['title' => 'module.card.information'])
                @switchCom(['name' => 'status','title' => 'form.page.status','on' => 'On','off' => 'Off'])
                    {{ (old('status','on') == 'on') ? 'checked' : '' }}
                @endswitchCom
            @endcard
        </div>
    </div>
</form>
@endsection

