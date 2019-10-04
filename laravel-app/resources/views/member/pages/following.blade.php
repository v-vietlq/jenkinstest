@extends('member.master')
@section('title',trans('form.follow.title'))
@section('content')

		<div class="jf-dashboardboxtitle jf-dashboardboxtitlevtwo">
			<div class="jf-title" style="margin-top: 10px;">
				<h2>{{ trans('form.follow.title') }}</h2>
			</div>
			<form class="jf-formtheme jf-questsearch">
				<fieldset>
					<div class="form-group jf-inputwithicon">
						<i class="lnr lnr-magnifier"></i>
						<input type="text" name="jobtitle" class="form-control" placeholder="{{ trans('form.apply.search') }}">
					</div>
					<a class="jf-btnsearch" href="javascript:void(0)"><i class="lnr lnr-magnifier"></i></a>
				</fieldset>
			</form>
		</div>
		<!--Main Start-->
		<main id="jf-main" class="jf-main jf-haslayout">
			<div class="jf-haslayout">
				<div class="container">
					<div class="row">
						<div id="jf-threecolumns" class="jf-threecolumns">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
								<div class="jf-candidatessearchsvtwo">
									<div class="jf-candidatessearcgrid jf-verticaltop">
										<div class="jf-candidatessearch">
											<figure class="jf-candidatescover">
											<div class="wrapper">
												<div class="ribbon-wrapper-delete">
													<a href="#" style="color:white"><i class="lnr lnr-trash"></i></a>
												</div>
											</div>
											<span class="jf-posttag"><i class="fas fa-ellipsis-v"></i></span>
												<img src="{{ asset('member/images/successstory/cover/img-01.jpg')}}" alt="img-description">	
											</figure>
											<figure>
												<img src="{{ asset('member/images/successstory/grid/img-01.jpg')}}" alt="image description">
											</figure>
											<div class="jf-employerdetails">
												<h3 style="text-align: center;"> <a href="#">CTY TNHH TMDV NHÀ LỘC PHÁT</a></h3>
												<h3 style="text-align: center;"><a style="margin-top: 10px;line-height: 31px;color: white" class="jf-btnjobtag jf-fulltimejob" >Hot</a><a style="padding: 2px 13px;font-size: 13px;line-height: 22px;float: right;margin-top: 10px;background-color: #ccc9c1;color: black;" href="javascript:void(0);" class="jf-btnjobtag jf-fulltimejob jf-btnlike jf-btnliked "><i class="fa fa-heart-o"></i> quan tâm</a></h3>
												<!-- <h3 style="text-align: center;"><a style="padding: 2px 13px;font-size: 13px;line-height: 22px;float: right;margin-top: 10px;background: #ccc9c1;color: white;" href="javascript:void(0);" class="jf-btnjobtag jf-fulltimejob jf-btnlike jf-btnliked"><i class="fa fa-heart-o"></i> quan tâm</a></h3> -->

												<h4><span>{{trans('form.apply.name_title')}}: Nhân viên kinh doanh</span><span style="float: right; margin-top: -20px;"><i class="lnr lnr-eye"></i>1 {{trans('form.apply.view')}}</span></span>
												<h4>
													<span><i class="lnr lnr-diamond"></i>{{trans('form.apply.salary')}}: 8 triệu/1 tháng</span>
													<span><i class="lnr lnr-briefcase"></i>{{trans('form.apply.exp')}}: trên 1 năm</span>
													<span><i class="lnr lnr-map-marker"></i>200/20D Ấp chánh 1, Tân xuân, Hóc môn</span>
													<span><i class="lnr lnr-tag"></i><a href="javascript:void(0);">{{trans('form.apply.career')}}: kế toán</a></span>
												</h4>
											</div>
											<center><a href="javascript:void(0);" class="jf-btn jf-active">{{trans('form.job_detail.apply_now')}}</a></center><br />
										</div>
									</div>
									{{-- <div class="jf-candidatessearcgrid jf-verticaltop">
										<div class="jf-candidatessearch">
											<figure class="jf-candidatescover">
											<div class="wrapper">
												<div class="ribbon-wrapper-delete">
													<a href="#" style="color:white"><i class="lnr lnr-trash"></i></a>
												</div>
											</div>
												<img src="{{ asset('member/images/successstory/cover/img-01.jpg')}}" alt="img-description">	
											</figure>
											<figure>
												<img src="{{ asset('member/images/successstory/grid/img-01.jpg')}}" alt="image description">
											</figure>
											<div class="jf-employerdetails">
												<h3 style="text-align: center;"> <a href="#">CTY TNHH TMDV NHÀ LỘC PHÁT</a></h3>
												<h3 style="text-align: center;"><a style="margin-top: 10px;line-height: 31px;color: white" class="jf-btnjobtag jf-parttimejob" >Mới</a><a style="padding: 2px 13px;font-size: 13px;line-height: 22px;float: right;margin-top: 10px;background-color: #ccc9c1;color: black;" href="javascript:void(0);" class="jf-btnjobtag jf-fulltimejob jf-btnlike jf-btnliked"><i class="fa fa-heart-o"></i> quan tâm</a></h3>
												<!-- <h3 style="text-align: center;"><a style="padding: 2px 13px;font-size: 13px;line-height: 22px;float: right;margin-top: 10px;background: #ccc9c1;color: white;" href="javascript:void(0);" class="jf-btnjobtag jf-fulltimejob jf-btnlike jf-btnliked"><i class="fa fa-heart-o"></i> quan tâm</a></h3> -->

												<h4><span>Tên tiêu đề: Nhân viên kinh doanh</span><span style="float: right; margin-top: -20px;"><i class="lnr lnr-eye"></i>1 lượt xem</span></span>
												<h4>
													<span><i class="lnr lnr-diamond"></i>Mức lương: 8 triệu/1 tháng</span>
													<span><i class="lnr lnr-briefcase"></i>Kinh nghiệm: trên 1 năm</span>
													<span><i class="lnr lnr-map-marker"></i>200/20D Ấp chánh 1, Tân xuân, Hóc môn</span>
													<span><i class="lnr lnr-tag"></i><a href="javascript:void(0);">nghành: kế toán</a></span>
												</h4>
											</div>
											<center><a href="javascript:void(0);" class="jf-btn jf-active">Nộp đơn ngay</a></center><br />
										</div>
									</div>
									<div class="jf-candidatessearcgrid jf-verticaltop">
										<div class="jf-candidatessearch">
											<figure class="jf-candidatescover">
											<div class="wrapper">
												<div class="ribbon-wrapper-delete">
													<a href="#" style="color:white"><i class="lnr lnr-trash"></i></a>
												</div>
											</div>
												<img src="{{ asset('member/images/successstory/cover/img-01.jpg')}}" alt="img-description">	
											</figure>
											<figure>
												<img src="{{ asset('member/images/successstory/grid/img-01.jpg')}}" alt="image description">
											</figure>
											<div class="jf-employerdetails">


												<h3 style="text-align: center;"> <a href="#">CTY TNHH TMDV NHÀ LỘC PHÁT</a></h3>
												<h3 style="text-align: center;"><a style="margin-top: 10px;line-height: 31px;color: white" class="jf-btnjobtag jf-homebasejob" >Gấp</a><a style="padding: 2px 13px;font-size: 13px;line-height: 22px;float: right;margin-top: 10px;background-color: #ccc9c1;color: black;" href="javascript:void(0);" class="jf-btnjobtag jf-fulltimejob jf-btnlike jf-btnliked "><i class="fa fa-heart-o"></i> quan tâm</a></h3>
												<!-- <h3 style="text-align: center;"><a style="padding: 2px 13px;font-size: 13px;line-height: 22px;float: right;margin-top: 10px;background: #ccc9c1;color: white;" href="javascript:void(0);" class="jf-btnjobtag jf-fulltimejob jf-btnlike jf-btnliked"><i class="fa fa-heart-o"></i> quan tâm</a></h3> -->

												<h4><span>Tên tiêu đề: Nhân viên kinh doanh</span><span style="float: right; margin-top: -20px;"><i class="lnr lnr-eye"></i>1 lượt xem</span></span>
												<h4>
													<span><i class="lnr lnr-diamond"></i>Mức lương: 8 triệu/1 tháng</span>
													<span><i class="lnr lnr-briefcase"></i>Kinh nghiệm: trên 1 năm</span>
													<span><i class="lnr lnr-map-marker"></i>200/20D Ấp chánh 1, Tân xuân, Hóc môn</span>
													<span><i class="lnr lnr-tag"></i><a href="javascript:void(0);">nghành: kế toán</a></span>
												</h4>
											</div>
											<center><a href="javascript:void(0);" class="jf-btn jf-active">Nộp đơn ngay</a></center><br />
										</div>
									</div> --}}
								</div>
								<center>
								<nav class="jf-pagination" style="margin-top: 23px;">
									<ul>
										<li class="jf-prevpage"><a href="#"><i class="fa fa-angle-left"></i> Previous</a></li>
										<li class="jf-active"><a href="#">01</a></li>
										<li><a href="#">02</a></li>
										<li><a href="#">03</a></li>
										<li><a href="#">04</a></li>
										<li><a href="#">05</a></li>
										<li><a href="#"></a></li>
										<li class="jf-nextpage"><a href="#">Next <i class="fa fa-angle-right"></i></a></li>
									</ul>
								</nav>
								</center>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
		<!--************************************
				Main End
		*************************************-->
@endsection