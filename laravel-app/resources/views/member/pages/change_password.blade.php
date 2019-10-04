@extends('member.master')
@section('title',trans('form.changepass.title'))
@section('content')
        <!--************************************
				Dashboard Inner Banner Start
		*************************************-->
		<div id="jf-dashboardbanner" class="jf-dashboardbanner">
			<h1>{{trans('form.changepass.title')}}</h1>

		</div>
		<!--************************************
				Dashboard Inner Banner End
				*************************************-->
		<!--************************************
					Main Start
		*************************************-->
		<main id="jf-main" class="jf-main jf-haslayout">
			<!--************************************
					Chart Statistics Start
			*************************************-->
			<div class="jf-dbsectionspace jf-haslayout">
				<div class="row">
					<div class="col-12 col-sm-12 col-md-6 col-lg-6">
						<div class="jf-dashboardbox">
							<!-- <div class="jf-dashboardboxtitle">
								<div class="jf-questionsearch">
									<h2> Change Password</h2>
									<span>Make Your Account Secure</span>										
								</div>
							</div> -->
							<div class="jf-securecontent">
								<form class="jf-formtheme jf-paswordreset">
									<fieldset>
										<div class="form-group jf-inputwithicon">
											<i class="lnr lnr-lock"></i>
											<input type="password" name="company" class="form-control" placeholder="{{trans('form.changepass.pass_current')}} *">
										</div>
										<div class="form-group jf-inputwithicon">
											<i class="lnr lnr-lock"></i>
											<input type="password" name="location" class="form-control" placeholder="{{trans('form.changepass.pass_new')}} *">
										</div>
										<div class="form-group jf-inputwithicon">
											<i class="lnr lnr-lock"></i>
											<input type="password" name="location" class="form-control" placeholder="{{trans('form.changepass.confirm_pass')}} *">
										</div>
										<!-- <div class="form-group jf-signedcheck">
											<span class="jf-checkbox">
												<input type="checkbox" id="jf-signed" name="signed" value="">
												<label for="jf-signed">
													<span>Log out from all other devices</span>
												</label>
											</span>
										</div> -->
										<div class="jf-btnarea">
											<a class="jf-btn" href="javascript:void(0);">{{trans('form.changepass.btn')}}</a>
										</div>
									</fieldset>
								</form>
							</div>
						</div>
					</div>
					<!-- <div class="col-12 col-sm-12 col-md-6 col-lg-6">
						<div class="jf-dashboardbox">
							<div class="jf-dashboardboxtitle">
								<div class="jf-questionsearch">
									<h2> Deactivate Account</h2>
									<span>Deactivate Account Permanently</span>										
								</div>
							</div>
							<div class="jf-securecontent">
								<form class="jf-formtheme jf-deactiveac">
									<fieldset>
										<div class="form-group jf-inputwithicon">
											<i class="lnr lnr-bubble"></i>
											<span class="jf-select">
												<select data-placeholder="All" name="locations">
													<option value="">Reason of Leaving *</option>
													<option value="aberdeen">Aberdeen</option>
													<option value="aldershot">Aldershot</option>
													<option value="altrincham">Altrincham</option>
												</select>
											</span>
										</div>
										<div class="form-group jf-halfformgroup jf-inputwithicon">
											<i class="lnr lnr-lock"></i>
											<input type="password" name="location" class="form-control" placeholder="New Password *">
										</div>
										<div class="form-group jf-halfformgroup jf-inputwithicon">
											<i class="lnr lnr-lock"></i>
											<input type="password" name="location" class="form-control" placeholder="Retpye Password *">
										</div>
										<div class="form-group jf-inputwithicon jf-textarea">
											<i class="lnr lnr-lock"></i>
											<textarea placeholder="Description"></textarea>
										</div>
										<div class="form-group jf-btnarea jf-btnred">
											<a class="jf-btn" href="javascript:void(0);">Deactivate</a>
										</div>
									</fieldset>
								</form>
							</div>
						</div>
					</div>							 -->
				</div>
			</div>
			<!--************************************
					Chart Statistics End
			*************************************-->
		</main>
		<!--************************************
					Main End
        *************************************-->
@endsection