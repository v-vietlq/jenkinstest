@extends('admin.master')
@section('title',__('module.title.job_edit'))
@section('controller',__('module.controller.job'))
@section('action',__('module.action.edit'))

@push('themejs')
<script src="{{ asset(PLUGIN_PATH.'/editors/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset(PLUGIN_PATH.'/forms/styling/switch.min.js') }}"></script>
<script src="{{ asset(PLUGIN_PATH.'/forms/tags/tokenfield.min.js') }}"></script>
<script src="{{ asset(PLUGIN_PATH.'/forms/inputs/maxlength.min.js') }}"></script>
<script src="{{ asset(PLUGIN_PATH.'/ui/moment/moment.min.js') }}"></script>
<script src="{{ asset(PLUGIN_PATH.'/pickers/daterangepicker.js') }}"></script>
<script src="{{ asset(PLUGIN_PATH.'/extensions/jquery_ui/interactions.min.js') }}"></script>
<script src="{{ asset(PLUGIN_PATH.'/forms/selects/select2.min.js') }}"></script>
<script src="{{ asset(ASSETS_PATH.'/js/custom.js') }}"></script>
@endpush

@section('content')
<form action="{{ route('admin.job.update',['id' => $job['id']]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')

    @include('admin.blocks.button',['exit' => 'admin.job.index'])

    <div class="row">
        <div class="col-xl-6">
            @card(['title' => 'module.card.infor_vi'])
                <div class="form-group">
                    <label>{{ __('form.job.name_vi') }}: <span class="text-danger">*</span></label>
                    <input type="text" name="name_vi" class="form-control" value="{{ old('name_vi',$job["name_vi"]) }}" />
                </div>

                <div class="form-group">
                    <label>{{ __('form.job.salary_vi') }}: <span class="text-danger">*</span></label>
                    <input type="text" name="salary_vi" class="form-control" value="{{ old('salary_vi',$job["salary_vi"]) }}" />
                </div>

                <div class="form-group">
                    <label>{{ __('form.job.age_vi') }}: <span class="text-danger">*</span></label>
                    <input type="text" name="age_vi" class="form-control" value="{{ old('age_vi',$job["age_vi"]) }}"  />
                </div>
                
                <div class="form-group">
                    <label>{{ __('form.job.address_vi') }}: <span class="text-danger">*</span></label>
                    <input type="text" name="address_vi" class="form-control" value="{{ old('address_vi',$job["address_vi"]) }}"  />
                </div>

                <div class="form-group" style="display: none;">
                    <label>{{ __('form.job.timework_vi') }}: <span class="text-danger">*</span></label>
                    <input type="text" name="time_work_vi" class="form-control" value="{{ old('time_work_vi',$job["time_work_vi"]) }}" />
                </div>

                <div class="form-group">
                    <label>{{ __('form.job.place_work_vi') }}: <span class="text-danger">*</span></label>
                    <input type="text" name="place_work_vi" class="form-control" value="{{ old('place_work_vi',$job["place_work_vi"]) }}" />
                </div>

                <div class="form-group" style="display: none;">
                    <label>{{ __('form.job.contact_info_vi') }}: <span class="text-danger">*</span></label>
                    <input type="text" name="contact_info_vi" class="form-control" value="{{ old('contact_info_vi',$job["contact_info_vi"]) }}" />
                </div>
                
                @editor(['name' => 'description_vi','title' => 'form.job.description_vi'])
                    {{ old('description_vi',$job["description_vi"]) }}
                @endeditor

                @editor(['name' => 'content_vi','title' => 'form.job.content_vi'])
                    {{ old('content_vi',$job["content_vi"]) }}
                @endeditor

                @editor(['name' => 'welfare_vi','title' => 'form.job.welfare_vi'])
                    {{ old('welfare_vi',$job["welfare_vi"]) }}
                @endeditor

                @tag(['name' => 'keyword_tag_vi','title' => 'form.job.keyword_tag_vi'])
                    {{ old('keyword_tag_vi',$job["keyword_tag_vi"]) }}
                @endtag

                <div class="form-group">
                    <label>{{ __('form.job.slug_vi') }}: <span class="text-danger">*</span></label>
                    <input type="text" name="slug_vi" class="form-control" value="{{ old('slug_vi',$job["slug_vi"]) }}" />
                </div>

                <div class="form-group">
                    <label>{{ __('form.job.title_tag_vi') }}: <span class="text-danger">*</span></label>
                    <input type="text" name="title_tag_vi" class="form-control" value="{{ old('title_tag_vi',$job["title_tag_vi"]) }}" />
                </div>

                @description(['name' => 'description_tag_vi','title' => 'form.job.description_tag_vi'])
                    {{ old('description_tag_vi',$job["description_tag_vi"]) }}
                @enddescription
            @endcard
        </div>

        <div class="col-xl-6">
            @card(['title' => 'module.card.infor_en'])
                <div class="form-group">
                    <label>{{ __('form.job.name_en') }}: <span class="text-danger">*</span></label>
                    <input type="text" name="name_en" class="form-control" value="{{ old('name_en',$job["name_en"]) }}" />
                </div>

                <div class="form-group">
                    <label>{{ __('form.job.salary_en') }}: <span class="text-danger">*</span></label>
                    <input type="text" name="salary_en" class="form-control" value="{{ old('salary_en',$job["salary_en"]) }}" />
                </div>

                <div class="form-group">
                    <label>{{ __('form.job.age_en') }}: <span class="text-danger">*</span></label>
                    <input type="text" name="age_en" class="form-control" value="{{ old('age_en',$job["age_en"]) }}" />
                </div>

                <div class="form-group">
                    <label>{{ __('form.job.address_en') }}: <span class="text-danger">*</span></label>
                    <input type="text" name="address_en" class="form-control" value="{{ old('address_en',$job["address_en"]) }}"  />
                </div>
                
                <div class="form-group" style="display: none;">
                    <label>{{ __('form.job.timework_en') }}: <span class="text-danger">*</span></label>
                    <input type="text" name="time_work_en" class="form-control" value="{{ old('time_work_en',$job["time_work_en"]) }}" />
                </div>

                <div class="form-group">
                    <label>{{ __('form.job.place_work_en') }}: <span class="text-danger">*</span></label>
                    <input type="text" name="place_work_en" class="form-control" value="{{ old('place_work_en',$job["place_work_en"]) }}" />
                </div>

                <div class="form-group" style="display: none;">
                    <label>{{ __('form.job.contact_info_en') }}: <span class="text-danger">*</span></label>
                    <input type="text" name="contact_info_en" class="form-control" value="{{ old('contact_info_vi',$job["contact_info_vi"]) }}" />
                </div>
                
                @editor(['name' => 'description_en','title' => 'form.job.description_en'])
                    {{ old('description_en',$job["description_en"]) }}
                @endeditor

                @editor(['name' => 'content_en','title' => 'form.job.content_en'])
                    {{ old('content_en',$job["content_en"]) }}
                @endeditor

                @editor(['name' => 'welfare_en','title' => 'form.job.welfare_en'])
                    {{ old('welfare_en',$job["welfare_en"]) }}
                @endeditor

                @tag(['name' => 'keyword_tag_en','title' => 'form.job.keyword_tag_en'])
                    {{ old('keyword_tag_en',$job["keyword_tag_en"]) }}
                @endtag

                <div class="form-group">
                    <label>{{ __('form.job.slug_en') }}: <span class="text-danger">*</span></label>
                    <input type="text" name="slug_en" class="form-control" value="{{ old('slug_en',$job["slug_en"]) }}" />
                </div>

                <div class="form-group">
                    <label>{{ __('form.job.title_tag_en') }}: <span class="text-danger">*</span></label>
                    <input type="text" name="title_tag_en" class="form-control" value="{{ old('title_tag_en',$job["title_tag_en"]) }}"  />
                </div>

                @description(['name' => 'description_tag_en','title' => 'form.job.description_tag_en'])
                    {{ old('description_tag_en',$job["description_tag_en"]) }}
                @enddescription
            @endcard
        </div>
    </div>

    <div class="row">
        <div class="col-xl-8">
            @card(['title' => 'module.card.information'])
                <div class="form-group">
                    <label>{{ __('form.job.employer') }}: <span class="text-danger">*</span></label>
                    <select class="form-control select-remote-data" name="employer_id" data-fouc>
                        <option value="{{ $employer->id }}" selected="selected">{{ $employer->name_vi }}</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>{{ __('form.job.sticker') }}: <span class="text-danger">*</span></label>
                    <select name="sticker" class="form-control">
                        <option value="1" {{ (old('sticker',$job["sticker"]) == 1) ? 'selected' : '' }}>Công việc HOT</option>
                        <option value="2" {{ (old('sticker',$job["sticker"]) == 2) ? 'selected' : '' }}>Công việc Nổi Bật</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>{{ __('form.job.literacy') }}: <span class="text-danger">*</span></label>
                    <select name="literacy" class="form-control">
                        <option value="1" {{ (old('literacy',$job["literacy"]) == 1) ? 'selected' : '' }}>{{ __('form.job.junior_high_school') }}</option>
                        <option value="2" {{ (old('literacy',$job["literacy"]) == 2) ? 'selected' : '' }}>{{ __('form.job.high_school') }}</option>
                        <option value="3" {{ (old('literacy',$job["literacy"]) == 3) ? 'selected' : '' }}>{{ __('form.job.intermediate') }}</option>
                        <!-- <option value="4" {{ (old('literacy',$job["literacy"]) == 4) ? 'selected' : '' }}>{{ __('form.job.college') }}</option>
                        <option value="5" {{ (old('literacy',$job["literacy"]) == 5) ? 'selected' : '' }}>{{ __('form.job.university') }}</option>
                        <option value="6" {{ (old('literacy',$job["literacy"]) == 6) ? 'selected' : '' }}>{{ __('form.job.after_university') }}</option> -->
                    </select>
                </div>

                <div class="form-group">
                    <label>{{ __('form.job.years_experience') }}: <span class="text-danger">*</span></label>
                    <select name="years_experience" class="form-control">
                        <option value="1" {{ (old('years_experience',$job["years_experience"]) == 1) ? 'selected' : '' }}>{{ __('form.job.less_than_a_year') }}</option>
                        <option value="2" {{ (old('years_experience',$job["years_experience"]) == 2) ? 'selected' : '' }}>{{ __('form.job.a_year') }}</option>
                        <option value="3" {{ (old('years_experience',$job["years_experience"]) == 3) ? 'selected' : '' }}>{{ __('form.job.two_year') }}</option>
                        <option value="4" {{ (old('years_experience',$job["years_experience"]) == 4) ? 'selected' : '' }}>{{ __('form.job.over_two_years') }}</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>{{ __('form.job.quantity') }}: <span class="text-danger">*</span></label>
                    <input type="text" name="quantity" class="form-control" value="{{ old('quantity',$job["quantity"]) }}" />
                </div>

                <div class="form-group">
                    <label>{{ __('form.job.viewed') }}: <span class="text-danger">*</span></label>
                    <input type="text" name="viewed" class="form-control" value="{{ old('viewed',$job["viewed"]) }}" />
                </div>

                <div class="form-group">
                    <label>{{ __('form.job.post_time_at') }}: <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-calendar22"></i></span>
                        </span>
                        <input type="text" name="post_time_at" class="form-control daterange-single" value="{{ old('post_time_at',$job["post_time_at"]) }}">
                    </div>
                </div>

                <div class="form-group" style="display:none">
                    <label>{{ __('form.job.delete_time_at') }}: <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-calendar22"></i></span>
                        </span>
                        <input type="text" name="delete_time_at" class="form-control daterange-single" value="{{ old('delete_time_at',$job["delete_time_at"]) }}">
                    </div>
                </div>

                <div class="form-group">
                    <label>{{ __('form.job.city') }}: <span class="text-danger">*</span></label>
                    <select name="city" class="form-control"></select>
                </div>

                <div class="form-group">
                    <label>{{ __('form.job.district') }}: <span class="text-danger">*</span></label>
                    <select name="district" class="form-control">
                        <option>Vui lòng chọn quận</option>
                    </select>
                </div>

                <div class="form-group" style="display:none">
                    <label>{{ __('form.job.ward') }}: <span class="text-danger">*</span></label>
                    <select name="ward" class="form-control">
                        <option>Vui lòng chọn phường</option>
                    </select>
                </div>

                @switchCom(['name' => 'status','title' => 'form.job.status','on' => 'On','off' => 'Off'])
                    {{ (old('status',$job["status"]) == 'on') ? 'checked' : '' }}
                @endswitchCom
            @endcard
        </div>

        <div class="col-xl-4">
            @card(['title' => 'module.card.information'])
                <div class="form-group">
                    <label class="font-weight-semibold">{{ __('form.job.contract') }}</label>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="contract[]" value="1" {{ (in_array(1,unserialize($job['contract']))) ? 'checked' : '' }}> {{ __('form.job.fulltime') }}
                        </label>
                    </div>

                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="contract[]" value="2" {{ (in_array(2,unserialize($job['contract']))) ? 'checked' : '' }}> {{ __('form.job.parttime') }}
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="font-weight-semibold">{{ __('form.job.working_hours') }}</label>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="working_hours[]" value="1" {{ (in_array(1,unserialize($job['working_hours']))) ? 'checked' : '' }}> {{ __('form.job.shifts') }}
                        </label>
                    </div>

                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="working_hours[]" value="2" {{ (in_array(2,unserialize($job['working_hours']))) ? 'checked' : '' }}> {{ __('form.job.office') }}
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="font-weight-semibold">{{ __('form.job.gender') }}</label>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="gender[]" value="1" {{ (in_array(1,unserialize($job['gender']))) ? 'checked' : '' }}> {{ __('form.job.female') }}
                        </label>
                    </div>

                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="gender[]" value="2" {{ (in_array(2,unserialize($job['gender']))) ? 'checked' : '' }}> {{ __('form.job.male') }}
                        </label>
                    </div>

                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="gender[]" value="3" {{ (in_array(3,unserialize($job['gender']))) ? 'checked' : '' }}> {{ __('form.job.no_required') }}
                        </label>
                    </div>
                </div>
            @endcard

            @card(['title' => 'module.card.information'])
                <div class="form-group">
                    @php
                        recursionList($category,old('category',$category_selected))
                    @endphp
                </div>
            @endcard
        </div>
    </div>
