		<!-- form reset -->
		<div id="myModalreset" class="modal fade" role="dialog">
			<div class="modal-dialog">
			<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">{{ trans('form.home.forgot_pass') }}</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<form class="jf-formtheme jf-formlogin">
							<fieldset>
								<div class="row">
									<div class="col-sm-4"  style="margin-top: 20px;">
										<p>{{ trans('form.home.email') }}: </p>
									</div>
									<div class="col-sm-8">
										<div class="form-group jf-inputwithicon">
											<i class="lnr lnr-apartment"></i>
											<input name="txtAddress" class="form-control" type="email" placeholder="{{ trans('form.home.input_email') }}">
										</div>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
					<center>
					<div class="modal-footer">
					<!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
						<div class="form-group jf-btnsarea">
							<button type="button" class="jf-btn jf-active btn-primary" id="showtoast">{{ trans('form.home.reset_pass') }}</button>
						</div>
					</div>
					</center>
				</div>
			</div>
		</div>	