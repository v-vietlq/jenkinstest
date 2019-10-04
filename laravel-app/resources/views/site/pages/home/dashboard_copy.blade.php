@extends('frontend.master')
@section('title','Dashboard')
@section('content') 

<style>
.jf-searchoptions .form-group .jf-radio.jf-all label{
    background:black;
}
</style>
<div id="demo" class="carousel slide" data-ride="carousel">

<!-- Indicators -->
<ul class="carousel-indicators">
<li data-target="#demo" data-slide-to="0" class="active"></li>
<li data-target="#demo" data-slide-to="1"></li>
<li data-target="#demo" data-slide-to="2"></li>
</ul>

<!-- The slideshow -->
<div class="carousel-inner">
<div class="carousel-item active">
    <img style="width:100%" src="https://viettelidc.com.vn/Content/Media/Uploads/Images/fd1638cb74fb4b23afdb29c1c4f53aae.png" alt="Los Angeles">
</div>
<div class="carousel-item">
    <img style="width:100%" src="https://viettelidc.com.vn/Content/Media/Uploads/Images/fd1638cb74fb4b23afdb29c1c4f53aae.png" alt="Chicago">
</div>
<div class="carousel-item">
    <img style="width:100%" src="https://viettelidc.com.vn/Content/Media/Uploads/Images/fd1638cb74fb4b23afdb29c1c4f53aae.png" alt="New York">
</div>
</div>

<!-- Left and right controls -->
<a class="carousel-control-prev" href="#demo" data-slide="prev">
<span class="carousel-control-prev-icon"></span>
</a>
<a class="carousel-control-next" href="#demo" data-slide="next">
<span class="carousel-control-next-icon"></span>
</a>

</div>
<!-- Home Slider Start-->
<main id="jf-main" class="jf-main jf-haslayout" style="background:beige">
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-10 push-lg-1">
            <div class="jf-slidercontent">
                <h2>Vui lòng chọn công việc bạn cần tìm</h2>

                <form class="jf-formtheme jf-formbannersearch">
                    <fieldset class="jf-searchoptions">
                        <div class="form-group" style="width:100%">
                            <div class="jf-radio" data-class="js-all"  style="background:black">
                                <input  style="background:black" type="radio" name="searchoptions" id="jf-all" checked>
                                <label for="jf-all">Tất cả</label>
                            </div>
                            <div class="jf-radio jf-findjobs jf-search-type" data-class="js-job">
                                <input type="radio" name="searchoptions" id="jf-findjobs">
                                <label for="jf-findjobs">Thời vụ</label>
                            </div>
                            <div class="jf-radio jf-employers jf-search-type" data-class="js-employer">
                                <input type="radio" name="searchoptions" id="jf-employers">
                                <label for="jf-employers">Bán thời gian</label>
                            </div>
                            <div class="jf-radio jf-candidates jf-search-type" data-class="js-candidate">
                                <input type="radio" name="searchoptions" id="jf-candidates">
                                <label for="jf-candidates">Toàn thời gian</label>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="jf-searcharea">
                        <div class="jf-searchholder">
                            <!-- <label><em class="lnr lnr-apartment"></em><span>Công việc cần tìm</span></label> -->
                            <div class="form-group jf-inputwithicon">
                                <input type="search" name="search" class="form-control" placeholder="Nhập công việc cần tìm">
                            </div>
                        </div>
                        <div class="jf-searchholder">
                            <!-- <label><em class="lnr lnr-apartment"></em><span>Job Title, Skills or Company</span></label> -->
                            <span class="jf-select">
                                <select data-placeholder="All" class="chosen-select locations" name="locations">
                                    <option value="">Địa điểm</option>
                                    <option value="aberdeen">Quận 1</option>
                                    <option value="aldershot">Quận 2</option>
                                    <option value="altrincham">Quận 3</option>
                                    <option value="aylesbury">Quận 4</option>
                                </select>
                            </span>
                        </div>
                        <div class="jf-searchbtn">
                            <a href="javascript:void(0)" class="jf-btn"><i class="lnr lnr-magnifier"></i></a>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
</main>
<!-- <div class="jf-sliderholder">
    <div class="jf-slidercontentholder">

    </div>
    <div id="jf-homeslidervone" class="jf-homeslidervone jf-homesliderone owl-carousel">
        <figure class="jf-sliderimg item">
            <img src="http://vieclamtaitphcm.com/publicimages/photos/BANNER.png" alt="image description">
        </figure>
        <figure class="jf-sliderimg item">
            <img src="https://thangmaygiadinh.pro.vn//public/uploads/f8e9f3a5b8aff373c7406805beaf1795/files/banner.jpg" alt="image description">
        </figure>
        <figure class="jf-sliderimg item">
            <img src="https://viettelidc.com.vn/Content/Media/Uploads/Images/fd1638cb74fb4b23afdb29c1c4f53aae.png" alt="image description">
        </figure>
        <figure class="jf-sliderimg item">
            <img src="https://viettelidc.com.vn/Content/Media/Uploads/Images/fd1638cb74fb4b23afdb29c1c4f53aae.png" alt="image description">
        </figure>
        <figure class="jf-sliderimg item">
            <img src="https://viettelidc.com.vn/Content/Media/Uploads/Images/fd1638cb74fb4b23afdb29c1c4f53aae.png" alt="image description">
        </figure>
    </div>
