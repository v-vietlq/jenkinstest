@extends('member.master')
@section('title',trans('form.hoso.title'))
@section('content') 

<!-- main content -->
<main id="jf-main" class="jf-main jf-haslayout">
    <!--Chart Statistics Start-->
    <div class="jf-dbsectionspace jf-haslayout">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-8">
                <div class="jf-dashboardbox jf-basicformholder">
                    <div class="jf-logindetails">
                        <div class="jf-titlelogin">
                            <h2>{{trans('form.hoso.title')}}</h2>
                        </div>	
                        <form class="jf-formtheme jf-formlogin">
                            <fieldset>
                            <div class="row">
                                <div class="col-sm-4" style="margin-top: 20px;">
                                    <p>{{trans('form.profile.fullname')}}: </p>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group jf-inputwithicon">
                                    <i class="lnr lnr-users"></i>
                                        <input name="txtName" class="form-control" type="text" placeholder="{{trans('form.home.input_fullname')}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4"  style="margin-top: 20px;">
                                    <p>{{trans('form.profile.phone')}}: </p>
                                </div>
                                <div class="col-sm-8">
                                
                                    <div class="form-group jf-inputwithicon">
                                    <i class="lnr lnr-phone"></i>
                                        <input  name="txtPhone" class="form-control" type="phone" placeholder="{{trans('form.profile.phone_input')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4"  style="margin-top: 20px;">
                                    <p>{{trans('form.profile.email')}}: </p>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group jf-inputwithicon">
                                        <i class="lnr lnr-envelope"></i>
                                        <input name="txtAddress" class="form-control" type="email" placeholder="{{trans('form.profile.email_input')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4"  style="margin-top: 20px;">
                                    <p>{{trans('form.profile.address')}}: </p>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group jf-inputwithicon">
                                        <i class="lnr lnr-map-marker"></i>
                                        <input name="txtAddress" class="form-control" type="address" placeholder="{{trans('form.profile.address_input')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3"  style="margin-top: 20px;">
                                    <p>{{trans('form.home.birthday')}}: </p>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group jf-inputwithicon">
                                        <span class="jf-select">
                                            <select>
                                                <option>{{trans('form.home.date')}}</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                                <option>6</option>
                                                <option>7</option>
                                                <option>8</option>
                                                <option>9</option>
                                                <option>10</option>
                                                <option>11</option>
                                                <option>12</option>
                                                <option>13</option>
                                                <option>14</option>
                                                <option>15</option>
                                                <option>16</option>
                                                <option>17</option>
                                                <option>18</option>
                                                <option>19</option>
                                                <option>20</option>
                                                <option>21</option>
                                                <option>22</option>
                                                <option>23</option>
                                                <option>24</option>
                                                <option>25</option>
                                                <option>26</option>
                                                <option>27</option>
                                                <option>28</option>
                                                <option>29</option>
                                                <option>30</option>
                                                <option>31</option>
                                            </select>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group jf-inputwithicon">
                                        <span class="jf-select">
                                            <select>
                                                <option>{{trans('form.home.month')}}</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                                <option>6</option>
                                                <option>7</option>
                                                <option>8</option>
                                                <option>9</option>
                                                <option>10</option>
                                                <option>11</option>
                                                <option>12</option>
                                            </select>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group jf-inputwithicon">
                                        <span class="jf-select">
                                            <select>
                                                <option>{{trans('form.home.year')}}</option>
                                                <option>1990</option>
                                                <option>1991</option>
                                                <option>1992</option>
                                                <option>1993</option>
                                                <option>1194</option>
                                            </select>
                                        </span>
                                    </div>
                                </div>
                                
                            </div>


                            <div class="row">
                                <div class="col-sm-4"  style="margin-top: 20px;">
                                    <p>{{trans('form.home.gender')}}: </p>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group jf-inputwithicon">
                                        <div class="form-group jf-inputwithicon" style="text-align: center;margin-top: 15px;">
                                            <label>
                                                <span>{{trans('form.home.male')}}  </span> <input style="width: 20px;height: 15px;" type="radio" checked="checked" name="radio"><span class="checkmark"></span>
                                                <span style="margin-left: 108px;">{{trans('form.home.female')}}  </span> <input style="width: 20px;height: 15px;" type="radio" name="radio"></input><span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4"  style="margin-top: 10px;">
                                    <p>{{trans('form.home.height')}}: </p>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group jf-inputwithicon">
                                        <i class="lnr lnr-pencil"></i>
                                        <input  name="txtPhone" class="form-control" type="phone" placeholder="{{trans('form.home.height_input')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4"  style="margin-top: 10px;">
                                    <p>{{trans('form.home.weight')}}: </p>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group jf-inputwithicon">
                                        <i class="lnr lnr-pencil"></i>
                                        <input  name="txtPhone" class="form-control" type="phone" placeholder="{{trans('form.home.weight_input')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4"  style="margin-top: 10px;">
                                        <p>{{trans('form.home.experience_job')}}: </p>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group jf-inputwithicon">
                                        <i class="lnr lnr-magnifier"></i>
                                        <span class="jf-select">
                                            <select>
                                                <option>{{trans('form.home.exp_input')}}</option>
                                                <option>{{trans('form.home.no_exp')}}</option>
                                                <option>{{trans('form.home.under_6')}}</option>
                                                <option>{{trans('form.home.6-12')}}</option>
                                                <option>{{trans('form.home.1-2')}}</option>
                                                <option>{{trans('form.home.over2')}}</option>
                                            </select>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4"  style="margin-top: 20px;">
                                    <p>{{trans('form.home.license')}}: </p>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group jf-inputwithicon">
                                        <div class="form-group jf-inputwithicon" style="text-align: center;margin-top: 15px;">
                                            <label>
                                                <span>{{trans('form.home.yes')}}  </span> <input style="width: 20px;height: 15px;" type="radio" checked="checked" name="radio1"><span class="checkmark"></span>
                                                <span style="margin-left: 108px;">{{trans('form.home.no')}}  </span> <input style="width: 20px;height: 15px;" type="radio" name="radio1"></input><span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4"  style="margin-top: 20px;">
                                    <p>{{trans('form.home.recent_company')}}: </p>
                                </div>
                                <div class="col-sm-8">
                                    
                                    <div class="form-group jf-inputwithicon">
                                    <i class="lnr lnr-apartment"></i>
                                        <input  name="txtPhone" class="form-control" type="phone" placeholder="{{trans('form.home.recent_company')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
									<div class="col-sm-4"  style="margin-top: 10px;">
											<p> {{trans('form.home.position_company')}}</p>
									</div>
									<div class="col-sm-8">
										<div class="form-group jf-inputwithicon">
                                        <i class="lnr lnr-location"></i>
											<input  name="txtPhone" class="form-control" type="phone" placeholder="{{trans('form.home.position_company')}}">
										</div>
									</div>
								</div>

                                <div class="row">
                                    <div class="col-sm-4"  style="margin-top: 20px;">
                                        <p>{{trans('form.home.cv')}}: </p>
                                    </div>
                                    <div class="col-sm-8">
                                    
                                        <div class="form-group jf-inputwithicon">
                                            <i class="lnr lnr-file-add"></i>
                                            <input  name="file" class="form-control" type="file" placeholder="Cân nặng">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group jf-btnsarea">
                                    <button type="button" class="jf-btn jf-active btn-primary" id="showtoast">{{trans('form.hoso.btn')}}</button>
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