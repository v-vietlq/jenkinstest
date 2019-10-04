@extends('admin.master')
@section('title',__('module.title.category_create'))
@section('controller',__('module.controller.category'))
@section('action',__('module.action.create'))

@push('themejs')
<script src="{{ asset(PLUGIN_PATH.'/editors/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset(PLUGIN_PATH.'/forms/styling/switch.min.js') }}"></script>
<script src="{{ asset(ASSETS_PATH.'/js/custom.js') }}"></script>
@endpush

@section('content')
<form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')

    @include('admin.blocks.button',['exit' => 'admin.category.index'])

    <div class="row">
        <div class="col-xl-6">
            @card(['title' => 'module.card.infor_vi'])
                <div class="form-group">
                    <label>{{ __('form.category.name_vi') }}: <span class="text-danger">*</span></label>
                    <input type="text" name="name_vi" class="form-control" value="{{ old('name_vi') }}" />
                </div>

                @editor(['name' => 'description_vi','title' => 'form.category.description_vi'])
                    {{ old('description_vi') }}
                @endeditor

                <div class="form-group">
                    <label>{{ __('form.category.slug_vi') }}: <span class="text-danger">*</span></label>
                    <input type="text" name="slug_vi" class="form-control" value="{{ old('slug_vi') }}" />
                </div>
            @endcard
        </div>

        <div class="col-xl-6">
            @card(['title' => 'module.card.infor_en'])
                <div class="form-group">
                    <label>{{ __('form.category.name_en') }}: <span class="text-danger">*</span></label>
                    <input type="text" name="name_en" class="form-control" value="{{ old('name_en') }}" />
                </div>

                @editor(['name' => 'description_en','title' => 'form.category.description_vi'])
                    {{ old('description_en') }}
                @endeditor

                <div class="form-group">
                    <label>{{ __('form.category.slug_en') }}: <span class="text-danger">*</span></label>
                    <input type="text" name="slug_en" class="form-control" value="{{ old('slug_en') }}" />
                </div>
            @endcard
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            @card(['title' => 'module.card.information'])
                <div class="form-group">
                    <label>{{ __('form.category.parent_id') }}: <span class="text-danger">*</span></label>
                    <select name="parent" class="form-control">
                        <option value="0">Root</option>
                        @php
                            recursionSelect($category);
                        @endphp
                    </select>
                </div>

                <div class="form-group">
                    <label>{{ __('form.category.position') }}: <span class="text-danger">*</span></label>
                    <input type="text" name="position" class="form-control" value="{{ old('position',$position) }}" />
                </div>

                @switchCom(['name' => 'status','title' => 'form.category.status','on' => 'On','off' => 'Off'])
                    {{ (old('status','on') == 'on') ? 'checked' : '' }}
                @endswitchCom
            @endcard
        </div>
    </div>

</form>
@endsection