</div> -->
<!--Home Slider End-->
<!--Main Start-->
<main id="jf-main" class="jf-main jf-haslayout">
    <!--Công việc mới đăng-->
    <div class="jf-sectionspace jf-haslayout">
        <!--************************************
                Blog Grid Start
        *************************************-->
        <div class="jf-haslayout">
            <div class="container">
                <div class="row">
                    <div id="jf-threecolumns" class="jf-threecolumns">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <!-- <div class="jf-adds jf-addsvtwo">
                                <a href="javascript:void(0);" title="">
                                    <figure>	
                                        <img src="{{ asset('frontend/images/adds-03.jpg')}}" alt="img description">
                                    </figure>
                                </a>
                                <span>Advertisement  540px X 80px</span>
                            </div> -->
                            
                            <div class="jf-sortandview">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="jf-sectionhead">
                                        <h2 style="margin-top: 10px;">Công việc mới đăng</h2>
                                        <a style="margin-top: 10px;" class="jf-btnviewall" href="#">Xem thêm</a>
                                    </div>
                                </div>
                            </div>
                            <div class="jf-candidatessearchsvtwo">
                                <div class="jf-candidatessearcgrid jf-verticaltop">
                                    <div class="jf-candidatessearch">
                                        <figure class="jf-candidatescover">
                                            <img src="{{ asset('frontend/images/successstory/cover/img-01.jpg')}}" alt="img-description">	
                                        </figure>
                                        <figure>
                                            <img src="{{ asset('frontend/images/successstory/grid/img-01.jpg')}}" alt="image description">
                                        </figure>
                                        <div class="jf-employerdetails">
                                            <h3 style="text-align: center;"> <a href="#">CTY TNHH TMDV NHÀ LỘC PHÁT</a></h3>
                                            <h3 style="text-align: center;"><a style="margin-top: 10px;line-height: 31px;color: white" class="jf-btnjobtag jf-fulltimejob" >Hot</a><a style="padding: 2px 13px;font-size: 13px;line-height: 22px;float: right;margin-top: 10px;background-color: #ccc9c1;color: black;" href="javascript:void(0);" class="jf-btnjobtag jf-fulltimejob jf-btnlike "><i class="fa fa-heart-o"></i> quan tâm</a></h3>

                                            <h4><span>Tên tiêu đề: Nhân viên kinh doanh</span><span style="float: right; margin-top: -20px;"><i class="lnr lnr-eye"></i>1 lượt xem</span></span>
                                            <h4>
                                                <span><i class="lnr lnr-diamond"></i>Mức lương: 8 triệu/1 tháng</span>
                                                <span><i class="lnr lnr-briefcase"></i>Kinh nghiệm: trên 1 năm</span>
                                                <span><i class="lnr lnr-map-marker"></i>200/20D Ấp chánh 1, Tân xuân, Hóc môn</span>
                                                <span><i class="lnr lnr-tag"></i><a href="javascript:void(0);">nghành: kế toán</a></span>
                                            </h4>
                                        </div>
                                        <center><a href="javascript:void(0);" class="jf-btn jf-active">Nộp đơn ngay</a></center>
                                    </div>
                                </div>
                                <div class="jf-candidatessearcgrid jf-verticaltop">
                                    <div class="jf-candidatessearch">
                                        <figure class="jf-candidatescover">
                                            <img src="{{ asset('frontend/images/successstory/cover/img-01.jpg')}}" alt="img-description">	
                                        </figure>
                                        <figure>
                                            <img src="{{ asset('frontend/images/successstory/grid/img-01.jpg')}}" alt="image description">
                                        </figure>
                                        <div class="jf-employerdetails">
                                            <h3 style="text-align: center;"> <a href="#">CTY TNHH TMDV NHÀ LỘC PHÁT</a></h3>
                                            <h3 style="text-align: center;"><a style="margin-top: 10px;line-height: 31px;color: white" class="jf-btnjobtag jf-parttimejob" >Mới</a><a style="padding: 2px 13px;font-size: 13px;line-height: 22px;float: right;margin-top: 10px;background-color: #ccc9c1;color: black;" href="javascript:void(0);" class="jf-btnjobtag jf-fulltimejob jf-btnlike "><i class="fa fa-heart-o"></i> quan tâm</a></h3>

                                            <h4><span>Tên tiêu đề: Nhân viên kinh doanh</span><span style="float: right; margin-top: -20px;"><i class="lnr lnr-eye"></i>1 lượt xem</span></span>
                                            <h4>
                                                <span><i class="lnr lnr-diamond"></i>Mức lương: 8 triệu/1 tháng</span>
                                                <span><i class="lnr lnr-briefcase"></i>Kinh nghiệm: trên 1 năm</span>
                                                <span><i class="lnr lnr-map-marker"></i>200/20D Ấp chánh 1, Tân xuân, Hóc môn</span>
                                                <span><i class="lnr lnr-tag"></i><a href="javascript:void(0);">nghành: kế toán</a></span>
                                            </h4>
                                        </div>
                                        <center><a href="javascript:void(0);" class="jf-btn jf-active">Nộp đơn ngay</a></center>
                                    </div>
                                </div>
                                <div class="jf-candidatessearcgrid jf-verticaltop">
                                    <div class="jf-candidatessearch">
                                        <figure class="jf-candidatescover">
                                            <img src="{{ asset('frontend/images/successstory/cover/img-01.jpg')}}" alt="img-description">	
                                        </figure>
                                        <figure>
                                            <img src="{{ asset('frontend/images/successstory/grid/img-01.jpg')}}" alt="image description">
                                        </figure>
                                        <div class="jf-employerdetails">


                                            <h3 style="text-align: center;"> <a href="#">CTY TNHH TMDV NHÀ LỘC PHÁT</a></h3>
                                            <h3 style="text-align: center;"><a style="margin-top: 10px;line-height: 31px;color: white" class="jf-btnjobtag jf-homebasejob" >Gấp</a><a style="padding: 2px 13px;font-size: 13px;line-height: 22px;float: right;margin-top: 10px;background-color: #ccc9c1;color: black;" href="javascript:void(0);" class="jf-btnjobtag jf-fulltimejob jf-btnlike "><i class="fa fa-heart-o"></i> quan tâm</a></h3>
                                            <h4><span>Tên tiêu đề: Nhân viên kinh doanh</span><span style="float: right; margin-top: -20px;"><i class="lnr lnr-eye"></i>1 lượt xem</span></span>
                                            <h4>
                                                <span><i class="lnr lnr-diamond"></i>Mức lương: 8 triệu/1 tháng</span>
                                                <span><i class="lnr lnr-briefcase"></i>Kinh nghiệm: trên 1 năm</span>
                                                <span><i class="lnr lnr-map-marker"></i>200/20D Ấp chánh 1, Tân xuân, Hóc môn</span>
                                                <span><i class="lnr lnr-tag"></i><a href="javascript:void(0);">nghành: kế toán</a></span>
                                            </h4>
                                        </div>
                                        <center><a href="javascript:void(0);" class="jf-btn jf-active">Nộp đơn ngay</a></center>
                                    </div>
                                </div>
                                <div class="jf-candidatessearcgrid jf-verticaltop">
                                    <div class="jf-candidatessearch">
                                        <figure class="jf-candidatescover">
                                            <img src="{{ asset('frontend/images/successstory/cover/img-01.jpg')}}" alt="img-description">	
                                        </figure>
                                        <figure>
                                            <img src="{{ asset('frontend/images/successstory/grid/img-01.jpg')}}" alt="image description">
                                        </figure>
                                        <div class="jf-employerdetails">
                                            <h3 style="text-align: center;"> <a href="#">CTY TNHH TMDV NHÀ LỘC PHÁT</a></h3>
                                            <h3 style="text-align: center;"><a style="margin-top: 10px;line-height: 31px;color: white" class="jf-btnjobtag jf-fulltimejob" >Hot</a><a style="padding: 2px 13px;font-size: 13px;line-height: 22px;float: right;margin-top: 10px;background-color: #ccc9c1;color: black;" href="javascript:void(0);" class="jf-btnjobtag jf-fulltimejob jf-btnlike "><i class="fa fa-heart-o"></i> quan tâm</a></h3>

                                            <h4><span>Tên tiêu đề: Nhân viên kinh doanh</span><span style="float: right; margin-top: -20px;"><i class="lnr lnr-eye"></i>1 lượt xem</span></span>
                                            <h4>
                                                <span><i class="lnr lnr-diamond"></i>Mức lương: 8 triệu/1 tháng</span>
                                                <span><i class="lnr lnr-briefcase"></i>Kinh nghiệm: trên 1 năm</span>
                                                <span><i class="lnr lnr-map-marker"></i>200/20D Ấp chánh 1, Tân xuân, Hóc môn</span>
                                                <span><i class="lnr lnr-tag"></i><a href="javascript:void(0);">nghành: kế toán</a></span>
                                            </h4>
                                        </div>
                                        <center><a href="javascript:void(0);" class="jf-btn jf-active">Nộp đơn ngay</a></center>
                                    </div>
                                </div>
                                <div class="jf-candidatessearcgrid jf-verticaltop">
                                    <div class="jf-candidatessearch">
                                        <figure class="jf-candidatescover">
                                            <img src="{{ asset('frontend/images/successstory/cover/img-01.jpg')}}" alt="img-description">	
                                        </figure>
                                        <figure>
                                            <img src="{{ asset('frontend/images/successstory/grid/img-01.jpg')}}" alt="image description">
                                        </figure>
                                        <div class="jf-employerdetails">
                                            <h3 style="text-align: center;"> <a href="#">CTY TNHH TMDV NHÀ LỘC PHÁT</a></h3>
                                            <h3 style="text-align: center;"><a style="margin-top: 10px;line-height: 31px;color: white" class="jf-btnjobtag jf-parttimejob" >Mới</a><a style="padding: 2px 13px;font-size: 13px;line-height: 22px;float: right;margin-top: 10px;background-color: #ccc9c1;color: black;" href="javascript:void(0);" class="jf-btnjobtag jf-fulltimejob jf-btnlike "><i class="fa fa-heart-o"></i> quan tâm</a></h3>

                                            <h4><span>Tên tiêu đề: Nhân viên kinh doanh</span><span style="float: right; margin-top: -20px;"><i class="lnr lnr-eye"></i>1 lượt xem</span></span>
                                            <h4>
                                                <span><i class="lnr lnr-diamond"></i>Mức lương: 8 triệu/1 tháng</span>
                                                <span><i class="lnr lnr-briefcase"></i>Kinh nghiệm: trên 1 năm</span>
                                                <span><i class="lnr lnr-map-marker"></i>200/20D Ấp chánh 1, Tân xuân, Hóc môn</span>
                                                <span><i class="lnr lnr-tag"></i><a href="javascript:void(0);">nghành: kế toán</a></span>
                                            </h4>
                                        </div>
                                        <center><a href="javascript:void(0);" class="jf-btn jf-active">Nộp đơn ngay</a></center>
                                    </div>
                                </div>
                                <div class="jf-candidatessearcgrid jf-verticaltop">
                                    <div class="jf-candidatessearch">
                                        <figure class="jf-candidatescover">
                                            <img src="{{ asset('frontend/images/successstory/cover/img-01.jpg')}}" alt="img-description">	
                                        </figure>
                                        <figure>
                                            <img src="{{ asset('frontend/images/successstory/grid/img-01.jpg')}}" alt="image description">
                                        </figure>
                                        <div class="jf-employerdetails">


                                            <h3 style="text-align: center;"> <a href="#">CTY TNHH TMDV NHÀ LỘC PHÁT</a></h3>
                                            <h3 style="text-align: center;"><a style="margin-top: 10px;line-height: 31px;color: white" class="jf-btnjobtag jf-homebasejob" >Gấp</a><a style="padding: 2px 13px;font-size: 13px;line-height: 22px;float: right;margin-top: 10px;background-color: #ccc9c1;color: black;" href="javascript:void(0);" class="jf-btnjobtag jf-fulltimejob jf-btnlike "><i class="fa fa-heart-o"></i> quan tâm</a></h3>
                                            <h4><span>Tên tiêu đề: Nhân viên kinh doanh</span><span style="float: right; margin-top: -20px;"><i class="lnr lnr-eye"></i>1 lượt xem</span></span>
                                            <h4>
                                                <span><i class="lnr lnr-diamond"></i>Mức lương: 8 triệu/1 tháng</span>
                                                <span><i class="lnr lnr-briefcase"></i>Kinh nghiệm: trên 1 năm</span>
                                                <span><i class="lnr lnr-map-marker"></i>200/20D Ấp chánh 1, Tân xuân, Hóc môn</span>
                                                <span><i class="lnr lnr-tag"></i><a href="javascript:void(0);">nghành: kế toán</a></span>
                                            </h4>
                                        </div>
                                        <center><a href="javascript:void(0);" class="jf-btn jf-active">Nộp đơn ngay</a></center>
                                    </div>
                                </div>

                                <!-- <nav class="jf-pagination">
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
                                </nav> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--************************************
                Blog Grid End
        *************************************-->
    </div>
    <!--Hết Công việc Mới đăng-->
    <!--Công việc nổi bật-->
    <div class="jf-sectionspace jf-haslayout">
        <!--************************************
                Blog Grid Start
        *************************************-->
        <div class="jf-haslayout">
            <div class="container">
                <div class="row">
                    <div id="jf-threecolumns" class="jf-threecolumns">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <!-- <div class="jf-adds jf-addsvtwo">
                                <a href="javascript:void(0);" title="">
                                    <figure>	
                                        <img src="{{ asset('frontend/images/adds-03.jpg')}}" alt="img description">
                                    </figure>
                                </a>
                                <span>Advertisement  540px X 80px</span>
                            </div> -->
                            
                            <div class="jf-sortandview">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="jf-sectionhead">
                                        <h2 style="margin-top: 10px;">Công việc Nổi bật</h2>
                                        <a style="margin-top: 10px;" class="jf-btnviewall" href="#">Xem thêm</a>
                                    </div>
                                </div>
                            </div>
                            <div class="jf-candidatessearchsvtwo">
                                <div class="jf-candidatessearcgrid jf-verticaltop">
                                    <div class="jf-candidatessearch">
                                        <figure class="jf-candidatescover">
                                            <img src="{{ asset('frontend/images/successstory/cover/img-01.jpg')}}" alt="img-description">	
                                        </figure>
                                        <figure>
                                            <img src="{{ asset('frontend/images/successstory/grid/img-01.jpg')}}" alt="image description">
                                        </figure>
                                        <div class="jf-employerdetails">
                                            <h3 style="text-align: center;"> <a href="#">CTY TNHH TMDV NHÀ LỘC PHÁT</a></h3>
                                            <h3 style="text-align: center;"><a style="margin-top: 10px;line-height: 31px;color: white" class="jf-btnjobtag jf-fulltimejob" >Hot</a><a style="padding: 2px 13px;font-size: 13px;line-height: 22px;float: right;margin-top: 10px;background-color: #ccc9c1;color: black;" href="javascript:void(0);" class="jf-btnjobtag jf-fulltimejob jf-btnlike "><i class="fa fa-heart-o"></i> quan tâm</a></h3>

                                            <h4><span>Tên tiêu đề: Nhân viên kinh doanh</span><span style="float: right; margin-top: -20px;"><i class="lnr lnr-eye"></i>1 lượt xem</span></span>
                                            <h4>
                                                <span><i class="lnr lnr-diamond"></i>Mức lương: 8 triệu/1 tháng</span>
                                                <span><i class="lnr lnr-briefcase"></i>Kinh nghiệm: trên 1 năm</span>
                                                <span><i class="lnr lnr-map-marker"></i>200/20D Ấp chánh 1, Tân xuân, Hóc môn</span>
                                                <span><i class="lnr lnr-tag"></i><a href="javascript:void(0);">nghành: kế toán</a></span>
                                            </h4>
                                        </div>
                                        <center><a href="javascript:void(0);" class="jf-btn jf-active">Nộp đơn ngay</a></center>
                                    </div>
                                </div>
                                <div class="jf-candidatessearcgrid jf-verticaltop">
                                    <div class="jf-candidatessearch">
                                        <figure class="jf-candidatescover">
                                            <img src="{{ asset('frontend/images/successstory/cover/img-01.jpg')}}" alt="img-description">	
                                        </figure>
                                        <figure>
                                            <img src="{{ asset('frontend/images/successstory/grid/img-01.jpg')}}" alt="image description">
                                        </figure>
                                        <div class="jf-employerdetails">
                                            <h3 style="text-align: center;"> <a href="#">CTY TNHH TMDV NHÀ LỘC PHÁT</a></h3>
                                            <h3 style="text-align: center;"><a style="margin-top: 10px;line-height: 31px;color: white" class="jf-btnjobtag jf-parttimejob" >Mới</a><a style="padding: 2px 13px;font-size: 13px;line-height: 22px;float: right;margin-top: 10px;background-color: #ccc9c1;color: black;" href="javascript:void(0);" class="jf-btnjobtag jf-fulltimejob jf-btnlike "><i class="fa fa-heart-o"></i> quan tâm</a></h3>

                                            <h4><span>Tên tiêu đề: Nhân viên kinh doanh</span><span style="float: right; margin-top: -20px;"><i class="lnr lnr-eye"></i>1 lượt xem</span></span>
                                            <h4>
                                                <span><i class="lnr lnr-diamond"></i>Mức lương: 8 triệu/1 tháng</span>
                                                <span><i class="lnr lnr-briefcase"></i>Kinh nghiệm: trên 1 năm</span>
                                                <span><i class="lnr lnr-map-marker"></i>200/20D Ấp chánh 1, Tân xuân, Hóc môn</span>
                                                <span><i class="lnr lnr-tag"></i><a href="javascript:void(0);">nghành: kế toán</a></span>
                                            </h4>
                                        </div>
                                        <center><a href="javascript:void(0);" class="jf-btn jf-active">Nộp đơn ngay</a></center>
                                    </div>
                                </div>
                                <div class="jf-candidatessearcgrid jf-verticaltop">
                                    <div class="jf-candidatessearch">
                                        <figure class="jf-candidatescover">
                                            <img src="{{ asset('frontend/images/successstory/cover/img-01.jpg')}}" alt="img-description">	
                                        </figure>
                                        <figure>
                                            <img src="{{ asset('frontend/images/successstory/grid/img-01.jpg')}}" alt="image description">
                                        </figure>
                                        <div class="jf-employerdetails">


                                            <h3 style="text-align: center;"> <a href="#">CTY TNHH TMDV NHÀ LỘC PHÁT</a></h3>
                                            <h3 style="text-align: center;"><a style="margin-top: 10px;line-height: 31px;color: white" class="jf-btnjobtag jf-homebasejob" >Gấp</a><a style="padding: 2px 13px;font-size: 13px;line-height: 22px;float: right;margin-top: 10px;background-color: #ccc9c1;color: black;" href="javascript:void(0);" class="jf-btnjobtag jf-fulltimejob jf-btnlike "><i class="fa fa-heart-o"></i> quan tâm</a></h3>
                                            <h4><span>Tên tiêu đề: Nhân viên kinh doanh</span><span style="float: right; margin-top: -20px;"><i class="lnr lnr-eye"></i>1 lượt xem</span></span>
                                            <h4>
                                                <span><i class="lnr lnr-diamond"></i>Mức lương: 8 triệu/1 tháng</span>
                                                <span><i class="lnr lnr-briefcase"></i>Kinh nghiệm: trên 1 năm</span>
                                                <span><i class="lnr lnr-map-marker"></i>200/20D Ấp chánh 1, Tân xuân, Hóc môn</span>
                                                <span><i class="lnr lnr-tag"></i><a href="javascript:void(0);">nghành: kế toán</a></span>
                                            </h4>
                                        </div>
                                        <center><a href="javascript:void(0);" class="jf-btn jf-active">Nộp đơn ngay</a></center>
                                    </div>
                                </div>
                                <div class="jf-candidatessearcgrid jf-verticaltop">
                                    <div class="jf-candidatessearch">
                                        <figure class="jf-candidatescover">
                                            <img src="{{ asset('frontend/images/successstory/cover/img-01.jpg')}}" alt="img-description">	
                                        </figure>
                                        <figure>
                                            <img src="{{ asset('frontend/images/successstory/grid/img-01.jpg')}}" alt="image description">
                                        </figure>
                                        <div class="jf-employerdetails">
                                            <h3 style="text-align: center;"> <a href="#">CTY TNHH TMDV NHÀ LỘC PHÁT</a></h3>
                                            <h3 style="text-align: center;"><a style="margin-top: 10px;line-height: 31px;color: white" class="jf-btnjobtag jf-fulltimejob" >Hot</a><a style="padding: 2px 13px;font-size: 13px;line-height: 22px;float: right;margin-top: 10px;background-color: #ccc9c1;color: black;" href="javascript:void(0);" class="jf-btnjobtag jf-fulltimejob jf-btnlike "><i class="fa fa-heart-o"></i> quan tâm</a></h3>

                                            <h4><span>Tên tiêu đề: Nhân viên kinh doanh</span><span style="float: right; margin-top: -20px;"><i class="lnr lnr-eye"></i>1 lượt xem</span></span>
                                            <h4>
                                                <span><i class="lnr lnr-diamond"></i>Mức lương: 8 triệu/1 tháng</span>
                                                <span><i class="lnr lnr-briefcase"></i>Kinh nghiệm: trên 1 năm</span>
                                                <span><i class="lnr lnr-map-marker"></i>200/20D Ấp chánh 1, Tân xuân, Hóc môn</span>
                                                <span><i class="lnr lnr-tag"></i><a href="javascript:void(0);">nghành: kế toán</a></span>
                                            </h4>
                                        </div>
                                        <center><a href="javascript:void(0);" class="jf-btn jf-active">Nộp đơn ngay</a></center>
                                    </div>
                                </div>
                                <div class="jf-candidatessearcgrid jf-verticaltop">
                                    <div class="jf-candidatessearch">
                                        <figure class="jf-candidatescover">
                                            <img src="{{ asset('frontend/images/successstory/cover/img-01.jpg')}}" alt="img-description">	
                                        </figure>
                                        <figure>
                                            <img src="{{ asset('frontend/images/successstory/grid/img-01.jpg')}}" alt="image description">
                                        </figure>
                                        <div class="jf-employerdetails">
                                            <h3 style="text-align: center;"> <a href="#">CTY TNHH TMDV NHÀ LỘC PHÁT</a></h3>
                                            <h3 style="text-align: center;"><a style="margin-top: 10px;line-height: 31px;color: white" class="jf-btnjobtag jf-parttimejob" >Mới</a><a style="padding: 2px 13px;font-size: 13px;line-height: 22px;float: right;margin-top: 10px;background-color: #ccc9c1;color: black;" href="javascript:void(0);" class="jf-btnjobtag jf-fulltimejob jf-btnlike "><i class="fa fa-heart-o"></i> quan tâm</a></h3>

                                            <h4><span>Tên tiêu đề: Nhân viên kinh doanh</span><span style="float: right; margin-top: -20px;"><i class="lnr lnr-eye"></i>1 lượt xem</span></span>
                                            <h4>
                                                <span><i class="lnr lnr-diamond"></i>Mức lương: 8 triệu/1 tháng</span>
                                                <span><i class="lnr lnr-briefcase"></i>Kinh nghiệm: trên 1 năm</span>
                                                <span><i class="lnr lnr-map-marker"></i>200/20D Ấp chánh 1, Tân xuân, Hóc môn</span>
                                                <span><i class="lnr lnr-tag"></i><a href="javascript:void(0);">nghành: kế toán</a></span>
                                            </h4>
                                        </div>
                                        <center><a href="javascript:void(0);" class="jf-btn jf-active">Nộp đơn ngay</a></center>
                                    </div>
                                </div>
                                <div class="jf-candidatessearcgrid jf-verticaltop">
                                    <div class="jf-candidatessearch">
                                        <figure class="jf-candidatescover">
                                            <img src="{{ asset('frontend/images/successstory/cover/img-01.jpg')}}" alt="img-description">	
                                        </figure>
                                        <figure>
                                            <img src="{{ asset('frontend/images/successstory/grid/img-01.jpg')}}" alt="image description">
                                        </figure>
                                        <div class="jf-employerdetails">


                                            <h3 style="text-align: center;"> <a href="#">CTY TNHH TMDV NHÀ LỘC PHÁT</a></h3>
                                            <h3 style="text-align: center;"><a style="margin-top: 10px;line-height: 31px;color: white" class="jf-btnjobtag jf-homebasejob" >Gấp</a><a style="padding: 2px 13px;font-size: 13px;line-height: 22px;float: right;margin-top: 10px;background-color: #ccc9c1;color: black;" href="javascript:void(0);" class="jf-btnjobtag jf-fulltimejob jf-btnlike "><i class="fa fa-heart-o"></i> quan tâm</a></h3>
                                            <h4><span>Tên tiêu đề: Nhân viên kinh doanh</span><span style="float: right; margin-top: -20px;"><i class="lnr lnr-eye"></i>1 lượt xem</span></span>
                                            <h4>
                                                <span><i class="lnr lnr-diamond"></i>Mức lương: 8 triệu/1 tháng</span>
                                                <span><i class="lnr lnr-briefcase"></i>Kinh nghiệm: trên 1 năm</span>
                                                <span><i class="lnr lnr-map-marker"></i>200/20D Ấp chánh 1, Tân xuân, Hóc môn</span>
                                                <span><i class="lnr lnr-tag"></i><a href="javascript:void(0);">nghành: kế toán</a></span>
                                            </h4>
                                        </div>
                                        <center><a href="javascript:void(0);" class="jf-btn jf-active">Nộp đơn ngay</a></center>
                                    </div>
                                </div>

                                <!-- <nav class="jf-pagination">
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
                                </nav> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--************************************
                Blog Grid End
        *************************************-->
    </div>
    <!--Hết Công việc nổi bật-->

    <!--Công việc nổi bật-->
    <!-- <section class="jf-haslayout jf-sectionspace">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="jf-sectionhead">
                        <h2>Công việc nổi bật</h2>
                        <a class="jf-btnviewall" href="javascript:void(0);">Xem thêm</a>
                    </div>
                </div>
                <div class="jf-ourprofessionals">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 float-left">
                        <div class="jf-ourprofessional">
                            <div class="jf-professionaldetail">
                                <figure class="jf-professionalimg">
                                    <img src="{{ asset('frontend/images/team/img-01.jpg')}}" alt="image description">
                                </figure>
                                <div class="jf-professionalcontent">
                                    <div class="jf-professionalname">
                                        <h3><a href="javascript:void(0);">Hệ thống Nhà hàng Cơm Tấm Cali</a></h3>
                                        <span>Tuyển dụng Phục vụ/Phụ bếp/Thu ngân</span>
                                    </div>
                                    <span class="jf-totalviews"><i class="lnr lnr-location"></i> 200/20D Ấp Chánh 1,Quận 7, HCM</span>
                                    <a class="jf-btn" href="javascript:void(0);">Xem chi tiết</a>
                                </div>
                            </div>
                            <ul class="jf-professionalinfo">
                                <li><i class="lnr lnr-briefcase"></i><span>KN: trên 1 năm</span></li>
                                <li><i class="lnr lnr-eye"></i><span>1,744,588 lượt xem</span></li>
                                <li><i class="lnr lnr-tag"></i><span><a href="javascript:void(0);">Quản trị kinh doanh</a></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 float-left">
                        <div class="jf-ourprofessional">
                            <div class="jf-professionaldetail">
                                <figure class="jf-professionalimg">
                                    <img src="{{ asset('frontend/images/team/img-02.jpg')}}" alt="image description">
                                </figure>
                                <div class="jf-professionalcontent">
                                    <div class="jf-professionalname">
                                        <h3><a href="javascript:void(0);">Sr. Graphic / Ui Designer</a></h3>
                                        <span>Aviato Group of Company</span>
                                    </div>
                                    <span class="jf-totalviews"><i class="lnr lnr-eye"></i><em>1,744,588 views</em></span>
                                    <a class="jf-btn" href="javascript:void(0);">View Full Profile</a>
                                </div>
                            </div>
                            <ul class="jf-professionalinfo">
                                <li><i class="lnr lnr-briefcase"></i><span>Exp: 07 years</span></li>
                                <li><i class="lnr lnr-location"></i><span>Chicago, USA</span></li>
                                <li><i class="lnr lnr-tag"></i><span><a href="javascript:void(0);">Business &amp; Finance</a></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 float-left">
                        <div class="jf-ourprofessional">
                            <div class="jf-professionaldetail">
                                <figure class="jf-professionalimg">
                                    <img src="{{ asset('frontend/images/team/img-03.jpg')}}" alt="image description">
                                </figure>
                                <div class="jf-professionalcontent">
                                    <div class="jf-professionalname">
                                        <h3><a href="javascript:void(0);">Photographer &amp; Graphic Designer</a></h3>
                                        <span>Fast Run Cargo &amp; Movers</span>
                                    </div>
                                    <span class="jf-totalviews"><i class="lnr lnr-eye"></i><em>1,744,588 views</em></span>
                                    <a class="jf-btn" href="javascript:void(0);">View Full Profile</a>
                                </div>
                            </div>
                            <ul class="jf-professionalinfo">
                                <li><i class="lnr lnr-briefcase"></i><span>Exp: 07 years</span></li>
                                <li><i class="lnr lnr-location"></i><span>Chicago, USA</span></li>
                                <li><i class="lnr lnr-tag"></i><span><a href="javascript:void(0);">Business &amp; Finance</a></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 float-left">
                        <div class="jf-ourprofessional">
                            <div class="jf-professionaldetail">
                                <figure class="jf-professionalimg">
                                    <img src="{{ asset('frontend/images/team/img-04.jpg')}}" alt="image description">
                                </figure>
                                <div class="jf-professionalcontent">
                                    <div class="jf-professionalname">
                                        <h3><a href="javascript:void(0);">Senior Web/graphic Designer</a></h3>
                                        <span>Sass Perfume &amp; Clothes</span>
                                    </div>
                                    <span class="jf-totalviews"><i class="lnr lnr-eye"></i><em>1,744,588 views</em></span>
                                    <a class="jf-btn" href="javascript:void(0);">View Full Profile</a>
                                </div>
                            </div>
                            <ul class="jf-professionalinfo">
                                <li><i class="lnr lnr-briefcase"></i><span>Exp: 07 years</span></li>
                                <li><i class="lnr lnr-location"></i><span>Chicago, USA</span></li>
                                <li><i class="lnr lnr-tag"></i><span><a href="javascript:void(0);">Business &amp; Finance</a></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!--Hết Công việc nổi bật-->


    <!--Featured Jobs Start-->
    <!-- <section class="jf-haslayout jf-sectionspace jf-bglight">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="jf-sectionhead">
                        <h2>Featured Jobs</h2>
                        <a class="jf-btnviewall" href="javascript:void(0);">View All</a>
                    </div>
                </div>
                <div class="jf-featuredjobs">
                    <div class="jf-featurejobholder">
                        <div class="jf-featurejob">
                            <figure class="jf-companyimg">
                                <img src="{{ asset('frontend/images/topcompanies/img-01.png')}}" alt="image description">
                            </figure>
                            <div class="jf-companycontent">
                                <div class="jf-companyhead">
                                    <a class="jf-btnjobtag jf-fulltimejob" href="javascript:void(0);">Full Time</a>
                                    <div class="jf-rightarea">
                                        <a class="jf-tagfeature jf-tagfeatured" href="javascript:void(0);">feature</a>
                                        <a class="jf-btnlike jf-btnliked" href="javascript:void(0);"><i class="fa fa-heart-o"></i></a>
                                    </div>
                                </div>
                                <div class="jf-companyname">
                                    <h3><a href="javascript:void(0);">Sales Executive - Call Center</a></h3>
                                    <span>Angry Creative Bears, Chicago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="jf-featurejobholder">
                        <div class="jf-featurejob">
                            <figure class="jf-companyimg">
                                <img src="{{ asset('frontend/images/topcompanies/img-02.png')}}" alt="image description">
                            </figure>
                            <div class="jf-companycontent">
                                <div class="jf-companyhead">
                                    <a class="jf-btnjobtag jf-parttimejob" href="javascript:void(0);">Part Time</a>
                                    <div class="jf-rightarea">
                                        <a class="jf-tagfeature" href="javascript:void(0);">feature</a>
                                        <a class="jf-btnlike" href="javascript:void(0);"><i class="fa fa-heart-o"></i></a>
                                    </div>
                                </div>
                                <div class="jf-companyname">
                                    <h3><a href="javascript:void(0);">Sales Executive - Call Center</a></h3>
                                    <span>Angry Creative Bears, Chicago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="jf-featurejobholder">
                        <div class="jf-featurejob">
                            <figure class="jf-companyimg">
                                <img src="{{ asset('frontend/images/topcompanies/img-03.png')}}" alt="image description">
                            </figure>
                            <div class="jf-companycontent">
                                <div class="jf-companyhead">
                                    <a class="jf-btnjobtag jf-homebasejob" href="javascript:void(0);">Home Base</a>
                                    <div class="jf-rightarea">
                                        <a class="jf-tagfeature jf-tagfeatured" href="javascript:void(0);">feature</a>
                                        <a class="jf-btnlike jf-btnliked" href="javascript:void(0);"><i class="fa fa-heart-o"></i></a>
                                    </div>
                                </div>
                                <div class="jf-companyname">
                                    <h3><a href="javascript:void(0);">Sales Executive - Call Center</a></h3>
                                    <span>Angry Creative Bears, Chicago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="jf-featurejobholder">
                        <div class="jf-featurejob">
                            <figure class="jf-companyimg">
                                <img src="{{ asset('frontend/images/topcompanies/img-04.png')}}" alt="image description">
                            </figure>
                            <div class="jf-companycontent">
                                <div class="jf-companyhead">
                                    <a class="jf-btnjobtag jf-internship" href="javascript:void(0);">Internship</a>
                                    <div class="jf-rightarea">
                                        <a class="jf-tagfeature" href="javascript:void(0);">feature</a>
                                        <a class="jf-btnlike jf-btnliked" href="javascript:void(0);"><i class="fa fa-heart-o"></i></a>
                                    </div>
                                </div>
                                <div class="jf-companyname">
                                    <h3><a href="javascript:void(0);">Sales Executive - Call Center</a></h3>
                                    <span>Angry Creative Bears, Chicago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="jf-featurejobholder">
                        <div class="jf-featurejob">
                            <figure class="jf-companyimg">
                                <img src="{{ asset('frontend/images/topcompanies/img-05.png')}}" alt="image description">
                            </figure>
                            <div class="jf-companycontent">
                                <div class="jf-companyhead">
                                    <a class="jf-btnjobtag jf-projectbasejob" href="javascript:void(0);">Project Base</a>
                                    <div class="jf-rightarea">
                                        <a class="jf-tagfeature jf-tagfeatured" href="javascript:void(0);">feature</a>
                                        <a class="jf-btnlike" href="javascript:void(0);"><i class="fa fa-heart-o"></i></a>
                                    </div>
                                </div>
                                <div class="jf-companyname">
                                    <h3><a href="javascript:void(0);">Sales Executive - Call Center</a></h3>
                                    <span>Angry Creative Bears, Chicago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="jf-featurejobholder">
                        <div class="jf-featurejob">
                            <figure class="jf-companyimg">
                                <img src="{{ asset('frontend/images/topcompanies/img-06.png')}}" alt="image description">
                            </figure>
                            <div class="jf-companycontent">
                                <div class="jf-companyhead">
                                    <a class="jf-btnjobtag jf-homebasejob" href="javascript:void(0);">Home Base</a>
                                    <div class="jf-rightarea">
                                        <a class="jf-tagfeature jf-tagfeatured" href="javascript:void(0);">feature</a>
                                        <a class="jf-btnlike jf-btnliked" href="javascript:void(0);"><i class="fa fa-heart-o"></i></a>
                                    </div>
                                </div>
                                <div class="jf-companyname">
                                    <h3><a href="javascript:void(0);">Sales Executive - Call Center</a></h3>
                                    <span>Angry Creative Bears, Chicago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="jf-featurejobholder">
                        <div class="jf-featurejob">
                            <figure class="jf-companyimg">
                                <img src="{{ asset('frontend/images/topcompanies/img-01.png')}}" alt="image description">
                            </figure>
                            <div class="jf-companycontent">
                                <div class="jf-companyhead">
                                    <a class="jf-btnjobtag jf-homebasejob" href="javascript:void(0);">Home Base</a>
                                    <div class="jf-rightarea">
                                        <a class="jf-tagfeature" href="javascript:void(0);">feature</a>
                                        <a class="jf-btnlike" href="javascript:void(0);"><i class="fa fa-heart-o"></i></a>
                                    </div>
                                </div>
                                <div class="jf-companyname">
                                    <h3><a href="javascript:void(0);">Sales Executive - Call Center</a></h3>
                                    <span>Angry Creative Bears, Chicago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="jf-featurejobholder">
                        <div class="jf-featurejob">
                            <figure class="jf-companyimg">
                                <img src="{{ asset('frontend/images/topcompanies/img-03.png')}}" alt="image description">
                            </figure>
                            <div class="jf-companycontent">
                                <div class="jf-companyhead">
                                    <a class="jf-btnjobtag jf-parttimejob" href="javascript:void(0);">Part Time</a>
                                    <div class="jf-rightarea">
                                        <a class="jf-tagfeature" href="javascript:void(0);">feature</a>
                                        <a class="jf-btnlike" href="javascript:void(0);"><i class="fa fa-heart-o"></i></a>
                                    </div>
                                </div>
                                <div class="jf-companyname">
                                    <h3><a href="javascript:void(0);">Sales Executive - Call Center</a></h3>
                                    <span>Angry Creative Bears, Chicago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="jf-featurejobholder">
                        <div class="jf-featurejob">
                            <figure class="jf-companyimg">
                                <img src="{{ asset('frontend/images/topcompanies/img-04.png')}}" alt="image description">
                            </figure>
                            <div class="jf-companycontent">
                                <div class="jf-companyhead">
                                    <a class="jf-btnjobtag jf-fulltimejob" href="javascript:void(0);">Full Time</a>
                                    <div class="jf-rightarea">
                                        <a class="jf-tagfeature" href="javascript:void(0);">feature</a>
                                        <a class="jf-btnlike" href="javascript:void(0);"><i class="fa fa-heart-o"></i></a>
                                    </div>
                                </div>
                                <div class="jf-companyname">
                                    <h3><a href="javascript:void(0);">Sales Executive - Call Center</a></h3>
                                    <span>Angry Creative Bears, Chicago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!--Featured Jobs End-->

    <!--Ý kiến khách hàng-->
    <!-- <section class="jf-sectionspace jf-haslayout jf-bglight">
        <div class="container">
            <div class="row justify-content-lg-center">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10 col-lg-push-1">
                    <div class="jf-customerfeedbacks">
                        <div id="jf-feebbackslider" class="jf-feebbackslider owl-carousel">
                            <div class="item jf-employstory">
                                <figure class="jf-empoyimg">
                                    <img src="{{ asset('frontend/images/testimonials/img-01.jpg')}}" alt="image descrion">
                                </figure>
                                <div class="jf-empoyerinfo">
                                    <h3>Margorie Wayman</h3>
                                    <span>Territory Sales Manager</span>
                                    <span>XYZ Company LTD</span>
                                </div>
                                <div class="jf-description">
                                    <blockquote>
                                        <q>Consectetur adipisicing <span>elito eiusmod lokie apore isniate</span> incididunt etoeream magnaie aiequa enimic ad minim venam... </q>
                                    </blockquote>
                                </div>
                            </div>
                            <div class="item jf-employstory">
                                <figure class="jf-empoyimg">
                                    <img src="{{ asset('frontend/images/testimonials/img-02.jpg')}}" alt="image descrion">
                                </figure>
                                <div class="jf-empoyerinfo">
                                    <h3>Margorie Wayman</h3>
                                    <span>Territory Sales Manager</span>
                                    <span>XYZ Company LTD</span>
                                </div>
                                <div class="jf-description">
                                    <blockquote>
                                        <q>Consectetur adipisicing <span>elito eiusmod lokie apore isniate</span> incididunt etoeream magnaie aiequa enimic ad minim venam... </q>
                                    </blockquote>
                                </div>
                            </div>
                            <div class="item jf-employstory">
                                <figure class="jf-empoyimg">
                                    <img src="{{ asset('frontend/images/testimonials/img-03.jpg')}}" alt="image descrion">
                                </figure>
                                <div class="jf-empoyerinfo">
                                    <h3>Margorie Wayman</h3>
                                    <span>Territory Sales Manager</span>
                                    <span>XYZ Company LTD</span>
                                </div>
                                <div class="jf-description">
                                    <blockquote>
                                        <q>Consectetur adipisicing <span>elito eiusmod lokie apore isniate</span> incididunt etoeream magnaie aiequa enimic ad minim venam... </q>
                                    </blockquote>
                                </div>
                            </div>
                            <div class="item jf-employstory">
                                <figure class="jf-empoyimg">
                                    <img src="{{ asset('frontend/images/testimonials/img-04.jpg')}}" alt="image descrion">
                                </figure>
                                <div class="jf-empoyerinfo">
                                    <h3>Margorie Wayman</h3>
                                    <span>Territory Sales Manager</span>
                                    <span>XYZ Company LTD</span>
                                </div>
                                <div class="jf-description">
                                    <blockquote>
                                        <q>Consectetur adipisicing <span>elito eiusmod lokie apore isniate</span> incididunt etoeream magnaie aiequa enimic ad minim venam... </q>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                        <div id="jf-authorpicslider" class="jf-authorpicslider jf-authorpicslider owl-carousel">
                            <div class="item"><figure><img src="{{ asset('frontend/images/testimonials/img-01.jpg')}}" alt="image description"></figure></div>
                            <div class="item"><figure><img src="{{ asset('frontend/images/testimonials/img-02.jpg')}}" alt="image description"></figure></div>
                            <div class="item"><figure><img src="{{ asset('frontend/images/testimonials/img-03.jpg')}}" alt="image description"></figure></div>
                            <div class="item"><figure><img src="{{ asset('frontend/images/testimonials/img-04.jpg')}}" alt="image description"></figure></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!--Hết Ý kiến khách hàng-->


     <!--Nhà tuyển dụng-->
    <!-- <section class="jf-haslayout jf-sectionspace">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="jf-sectionhead">
                        <h2>Thành viên nhà tuyển dụng</h2>
                    </div>
                </div>
                <div class="jf-topcompaniesholder">
                    <div class="col-12 col-sm-12 col-md-10 push-md-1 col-lg-10 push-lg-1 float-left">
                        <div id="jf-topcompaniesslider" class="jf-topcompaniesslider jf-topcompanies owl-carousel">
                            <figure class="jf-topcompany item">
                                <a class="jf-bglight" href="javascript:void(0)">
                                    <img src="{{ asset('frontend/images/topcompanies/img-01.png')}}" alt="image description">
                                </a>
                            </figure>
                            <figure class="jf-topcompany item">
                                <a href="javascript:void(0)">
                                    <img src="{{ asset('frontend/images/topcompanies/img-02.png')}}" alt="image description">
                                </a>
                            </figure>
                            <figure class="jf-topcompany item">
                                <a class="jf-bglight" href="javascript:void(0)">
                                    <img src="{{ asset('frontend/images/topcompanies/img-03.png')}}" alt="image description">
                                </a>
                            </figure>
                            <figure class="jf-topcompany item">
                                <a href="javascript:void(0)">
                                    <img src="{{ asset('frontend/images/topcompanies/img-04.png')}}" alt="image description">
                                </a>
                            </figure>
                            <figure class="jf-topcompany item">
                                <a class="jf-bglight" href="javascript:void(0)">
                                    <img src="{{ asset('frontend/images/topcompanies/img-05.png')}}" alt="image description">
                                </a>
                            </figure>
                            <figure class="jf-topcompany item">
                                <a href="javascript:void(0)">
                                    <img src="{{ asset('frontend/images/topcompanies/img-06.png')}}" alt="image description">
                                </a>
                            </figure>
                            <figure class="jf-topcompany item">
                                <a class="jf-bglight" href="javascript:void(0)">
                                    <img src="{{ asset('frontend/images/topcompanies/img-01.png')}}" alt="image description">
                                </a>
                            </figure>
                            <figure class="jf-topcompany item">
                                <a href="javascript:void(0)">
                                    <img src="{{ asset('frontend/images/topcompanies/img-02.png')}}" alt="image description">
                                </a>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!--Hết nhà tuyển dụng-->
</main>
<!--Main End-->
@endsection