</form>

<script type="text/javascript">
var domain = 'http://localhost:8000';

function sortName (object) {
    var array = []

    Object.keys(object).forEach(function(key) {
        array.push(object[key]);
    });

    array.sort(function(a, b) {
        var textA = a.slug.toUpperCase();
        var textB = b.slug.toUpperCase();
        return (textA < textB) ? -1 : (textA > textB) ? 1 : 0;
    });

    return array;
}

function loadData (url,tag,selected = '',area = '') {
    $.ajax({
        type: "GET",
        url: domain + "/hanhchinhvn/" + url,
        dataType: "json",
        success: function (repsonse) {
            var obj = sortName(repsonse);
            var option = '';
            obj.forEach(function(item, index){ 
                if (selected == item.code) {
                    option += '<option value="'+item.code+'" selected>'+ item.name_with_type +'</option>';
                } else {
                    option += '<option value="'+item.code+'">'+ item.name_with_type +'</option>';
                }
                
            });

            $(tag).html("<option value=''>Vui lòng chọn</option>"+option);

            if (area == 'district') {
                var idFirstDistrict = obj[0].code;
                loadData('phuong/' + idFirstDistrict + '.json','select[name="ward"]');
            }
        }
    });
}

loadData('tinh_tp.json','select[name="city"]','{{ old('city',$job['city']) }}');
loadData('quan/{{ old('city',$job['city']) }}.json','select[name="district"]','{{ old('district',$job['district']) }}');
loadData('phuong/{{ old('district',$job['district']) }}.json','select[name="ward"]','{{ old('ward',$job['ward']) }}');

$('select[name="city"]').on('change',function () {
    var selectedCity = $(this).val();
    loadData('quan/' + selectedCity + '.json','select[name="district"]','{{ old('district',$job['district']) }}','district');
    
});

$('select[name="district"]').on('change',function () {
    var selectedDestrict = $(this).val();
    loadData('phuong/' + selectedDestrict + '.json','select[name="ward"]',{{ old('ward',$job['ward']) }});
});
</script>
@endsection
