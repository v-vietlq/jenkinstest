		<!-- đăng ký hồ sơ -->
		<div id="myModaldangky" class="modal fade" role="dialog">
			<div class="modal-dialog">
			<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<form class="jf-formtheme jf-formlogin">
							<!-- One "tab" đăng ký tài khoản -->
							<div class="tab"><center><h2>{{ trans('form.home.title_register_form') }}</h2></center>
								<fieldset>
									<div class="row">
										<div class="col-sm-4" style="margin-top: 20px;">
											<p>{{ trans('form.home.fullname') }}: </p>
										</div>
										<div class="col-sm-8">
											<div class="form-group jf-inputwithicon">
											<i class="lnr lnr-users"></i>
												<input name="txtName" class="form-control" type="text" placeholder="{{ trans('form.home.input_fullname') }}">
											</div>
										</div>
									</div>
									<div class="row">
											<div class="col-sm-4"  style="margin-top: 20px;">
												<p>{{ trans('form.home.phone') }}: </p>
											</div>
											<div class="col-sm-8">
												<div class="form-group jf-inputwithicon">
													<i class="lnr lnr-phone"></i>
													<input style="padding: 10px 20px 10px 44px;"  name="txtPhone" class="form-control" type="phone" placeholder="{{ trans('form.home.input_phone') }}">
												</div>
											</div>
									</div>

									<div class="row">
											<div class="col-sm-4"  style="margin-top: 20px;">
													<p>{{ trans('form.home.email') }}: </p>
											</div>
											<div class="col-sm-8">
													<div class="form-group jf-inputwithicon">
															<i class="lnr lnr-envelope"></i>
															<input name="txtAddress" class="form-control" type="email" placeholder="{{ trans('form.home.input_email') }}">
													</div>
											</div>
									</div>
									<div class="row">
										<div class="col-sm-4"  style="margin-top: 20px;">
												<p>{{ trans('form.home.pass') }}</p>
										</div>
										<div class="col-sm-8">
											<div class="form-group jf-inputwithicon">
												<i class="lnr lnr-lock"></i>
												<input type="password" name="password" class="form-control" placeholder="{{ trans('form.home.register_pass') }}">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-4"  style="margin-top: 20px;">
												<p> {{trans('form.home.confirm_pass')}}:</p>
										</div>
										<div class="col-sm-8">
											<div class="form-group jf-inputwithicon">
												<i class="lnr lnr-lock"></i>
												<input type="password" name="retype password" class="form-control" placeholder="{{ trans('form.home.confirm_pass') }}">
											</div>
										</div>
									</div>
								</fieldset>
							</div>
							<!-- two "tab" đăng ký hồ sơ -->
							<div class="tab"><center><h2>{{ trans('form.home.fill_profile') }}:</h2></center>
								<div class="row">
									<div class="col-sm-3"  style="margin-top: 10px;">
										<p>{{ trans('form.home.birthday') }}: </p>
									</div>
									<div class="col-sm-3">
										<div class="form-group jf-inputwithicon">
											<span class="jf-select">
												<select style="padding: 10px 20px 10px 23px;">
													<option>{{ trans('form.home.date') }}</option>
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
												<select  style="padding: 10px 20px 10px 23px;">
													<option>{{ trans('form.home.month') }}</option>
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
												<select  style="padding: 10px 20px 10px 23px;">
													<option>{{ trans('form.home.year') }}</option>
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
									<div class="col-sm-4"  style="margin-top: 10px;">
										<p>{{ trans('form.home.gender') }}: </p>
									</div>
									<div class="col-sm-8">
										<div class="form-group jf-inputwithicon">
											<div class="form-group jf-inputwithicon" style="text-align: center;margin-top: 15px;">
												<label>
													<span>{{ trans('form.home.male') }}  </span> <input style="width: 20px;height: 14px;" type="radio" checked="checked" name="radio"><span class="checkmark"></span>
													<span style="margin-left: 108px;">{{ trans('form.home.female') }}  </span> <input style="width: 20px;height: 14px;" type="radio" name="radio"></input><span class="checkmark"></span>
												</label>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-4"  style="margin-top: 10px;">
										<p>{{ trans('form.home.height') }}: </p>
									</div>
									<div class="col-sm-8">
										<div class="form-group jf-inputwithicon">
											<input  name="txtPhone" class="form-control" type="phone" placeholder="{{ trans('form.home.height_input') }}">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-4"  style="margin-top: 10px;">
										<p>{{ trans('form.home.weight') }}: </p>
									</div>
									<div class="col-sm-8">
										<div class="form-group jf-inputwithicon">
											<input  name="txtPhone" class="form-control" type="phone" placeholder="{{ trans('form.home.weight_input') }}">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-4"  style="margin-top: 10px;">
											<p>{{ trans('form.home.experience_job') }}: </p>
									</div>
									<div class="col-sm-8">
										<div class="form-group jf-inputwithicon">
											<i class="lnr lnr-magnifier"></i>
											<span class="jf-select">
												<select>
													<option>{{ trans('form.home.exp_input') }}</option>
													<option>{{ trans('form.home.no_exp') }}</option>
													<option>{{ trans('form.home.under_6') }}</option>
													<option>{{ trans('form.home.6-12') }}</option>
													<option>{{ trans('form.home.1-2') }}</option>
													<option>{{ trans('form.home.over2') }}</option>
												</select>
											</span>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-4"  style="margin-top: 10px;">
											<p>{{ trans('form.home.license') }}: </p>
									</div>
									<div class="col-sm-8">
										<div class="form-group jf-inputwithicon">
											<div class="form-group jf-inputwithicon" style="text-align: center;margin-top: 15px;">
												<label>
														<span>{{ trans('form.home.yes') }}  </span> <input style="width: 20px;height: 14px;" type="radio" checked="checked" name="radio1"><span class="checkmark"></span>
														<span style="margin-left: 108px;">{{ trans('form.home.no') }}  </span> <input style="width: 20px;height: 14px;" type="radio" name="radio1"></input><span class="checkmark"></span>
												</label>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-4"  style="margin-top: 10px;">
											<p>{{ trans('form.home.recent_company') }}: </p>
									</div>
									<div class="col-sm-8">
										<div class="form-group jf-inputwithicon">
											<input  name="txtPhone" class="form-control" type="phone" placeholder="{{ trans('form.home.recent_company') }}">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-4"  style="margin-top: 10px;">
											<p>{{ trans('form.home.position_company') }} </p>
									</div>
									<div class="col-sm-8">
										<div class="form-group jf-inputwithicon">
											<input  name="txtPhone" class="form-control" type="phone" placeholder="{{ trans('form.home.position_company') }}">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-4"  style="margin-top: 10px;">
											<p>{{ trans('form.home.cv') }}: </p>
									</div>
									<div class="col-sm-8">
										<div class="form-group jf-inputwithicon">
												<input  name="file" class="form-control" type="file" placeholder="Cân nặng">
										</div>
									</div>
								</div>
							</div>
							<center><div class="tab"><h2>{{ trans('form.home.finish') }}</h2></div></center>
							<center>
							<div>
								<button class="jf-btn jf-active" type="button" id="prevBtn" onclick="nextPrev(-1)">{{ trans('form.home.back') }}</button>
								<button class="jf-btn jf-active" type="button" id="nextBtn" onclick="nextPrev(1)">{{ trans('form.job_detail.next') }}</button>
							</div>
							</center>
							</div>
							<!-- Circles which indicates the steps of the form: -->
							<div style="text-align:center;margin-top:40px;display: none">
							<span class="step"></span>
							<span class="step"></span>
							</div>
						</form>
					</div>
					<center>
					</center>
				</div>
			</div>
		</div>
		<!-- hết form popup -->