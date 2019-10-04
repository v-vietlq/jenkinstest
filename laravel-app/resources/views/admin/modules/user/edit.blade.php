@extends('admin.master')
@section('title',__('module.title.user_edit'))
@section('controller',__('module.controller.user'))
@section('action',__('module.action.edit'))

@push('themejs')
<script src="{{ asset(PLUGIN_PATH.'/editors/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset(PLUGIN_PATH.'/forms/styling/switch.min.js') }}"></script>
<script src="{{ asset(PLUGIN_PATH.'/forms/inputs/maxlength.min.js') }}"></script>
<script src="{{ asset(PLUGIN_PATH.'/ui/moment/moment.min.js') }}"></script>
<script src="{{ asset(PLUGIN_PATH.'/pickers/daterangepicker.js') }}"></script>
<script src="{{ asset(ASSETS_PATH.'/js/custom.js') }}"></script>
@endpush

@section('content')
<form action="{{ route('admin.user.update',['id' => $user['id']]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')

    @include('admin.blocks.button',['exit' => 'admin.user.index'])

    <div class="row">
        <div class="col-xl-8">
            @card(['title' => 'module.card.information_login'])
                <div class="form-group">
                    <label>{{ __('form.user.email') }}: <span class="text-danger">*</span></label>
                    <input type="email" name="email" class="form-control" value="{{ old('email',$user->email) }}" />
                </div>

                <div class="form-group">
                    <label>{{ __('form.user.password') }}: <span class="text-danger">*</span></label>
                    <input type="password" name="password" class="form-control" value="{{ old('password') }}" />
                </div>

                <div class="form-group">
                    <label>{{ __('form.user.password_confirmation') }}: <span class="text-danger">*</span></label>
                    <input type="password" name="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}" />
                </div>
            @endcard
        </div>

        <div class="col-xl-4">
            @card(['title' => 'module.card.information'])
                <div class="form-group">
                    <label>{{ __('form.user.level') }}: <span class="text-danger">*</span></label>
                    <select name="level" class="form-control">
                        <option value="1" {{ (old('level',$user->level) == 1) ? 'selected' : '' }}>{{ __('form.user.admin') }}</option>
                        <option value="2" {{ (old('level',$user->level) == 2) ? 'selected' : '' }}>{{ __('form.user.employer') }}</option>
                        <option value="3" {{ (old('level',$user->level) == 3) ? 'selected' : '' }}>{{ __('form.user.member') }}</option>
                    </select>
                </div>

                @switchCom(['name' => 'status','title' => 'form.user.status','on' => 'On','off' => 'Off'])
                    {{ (old('status',$user->status) == 'on') ? 'checked' : '' }}
                @endswitchCom
            @endcard
        </div>
    </div>

    <div class="row">
        <div class="col-xl-8">
            @card(['title' => 'module.card.information_personal'])
                <div class="form-group">
                    <label>{{ __('form.user.fullname') }}: <span class="text-danger">*</span></label>
                    <input type="text" name="fullname" class="form-control" value="{{ old('fullname',$info->fullname) }}" />
                </div>

                <div class="form-group">
                    <label class="d-block">{{ __('form.user.gender') }}</label>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="gender" value="1" {{ (old('gender',$info->gender) == 1) ? 'checked' : '' }}> {{ __('form.user.male') }}
                        </label>
                    </div>

                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="gender" value="0" {{ (old('gender',$info->gender) == 0) ? 'checked' : '' }}> {{ __('form.user.female') }}                        
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>{{ __('form.user.birthday') }}: <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-calendar22"></i></span>
                        </span>
                        <input type="text" name="birthday" class="form-control daterange-single" value="{{ old('birthday',$info->birthday) }}">
                    </div>
                </div>

                <div class="form-group">
                    <label>{{ __('form.user.phone') }}: <span class="text-danger">*</span></label>
                    <input type="text" name="phone" class="form-control" value="{{ old('phone',$info->phone) }}" />
                </div>

                <div class="form-group">
                    <label>{{ __('form.user.address') }}: <span class="text-danger">*</span></label>
                    <input type="text" name="address" class="form-control" value="{{ old('address',$info->address) }}" />
                </div>

                <div class="form-group">
                    <label>{{ __('form.user.zalo_phone') }}: <span class="text-danger">*</span></label>
                    <input type="text" name="zalo_phone" class="form-control" value="{{ old('zalo_phone',$info->zalo_phone) }}" />
                </div>

                <div class="form-group">
                    <label>{{ __('form.user.literacy') }}: <span class="text-danger">*</span></label>
                    <select name="literacy" class="form-control">
                        <option value="1" {{ (old('literacy',$info->literacy) == 1) ? 'selected' : '' }}>{{ __('form.user.junior_high_school') }}</option>
                        <option value="2" {{ (old('literacy',$info->literacy) == 2) ? 'selected' : '' }}>{{ __('form.user.high_school') }}</option>
                        <option value="3" {{ (old('literacy',$info->literacy) == 3) ? 'selected' : '' }}>{{ __('form.user.intermediate') }}</option>
                        <option value="4" {{ (old('literacy',$info->literacy) == 4) ? 'selected' : '' }}>{{ __('form.user.college') }}</option>
                        <option value="5" {{ (old('literacy',$info->literacy) == 5) ? 'selected' : '' }}>{{ __('form.user.university') }}</option>
                        <option value="6" {{ (old('literacy',$info->literacy) == 6) ? 'selected' : '' }}>{{ __('form.user.after_university') }}</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>{{ __('form.user.years_experience') }}: <span class="text-danger">*</span></label>
                    <select name="years_experience" class="form-control">
                        <option value="1" {{ (old('years_experience',$info->years_experience) == 1) ? 'selected' : '' }}>{{ __('form.user.less_than_a_year') }}</option>
                        <option value="2" {{ (old('years_experience',$info->years_experience) == 2) ? 'selected' : '' }}>{{ __('form.user.a_year') }}</option>
                        <option value="3" {{ (old('years_experience',$info->years_experience) == 3) ? 'selected' : '' }}>{{ __('form.user.two_year') }}</option>
                        <option value="4" {{ (old('years_experience',$info->years_experience) == 4) ? 'selected' : '' }}>{{ __('form.user.over_two_years') }}</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>{{ __('form.user.marital_status') }}: <span class="text-danger">*</span></label>
                    <select name="years_experience" class="form-control">
                        <option value="1" {{ (old('marital_status',$info->marital_status) == 1) ? 'selected' : '' }}>{{ __('form.user.single') }}</option>
                        <option value="2" {{ (old('marital_status',$info->marital_status) == 2) ? 'selected' : '' }}>{{ __('form.user.married') }}</option>
                        <option value="3" {{ (old('marital_status',$info->marital_status) == 3) ? 'selected' : '' }}>{{ __('form.user.divorce') }}</option>
                    </select>
                </div>

                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>{{ __('form.user.height') }}: <span class="text-danger">*</span></label>
                        <select name="height" class="form-control">
                            @for ($i = 120;$i <= 190;$i++)
                            <option value="{{ $i }}" {{ (old('height',$info->height) == $i) ? 'selected' : '' }}>{{ $i }} cm</option>
                            @endfor
                        </select>
                    </div>

                    <div class="col-lg-6">
                        <label>{{ __('form.user.weight') }}: <span class="text-danger">*</span></label>
                        <select name="weight" class="form-control">
                            @for ($i = 40;$i <= 100;$i++)
                            <option value="{{ $i }}" {{ (old('weight',$info->weight) == $i) ? 'selected' : '' }}>{{ $i }} kg</option>
                            @endfor
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="d-block">{{ __('form.user.driver_license') }}</label>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input  type="radio" class="form-check-input" name="driver_license" value="1" {{ (old('driver_license',$info->driver_license) == 1) ? 'checked' : '' }}> {{ __('form.user.yes') }}
                        </label>
                    </div>

                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="driver_license" value="0" {{ (old('driver_license',$info->driver_license) == 0) ? 'checked' : '' }}> {{ __('form.user.no') }}                        
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>{{ __('form.user.company_did') }}: <span class="text-danger">*</span></label>
                    <input type="text" name="company_did" class="form-control" value="{{ old('company_did',$info->company_did) }}" />
                </div>

                <div class="form-group">
                    <label>{{ __('form.user.position_did') }}: <span class="text-danger">*</span></label>
                    <input type="text" name="position_did" class="form-control" value="{{ old('position_did',$info->position_did) }}" />
                </div>
            @endcard
        </div>
    </div>
</form>
@endsection

