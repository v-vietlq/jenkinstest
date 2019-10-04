@extends('site.master')
@section('title','Job')
@section('content') 

<style>
.jf-searchoptions .form-group .jf-radio.jf-all label{
    background:black;
}
</style>
<!-- Home Slider Start-->
<main id="jf-main" class="jf-main jf-haslayout" style="background: url({{asset('site/images/hinh1.jpg')}});width:100%">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="jf-slidercontent">
                    <center><h2 style="color:white">Vui lòng chọn công việc bạn cần tìm</h2></center><br />
                    <form class="jf-formtheme jf-formbannersearch">
                        <fieldset class="jf-searcharea">
                            <div class="jf-searchholder">
                                <label><em class="lnr lnr-apartment"></em><span>Tên và công ty cần tìm</span></label>
                                <div class="form-group jf-inputwithicon">
                                    <input type="search" name="search" class="form-control" placeholder="Nhập từ khóa...">
                                </div>
                            </div>
                            <div class="jf-searchholder">
                                <label><em class="lnr lnr-apartment"></em><span>Vị trí cần tìm</span></label>
                                <span class="jf-select">
                                    <select data-placeholder="All" class="chosen-select locations" name="locations">
                                        <option value="">Chọn vị trí</option>
                                        <option value="aldershot">Quản trị kinh doanh</option>
                                        <option value="altrincham">Kế toán</option>
                                        <option value="aylesbury">Kỹ thuật</option>
                                    </select>
                                </span>
                            </div>
                            <div class="jf-searchholder">
                                <label><em class="lnr lnr-apartment"></em><span>Tỉnh/Thành phố</span></label>
                                <span class="jf-select">
                                    <select data-placeholder="All" class="chosen-select locations" name="locations">
                                        <option value="">Hồ Chí Minh</option>
                                        <option value="aberdeen">Hà nội</option>
                                        <option value="aldershot">Đà Nẵng</option>
                                    </select>
                                </span>
                            </div>
                            
                            <div class="jf-searchholder">
                                <label><em class="lnr lnr-apartment"></em><span>Quận/Huyện</span></label>
                                <span class="jf-select">
                                    <select data-placeholder="All" class="chosen-select locations" name="locations">
                                        <option value="">Quận 1</option>
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
                    </form><br />
                </div>
            </div>
        </div>
    </div>
