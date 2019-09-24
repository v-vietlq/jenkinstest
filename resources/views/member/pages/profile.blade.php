@extends('member.master')
@section('title',trans('form.profile.personal'))
@section('content') 

<!-- Dashboard Inner Banner End -->
<!-- main content -->
<main id="jf-main" class="jf-main jf-haslayout">
    <!--Chart Statistics Start-->
    <div class="jf-dbsectionspace jf-haslayout">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-8">
                <div class="jf-dashboardbox jf-basicformholder">
                    <!-- <div class="jf-dashboardboxtitle">
                        <h2>Thông tin cơ bản</h2>
                        <span>Add Your Details</span>
                    </div> -->
                    <div class="jf-logindetails">
                        <div class="jf-titlelogin">
                            <h2>{{ trans('form.profile.personal_account') }}</h2>
                        </div>	
                        <form class="jf-formtheme jf-formlogin">
                            <fieldset>
                                <div class="row">
                                    <div class="col-sm-4"  style="margin-top: 80px;">
                                        <p>{{ trans('form.profile.avatar') }}: </p>
                                    </div>
                                    <div class="col-sm-6">
                                        <div style="width: 150px;height: 150px;margin: 20px auto;border-radius: 50%; overflow: hidden;position: relative;border: 1px solid red;cursor: pointer;" class="th-contentAvatar" id="th-ipAvatarHssv">
                                        <img src="{{ asset('member/images/user.png') }}">
                                        <input style="margin-top:60px" type="file" id="uploadAvatarHssv" class="tn_avatar" value="">
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4" style="margin-top: 20px;">
                                        <p>{{ trans('form.profile.fullname') }}: </p>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="form-group jf-inputwithicon">
                                        <i class="lnr lnr-users"></i>
                                            <input name="txtName" class="form-control" type="text" placeholder="{{ trans('form.profile.name_input') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4"  style="margin-top: 20px;">
                                        <p>{{ trans('form.profile.phone') }}: </p>
                                    </div>
                                    <div class="col-sm-8">
                                    
                                        <div class="form-group jf-inputwithicon">
                                        <i class="lnr lnr-phone"></i>
                                            <input  name="txtPhone" class="form-control" type="phone" placeholder="{{ trans('form.profile.phone_input') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4"  style="margin-top: 20px;">
                                        <p>{{ trans('form.profile.email') }}: </p>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="form-group jf-inputwithicon">
                                            <i class="lnr lnr-apartment"></i>
                                            <input name="txtAddress" class="form-control" type="email" placeholder="{{ trans('form.profile.email_input') }}">
                                        </div>
                                    </div>
                                </div>								

                                <div class="form-group jf-btnsarea">
                                    <button type="button" class="jf-btn jf-active btn-primary" id="showtoast">{{ trans('form.profile.btn') }}</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--Chart Statistics End-->
</main>
<!-- end main content -->
@endsection