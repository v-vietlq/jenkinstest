@extends('admin.master')
@section('title',__('module.title.employer_create'))
@section('controller',__('module.controller.employer'))
@section('action',__('module.action.create'))

@push('themejs')
<script src="{{ asset(PLUGIN_PATH.'/editors/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset(PLUGIN_PATH.'/forms/styling/switch.min.js') }}"></script>
<script src="{{ asset(PLUGIN_PATH.'/forms/tags/tokenfield.min.js') }}"></script>
<script src="{{ asset(PLUGIN_PATH.'/forms/inputs/maxlength.min.js') }}"></script>
<script src="{{ asset(ASSETS_PATH.'/js/custom.js') }}"></script>
@endpush

@section('content')
<form action="{{ route('admin.employer.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')

    @include('admin.blocks.button',['exit' => 'admin.employer.index'])

    <div class="row">
        <div class="col-xl-6">
            @card(['title' => 'module.card.infor_vi'])
                <div class="form-group">
                    <label>{{ __('form.employer.name_vi') }}: <span class="text-danger">*</span></label>
                    <input type="text" name="name_vi" class="form-control" value="{{ old('name_vi') }}" />
                </div>

                <div class="form-group">
                    <label>{{ __('form.employer.address_vi') }}: <span class="text-danger">*</span></label>
                    <input type="text" name="address_vi" class="form-control" value="{{ old('address_vi') }}" />
                </div>

                @editor(['name' => 'about_vi','title' => 'form.employer.about_vi'])
                    {{ old('about_vi') }}
                @endeditor

                <div class="form-group">
                    <label>{{ __('form.employer.slug_vi') }}: <span class="text-danger">*</span></label>
                    <input type="text" name="slug_vi" class="form-control" value="{{ old('slug_vi') }}" />
                </div>

                <div class="form-group">
                    <label>{{ __('form.employer.title_tag_vi') }}: <span class="text-danger">*</span></label>
                    <input type="text" name="title_tag_vi" class="form-control" value="{{ old('title_tag_vi') }}" />
                </div>

                @tag(['name' => 'keyword_tag_vi','title' => 'form.employer.keyword_tag_vi'])
                    {{ old('keyword_tag_vi') }}
                @endtag

                @description(['name' => 'description_tag_vi','title' => 'form.employer.description_tag_vi'])
                    {{ old('description_tag_vi') }}
                @enddescription
            @endcard
        </div>

        <div class="col-xl-6">
            @card(['title' => 'module.card.infor_en'])
                <div class="form-group">
                    <label>{{ __('form.employer.name_en') }}: <span class="text-danger">*</span></label>
                    <input type="text" name="name_en" class="form-control" value="{{ old('name_en') }}" />
                </div>

                <div class="form-group">
                    <label>{{ __('form.employer.address_en') }}: <span class="text-danger">*</span></label>
                    <input type="text" name="address_en" class="form-control" value="{{ old('address_en') }}" />
                </div>

                @editor(['name' => 'about_en','title' => 'form.employer.about_en'])
                    {{ old('about_en') }}
                @endeditor

                <div class="form-group">
                    <label>{{ __('form.employer.slug_en') }}: <span class="text-danger">*</span></label>
                    <input type="text" name="slug_en" class="form-control" value="{{ old('slug_en') }}" />
                </div>

                <div class="form-group">
                    <label>{{ __('form.employer.title_tag_en') }}: <span class="text-danger">*</span></label>
                    <input type="text" name="title_tag_en" class="form-control" value="{{ old('title_tag_en') }}" />
                </div>

                @tag(['name' => 'keyword_tag_en','title' => 'form.employer.keyword_tag_en'])
                    {{ old('keyword_tag_en') }}
                @endtag

                @description(['name' => 'description_tag_en','title' => 'form.employer.description_tag_en'])
                    {{ old('description_tag_en') }}
                @enddescription
            @endcard
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            @card(['title' => 'module.card.information'])
                <div class="form-group">
                    <label>{{ __('form.employer.phone') }}: <span class="text-danger">*</span></label>
                    <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" />
                </div>

                <div class="form-group">
                    <label>{{ __('form.employer.viewed') }}: <span class="text-danger">*</span></label>
                    <input type="text" name="viewed" class="form-control" value="{{ old('viewed',10) }}" />
                </div>

                @switchCom(['name' => 'status','title' => 'form.employer.status','on' => 'On','off' => 'Off'])
                    {{ (old('status','on') == 'on') ? 'checked' : '' }}
                @endswitchCom
            @endcard
        </div>
    </div>
</form>
@endsection

