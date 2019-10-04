@extends('member.master')
@section('title',trans('form.apply.title'))
@section('content')

		<!--************************************
				Dashboard Inner Banner Start
		*************************************-->
		<!-- <div id="jf-dashboardbanner" class="jf-dashboardbanner">
			<h1>Việc làm đã ứng tuyển</h1>
		</div> -->
		<!--************************************
				Dashboard Inner Banner End
		*************************************-->
		<div class="jf-dashboardboxtitle jf-dashboardboxtitlevtwo">
			<div class="jf-title" style="margin-top: 10px;">
				<h2>{{trans('form.apply.applied')}}</h2>
			</div>
			<form class="jf-formtheme jf-questsearch">
				<fieldset>
					<div class="form-group jf-inputwithicon">
						<i class="lnr lnr-magnifier"></i>
						<input type="text" name="jobtitle" class="form-control" placeholder="{{trans('form.apply.search')}}">
					</div>
					<a class="jf-btnsearch" href="javascript:void(0)"><i class="lnr lnr-magnifier"></i></a>
				</fieldset>
			</form>
		</div>
		<!--************************************
				Main Start
		*************************************-->
		<main id="jf-main" class="jf-main jf-haslayout">
			<!--************************************
					Jobs Alerts Start
			*************************************-->
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
												<div class="ribbon-wrapper-green">
													<div class="ribbon-green">{{trans('form.apply.applied_btn')}}</div>
												</div>
											</div>
												<img src="{{ asset('member/images/successstory/cover/img-01.jpg')}}" alt="img-description">	
											</figure>
											<figure>
												<img src="{{ asset('member/images/successstory/grid/img-01.jpg')}}" alt="image description">
											</figure>
											<div class="jf-employerdetails">
												<h3 style="text-align: center;"> <a href="#">CTY TNHH TMDV NHÀ LỘC PHÁT</a></h3>
												<h3 style="text-align: center;"><a style="margin-top: 10px;line-height: 31px;color: white;float: none;" class="jf-btnjobtag jf-fulltimejob" >Hot</a></h3>
												<h4><span>{{trans('form.apply.name_title')}}: Nhân viên kinh doanh</span></h4>
												<h4>
													<span><i class="lnr lnr-eye"></i>1 {{trans('form.apply.view')}}</span>
													<span><i class="lnr lnr-diamond"></i>{{trans('form.apply.salary')}}: 8 triệu/1 tháng</span>
													<span><i class="lnr lnr-briefcase"></i>{{trans('form.apply.exp')}}: trên 1 năm</span>
													<span><i class="lnr lnr-map-marker"></i>200/20D Ấp chánh 1, Tân xuân, Hóc môn</span>
													<span><i class="lnr lnr-tag"></i><a href="javascript:void(0);">{{trans('form.apply.career')}}: kế toán</a></span>
												</h4>
											</div>
											<!-- <center><a style="background: blanchedalmond;" class="jf-btn jf-active">Đã nộp đơn</a></center> -->
										</div>
									</div>
									
								{{-- 	<div class="jf-candidatessearcgrid jf-verticaltop">
										<div class="jf-candidatessearch">
											<figure class="jf-candidatescover">
											<div class="wrapper">
												<div class="ribbon-wrapper-green">
													<div class="ribbon-green">Đã nộp</div>
												</div>
											</div>
												<img src="{{ asset('member/images/successstory/cover/img-01.jpg')}}" alt="img-description">	
											</figure>
											<figure>
												<img src="{{ asset('member/images/successstory/grid/img-01.jpg')}}" alt="image description">
											</figure>
											<div class="jf-employerdetails">
												<h3 style="text-align: center;"> <a href="#">CTY TNHH TMDV NHÀ LỘC PHÁT</a></h3>
												<h3 style="text-align: center;"><a style="margin-top: 10px;line-height: 31px;color: white;float: none;" class="jf-btnjobtag jf-parttimejob" >Mới</a></h3>
												<h4>
													<span>Tên tiêu đề: Nhân viên kinh doanh</span>
													<span><i class="lnr lnr-eye"></i>1 lượt xem</span>
													<span><i class="lnr lnr-diamond"></i>Mức lương: 8 triệu/1 tháng</span>
													<span><i class="lnr lnr-briefcase"></i>Kinh nghiệm: trên 1 năm</span>
													<span><i class="lnr lnr-map-marker"></i>200/20D Ấp chánh 1, Tân xuân, Hóc môn</span>
													<span><i class="lnr lnr-tag"></i><a href="javascript:void(0);">nghành: kế toán</a></span>
												</h4>
											</div>
										</div>
									</div>
									<div class="jf-candidatessearcgrid jf-verticaltop">
										<div class="jf-candidatessearch">
											<figure class="jf-candidatescover">
											<div class="wrapper">
												<div class="ribbon-wrapper-green">
													<div class="ribbon-green">Đã nộp</div>
												</div>
											</div>
												<img src="{{ asset('member/images/successstory/cover/img-01.jpg')}}" alt="img-description">	
											</figure>
											<figure>
												<img src="{{ asset('member/images/successstory/grid/img-01.jpg')}}" alt="image description">
											</figure>
											<div class="jf-employerdetails">
												<h3 style="text-align: center;"> <a href="#">CTY TNHH TMDV NHÀ LỘC PHÁT</a></h3>
												<h3 style="text-align: center;"><a style="margin-top: 10px;line-height: 31px;color: white;float: none;" class="jf-btnjobtag jf-homebasejob" >Gấp</a></h3>
												<h4>
													<span>Tên tiêu đề: Nhân viên kinh doanh</span>
													<span><i class="lnr lnr-eye"></i>1 lượt xem</span>
													<span><i class="lnr lnr-diamond"></i>Mức lương: 8 triệu/1 tháng</span>
													<span><i class="lnr lnr-briefcase"></i>Kinh nghiệm: trên 1 năm</span>
													<span><i class="lnr lnr-map-marker"></i>200/20D Ấp chánh 1, Tân xuân, Hóc môn</span>
													<span><i class="lnr lnr-tag"></i><a href="javascript:void(0);">nghành: kế toán</a></span>
												</h4>
											</div>
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
			<!--************************************
					Jobs Alerts Start End
			*************************************-->
		</main>
		<!--************************************
				Main End
		*************************************-->
@endsection