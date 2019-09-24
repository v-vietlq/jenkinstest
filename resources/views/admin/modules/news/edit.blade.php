@extends('admin.master')
@section('title',__('module.title.news_edit'))
@section('controller',__('module.controller.news'))
@section('action',__('module.action.create'))

@push('themejs')
<script src="{{ asset(PLUGIN_PATH.'/editors/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset(PLUGIN_PATH.'/forms/styling/switch.min.js') }}"></script>
<script src="{{ asset(PLUGIN_PATH.'/forms/tags/tokenfield.min.js') }}"></script>
<script src="{{ asset(PLUGIN_PATH.'/forms/inputs/maxlength.min.js') }}"></script>
<script src="{{ asset(ASSETS_PATH.'/js/custom.js') }}"></script>
@endpush

@section('content')
<form action="{{ route('admin.news.update',['id' => $news->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')

    @include('admin.blocks.button',['exit' => 'admin.employer.index'])

    <div class="row">
        <div class="col-xl-6">
            @card(['title' => 'module.card.infor_vi',['exit' => 'admin.news.create']])
                <div class="form-group">
                    <label>{{ __('form.news.title_vi') }}: <span class="text-danger">*</span></label>
                    <input type="text" name="title_vi" class="form-control" value="{{ old('title_vi',$news->title_vi) }}" />
                </div>

                <div class="form-group">
                    <label>{{ __('form.news.author_vi') }}: <span class="text-danger">*</span></label>
                    <input type="text" name="author_vi" class="form-control" value="{{ old('author_vi',$news->author_vi) }}" />
                </div>

                @editor(['name' => 'intro_vi','title' => 'form.news.intro_vi'])
                    {{ old('intro_vi',$news->intro_vi) }}
                @endeditor

                @editor(['name' => 'content_vi','title' => 'form.news.content_vi'])
                    {{ old('content_vi',$news->content_vi) }}
                @endeditor

                <div class="form-group">
                    <label>{{ __('form.news.title_tag_vi') }}: <span class="text-danger">*</span></label>
                    <input type="text" name="title_tag_vi" class="form-control" value="{{ old('title_tag_vi',$news->title_tag_vi) }}"  />
                </div>

                <div class="form-group">
                    <label>{{ __('form.news.slug_vi') }}: <span class="text-danger">*</span></label>
                    <input type="text" name="slug_vi" class="form-control" value="{{ old('slug_vi',$news->slug_vi) }}" />
                </div>

                @tag(['name' => 'keyword_tag_vi','title' => 'form.news.keyword_tag_vi'])
                    {{ old('keyword_tag_vi',$news->keyword_tag_vi) }}
                @endtag

                @description(['name' => 'description_tag_vi','title' => 'form.news.description_tag_vi'])
                    {{ old('description_tag_vi',$news->description_tag_vi) }}
                @enddescription
            @endcard
        </div>

        <div class="col-xl-6">
            @card(['title' => 'module.card.infor_en'])
                <div class="form-group">
                    <label>{{ __('form.news.title_en') }}: <span class="text-danger">*</span></label>
                    <input type="text" name="title_en" class="form-control" value="{{ old('title_en',$news->title_en) }}" />
                </div>

                <div class="form-group">
                    <label>{{ __('form.news.author_en') }}: <span class="text-danger">*</span></label>
                    <input type="text" name="author_en" class="form-control" value="{{ old('author_en',$news->author_en) }}" />
                </div>

                @editor(['name' => 'intro_en','title' => 'form.news.intro_en'])
                    {{ old('intro_en',$news->intro_en) }}
                @endeditor

                @editor(['name' => 'content_en','title' => 'form.news.content_en'])
                    {{ old('content_en',$news->content_en) }}
                @endeditor

                <div class="form-group">
                    <label>{{ __('form.news.title_tag_en') }}: <span class="text-danger">*</span></label>
                    <input type="text" name="title_tag_en" class="form-control" value="{{ old('title_tag_en',$news->title_tag_en) }}" />
                </div>

                <div class="form-group">
                    <label>{{ __('form.news.slug_en') }}: <span class="text-danger">*</span></label>
                    <input type="text" name="slug_en" class="form-control" value="{{ old('slug_en',$news->slug_en) }}" />
                </div>

                @tag(['name' => 'keyword_tag_en','title' => 'form.news.keyword_tag_en'])
                    {{ old('keyword_tag_en',$news->keyword_tag_en) }}
                @endtag

                @description(['name' => 'description_tag_en','title' => 'form.news.description_tag_en'])
                    {{ old('description_tag_en',$news->description_tag_en) }}
                @enddescription
            @endcard
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            @card(['title' => 'module.card.information'])
                <div class="form-group">
                    <label>{{ __('form.category.parent_id') }}: <span class="text-danger">*</span></label>
                    <select name="category_id" class="form-control">
                        <option value="0">Root</option>
                        @php
                            recursionSelect($category,$news->category_id);
                        @endphp
                    </select>
                </div>

                @switchCom(['name' => 'status','title' => 'form.news.status','on' => 'On','off' => 'Off'])
                    {{ (old('status',$news->status) == 'on') ? 'checked' : '' }}
                @endswitchCom

                @switchCom(['name' => 'featured','title' => 'form.news.featured','on' => 'On','off' => 'Off'])
                    {{ (old('featured',$news->featured) == 'on') ? 'checked' : '' }}
                @endswitchCom
            @endcard
        </div>
    </div>
</form>
@endsection