</main>
<!--Home Slider End-->
<!--Main Start-->
<div class="jf-haslayout" style="margin-top:35px">
    <div class="container">
        <div class="row">
            <div id="jf-threecolumns" class="jf-threecolumns">
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-3 float-left">
                    <aside id="jf-sidebar" class="jf-sidebar jf-sidebarcol">
                        <div id="jf-narrowsearchcollapse" class="jf-themecollapse jf-narrowsearchcollapse">
                            <div class="jf-widget jf-themecollapsetitle">
                                <div class="jf-widgettitle">
                                    <h3>Vị trí</h3>
                                    <span class="fa fa-chevron-right"></span>
                                </div>
                            </div>
                            <div class="jf-widget jf-themecollapsecontent">
                                <div class="jf-checkboxgroup">
                                    <label>
                                        <input style="width: 20px;height: 13px;" type="radio" checked="checked" name="radio"><span class="checkmark"></span> <span>Tất cả  </span> 
                                    </label><br />
                                    <label>
                                        <input style="width: 20px;height: 13px;" type="radio" name="radio"><span class="checkmark"></span><span>Kinh doanh</span> 
                                    </label><br />
                                    <label>
                                        <input style="width: 20px;height: 13px;" type="radio" name="radio"><span class="checkmark"></span><span>PG/PB/Bán hàng</span> 
                                    </label><br />
                                    <label>
                                        <input style="width: 20px;height: 13px;" type="radio" name="radio"><span class="checkmark"></span><span>Hành Chính - Nhân sự</span> 
                                    </label><br />
                                    <label>
                                        <input style="width: 20px;height: 13px;" type="radio" name="radio"><span class="checkmark"></span><span>Tài chính/kế toán/kiểm toán</span> 
                                    </label><br />
                                    <label>
                                        <input style="width: 20px;height: 13px;" type="radio" name="radio"><span class="checkmark"></span><span>Chăm sóc khách hàng</span> 
                                    </label><br />
                                    <label>
                                        <input style="width: 20px;height: 13px;" type="radio" name="radio"><span class="checkmark"></span><span>kỹ thuật</span> 
                                    </label><br />
                                    <label>
                                        <input style="width: 20px;height: 13px;" type="radio" name="radio"><span class="checkmark"></span><span>Điện/Điện tư/Điện lạnh</span> 
                                    </label><br />
                                    <a href="javascript:void(0);" class="jf-viewmore">Xem thêm</a>
                                </div>
                            </div>
                            <div class="jf-widget jf-themecollapsetitle">
                                <div class="jf-widgettitle">
                                    <h3>Kinh nghiệm</h3>
                                    <span class="fa fa-chevron-right"></span>
                                </div>
                            </div>
                            <div class="jf-widget jf-themecollapsecontent">
                                <div class="jf-checkboxgroup">
                                    <label>
                                        <input style="width: 20px;height: 13px;" type="radio" checked="checked" name="radio1"><span class="checkmark"></span> <span>Tất cả  </span> 
                                    </label><br />
                                    <label>
                                        <input style="width: 20px;height: 13px;" type="radio" name="radio1"><span class="checkmark"></span><span>Không có kinh nghiệm</span> 
                                    </label><br />
                                    <label>
                                        <input style="width: 20px;height: 13px;" type="radio" name="radio1"><span class="checkmark"></span><span>6 Tháng - 1 Năm</span> 
                                    </label><br />
                                    <label>
                                        <input style="width: 20px;height: 13px;" type="radio" name="radio1"><span class="checkmark"></span><span>1 - 2 năm</span> 
                                    </label><br />
                                    <label>
                                        <input style="width: 20px;height: 13px;" type="radio" name="radio1"><span class="checkmark"></span><span>Trên 2 năm</span> 
                                    </label><br />
                                </div>
                            </div>
                            <div class="jf-widget jf-themecollapsetitle">
                                <div class="jf-widgettitle">
                                    <h3>Mức lương</h3>
                                    <span class="fa fa-chevron-right"></span>
                                </div>
                            </div>
                            <div class="jf-widget jf-themecollapsecontent">
                                <div class="jf-checkboxgroup">
                                    <label>
                                        <input style="width: 20px;height: 13px;" type="radio" checked="checked" name="radio2"><span class="checkmark"></span> <span>Tất cả  </span> 
                                    </label><br />
                                    <label>
                                        <input style="width: 20px;height: 13px;" type="radio" name="radio2"><span class="checkmark"></span><span>5 - 7 Triệu</span> 
                                    </label><br />
                                    <label>
                                        <input style="width: 20px;height: 13px;" type="radio" name="radio2"><span class="checkmark"></span><span>7 - 10 Triệu</span> 
                                    </label><br />
                                    <label>
                                        <input style="width: 20px;height: 13px;" type="radio" name="radio2"><span class="checkmark"></span><span>10 -15 Triệu</span> 
                                    </label><br />
                                    <label>
                                        <input style="width: 20px;height: 13px;" type="radio" name="radio2"><span class="checkmark"></span><span>Trên 15 Triệu</span> 
                                    </label><br />

                                </div>
                            </div>
                            <div class="jf-widget jf-themecollapsetitle">
                                <div class="jf-widgettitle">
                                    <h3>Giới tính</h3>
                                    <span class="fa fa-chevron-right"></span>
                                </div>
                            </div>
                            <div class="jf-widget jf-themecollapsecontent">
                                <div class="jf-checkboxgroup">
                                    <label>
                                        <input style="width: 20px;height: 13px;" type="radio" checked="checked" name="radio4"><span class="checkmark"></span> <span>Tất cả  </span> 
                                    </label><br />
                                    <label>
                                        <input style="width: 20px;height: 13px;" type="radio" name="radio4"><span class="checkmark"></span><span>Nam</span> 
                                    </label><br />
                                    <label>
                                        <input style="width: 20px;height: 13px;" type="radio" name="radio4"><span class="checkmark"></span><span>Nữ</span> 
                                    </label><br />
                                </div>
                            </div>
                            
                            <div class="jf-widget jf-themecollapsetitle">
                                <div class="jf-widgettitle">
                                    <h3>Thời gian</h3>
                                    <span class="fa fa-chevron-right"></span>
                                </div>
                            </div>
                            <div class="jf-widget jf-themecollapsecontent">
                                <div class="jf-checkboxgroup">
                                    <label>
                                        <input style="width: 20px;height: 13px;" type="radio" checked="checked" name="radio3"><span class="checkmark"></span> <span>Tất cả Thời gian </span> 
                                    </label><br />
                                    <label>
                                        <input style="width: 20px;height: 13px;" type="radio" name="radio3"><span class="checkmark"></span><span>Toàn thời gian</span> 
                                    </label><br />
                                    <label>
                                        <input style="width: 20px;height: 13px;" type="radio" name="radio3"><span class="checkmark"></span><span>Bán thời gian</span> 
                                    </label><br />
                                    <label>
                                        <input style="width: 20px;height: 13px;" type="radio" name="radio3"><span class="checkmark"></span><span>Thời vụ</span> 
                                    </label><br />
                                    
                                </div>
                            </div>

                            <div class="jf-widget jf-themecollapsetitle">
                                <div class="jf-widgettitle">
                                    <h3>Khu vực</h3>
                                    <span class="fa fa-chevron-right"></span>
                                </div>
                            </div>
                            <div class="jf-widget jf-themecollapsecontent">
                                <div class="jf-checkboxgroup">
                                    <div class="jf-searchholder" style="width: 100%;border: 1px solid #ddd;padding: 6px 0;margin-bottom: 10px;" >
                                        <span class="jf-select">
                                            <select data-placeholder="All" class="chosen-select locations" name="locations">
                                                <option value="">Hồ chí minh</option>
                                                <option value="aldershot">Hà nội </option>
                                                <option value="altrincham">Đà nẵng</option>
                                            </select>
                            
                                        </span>
                                    </div>
                                    <div class="jf-searchholder" style="width: 100%;border: 1px solid #ddd;padding: 6px 0;" >
                                    <span class="jf-select">
                                        <select data-placeholder="All" class="chosen-select locations" name="locations">
                                            <option value="">Quận 1</option>
                                            <option value="aberdeen">Quận 2</option>
                                            <option value="aldershot">Quận 3</option>
                                            <option value="altrincham">Quận 4</option>
                                        </select>
                          
                                    </span>
                                </div>
                                </div>
                                
                            </div>
                            <!-- <div class="jf-widget jf-Jobssearch">
                                <div class="jf-Jobssearchbtn">
                                    <a href="javascript:void(0);" class="jf-btn jf-active">Tìm việc</a>
                                </div>
                            </div> -->
                        </div>
                    </aside>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-9 float-left">
                    <div class="jf-innersectionhead">
                        <div class="jf-title">
                            <h2>Kết quả tìm kiếm</h2>
                            <span>có 1000 kết quả tìm kiếm</span>
                        </div>
                    </div>
                    <div class="jf-candidatessearchsvtwo">
                        <div class="jf-candidatessearcgrid jf-verticaltop">
                            <div class="jf-candidatessearch">
                                <figure class="jf-candidatescover">
                                    <img src="{{ asset('site/images/successstory/cover/img-01.jpg')}}" alt="img-description">	
                                </figure>
                                <figure>
                                    <img src="{{ asset('site/images/successstory/grid/img-01.jpg')}}" alt="image description">
                                </figure>
                                <div class="jf-employerdetails">
                                    <h3 style="text-align: center;"> <a href="#">CTY TNHH TMDV NHÀ LỘC PHÁT</a></h3>
                                    <h3 style="text-align: center;"><a style="margin-top: 10px;line-height: 31px;color: white" class="jf-btnjobtag jf-fulltimejob" >Hot</a><a style="padding: 2px 13px;font-size: 13px;line-height: 22px;float: right;margin-top: 10px;background-color: #ccc9c1;color: black;" href="javascript:void(0);" class="jf-btnjobtag jf-fulltimejob jf-btnlike "><i class="fa fa-heart-o"></i> quan tâm</a></h3>
                                    <!-- <h3 style="text-align: center;"><a style="padding: 2px 13px;font-size: 13px;line-height: 22px;float: right;margin-top: 10px;background: #ccc9c1;color: white;" href="javascript:void(0);" class="jf-btnjobtag jf-fulltimejob jf-btnlike jf-btnliked"><i class="fa fa-heart-o"></i> quan tâm</a></h3> -->

                                    <h4><span>Tên tiêu đề: Nhân viên kinh doanh</span></h4>
                                    <h4>
                                        <span><i class="lnr lnr-eye"></i>1 lượt xem</span>
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
                                    <img src="{{ asset('site/images/successstory/cover/img-01.jpg')}}" alt="img-description">	
                                </figure>
                                <figure>
                                    <img src="{{ asset('site/images/successstory/grid/img-01.jpg')}}" alt="image description">
                                </figure>
                                <div class="jf-employerdetails">
                                    <h3 style="text-align: center;"> <a href="#">CTY TNHH TMDV NHÀ LỘC PHÁT</a></h3>
                                    <h3 style="text-align: center;"><a style="margin-top: 10px;line-height: 31px;color: white" class="jf-btnjobtag jf-parttimejob" >Mới</a><a style="padding: 2px 13px;font-size: 13px;line-height: 22px;float: right;margin-top: 10px;background-color: #ccc9c1;color: black;" href="javascript:void(0);" class="jf-btnjobtag jf-fulltimejob jf-btnlike "><i class="fa fa-heart-o"></i> quan tâm</a></h3>

                                    <h4><span>Tên tiêu đề: Nhân viên kinh doanh</span></h4>
                                    <h4>
                                        <span><i class="lnr lnr-eye"></i>1 lượt xem</span>
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
                                    <img src="{{ asset('site/images/successstory/cover/img-01.jpg')}}" alt="img-description">	
                                </figure>
                                <figure>
                                    <img src="{{ asset('site/images/successstory/grid/img-01.jpg')}}" alt="image description">
                                </figure>
                                <div class="jf-employerdetails">


                                    <h3 style="text-align: center;"> <a href="#">CTY TNHH TMDV NHÀ LỘC PHÁT</a></h3>
                                    <h3 style="text-align: center;"><a style="margin-top: 10px;line-height: 31px;color: white" class="jf-btnjobtag jf-homebasejob" >Gấp</a><a style="padding: 2px 13px;font-size: 13px;line-height: 22px;float: right;margin-top: 10px;background-color: #ccc9c1;color: black;" href="javascript:void(0);" class="jf-btnjobtag jf-fulltimejob jf-btnlike "><i class="fa fa-heart-o"></i> quan tâm</a></h3>
                                    <h4><span>Tên tiêu đề: Nhân viên kinh doanh</span></h4>
                                    <h4>
                                        <span><i class="lnr lnr-eye"></i>1 lượt xem</span>
                                        <span><i class="lnr lnr-diamond"></i>Mức lương: 8 triệu/1 tháng</span>
                                        <span><i class="lnr lnr-briefcase"></i>Kinh nghiệm: trên 1 năm</span>
                                        <span><i class="lnr lnr-map-marker"></i>200/20D Ấp chánh 1, Tân xuân, Hóc môn</span>
                                        <span><i class="lnr lnr-tag"></i><a href="javascript:void(0);">nghành: kế toán</a></span>
                                    </h4>
                                </div>
                                <center><a href="javascript:void(0);" class="jf-btn jf-active">Nộp đơn ngay</a></center><br />
                            </div>
                        </div>
                    
                        <nav class="jf-pagination">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Main End-->

@endsection