<?php
function thunho($noidung,$num){
$limit = $num - 1 ;
$str_tmp = '';
$arrstr = explode(" ", $noidung);
if ( count($arrstr) <= $num ) { return $noidung; }
if (!empty($arrstr)) {
for ( $j=0; $j< count($arrstr) ; $j++) {
$str_tmp .= " " . $arrstr[$j];
if ($j == $limit)
{ break; }
}
}
return $str_tmp.'...';
} 
?>
    <!--Tin tức sự kiện-->
    <section class="jf-sectionspace jf-haslayout">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="jf-sectionhead">
                        <h2>{{ trans('form.home.news_foot') }} &amp; {{ trans('form.home.event_foot') }}</h2>
                        <a class="jf-btnviewall" href="{{ route('site.tintuc') }}">{{ trans('form.home.see_all') }}</a>
                    </div>
                </div>
                <div class="jf-posts jf-blognews">
                    @foreach($news_footer as $item)
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 float-left">
                            <article class="jf-newsarticle">
                                @php $locale = \App::getLocale();  @endphp 
                                @if($locale == 'vi') 
                                    <a href="{{ route('site.chitiet',['id' => $item->id,'slug' => $item->slug_vi]) }}">
                                    <figure class="jf-newsimg">
                                        <img src="{{ asset('site/images/blognews/img-01.jpg')}}" alt="image description">
                                    </figure>
                                    </a>
                                    <div class="jf-postauthorname">
                                        <div class="jf-articlecontent">
                                            <div class="jf-articletitle">
                                                <center><h3><a href="{{ route('site.chitiet',['id' => $item->id,'slug' => $item->slug_vi]) }}">{{ $item->title_vi }}</a></h3></center>
                                            </div>
                                            <span>
                                                {{ thunho($item->intro_vi,20) }}
                                            </span>
                                        </div>
                                    </div>
                                    <ul class="jf-postarticlemeta">
                                        <li>
                                            <i class="lnr lnr-calendar-full"></i>
                                            <span>{{ date('d-m-Y', strtotime($item->created_at)) }}</span>
                                        </li>
                                        <li>
                                            <a href="{{ route('site.chitiet',['id' => $item->id,'slug' => $item->slug_vi]) }}"><i class="lnr lnr-eye"></i><span>{{ trans('form.home.detail') }}</span></a>
                                        </li>
                                    </ul>
                                @else 
                                    <a href="{{ route('site.chitiet',['id' => $item->id,'slug' => $item->slug_en]) }}">
                                        <figure class="jf-newsimg">
                                            <img src="{{ asset('site/images/blognews/img-01.jpg')}}" alt="image description">
                                        </figure>
                                        </a>
                                        <div class="jf-postauthorname">
                                            <div class="jf-articlecontent">
                                                <div class="jf-articletitle">
                                                    <center><h3><a href="{{ route('site.chitiet',['id' => $item->id,'slug' => $item->slug_en]) }}">{{ $item->title_en }}</a></h3></center>
                                                </div>
                                                <span>{{ $item->intro_en }}</span>
                                            </div>
                                        </div>
                                        <ul class="jf-postarticlemeta">
                                            <li>
                                                <i class="lnr lnr-calendar-full"></i>
                                                <span>{{ date('d-m-Y', strtotime($item->created_at)) }}</span>
                                            </li>
                                            <li>
                                                <a href="{{ route('site.chitiet',['id' => $item->id,'slug' => $item->slug_en]) }}"><i class="lnr lnr-eye"></i><span>{{ trans('form.home.detail') }}</span></a>
                                            </li>
                                        </ul>
                                @endif
                            </article>
                    </div>          
                    @endforeach
                </div>
            </div>
        </div>
    </section>
<footer id="jf-footer" class="jf-footer jf-haslayout">
    <div class="jf-footeraboutus">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-8 push-md-2 col-lg-8 push-lg-2">
                    <strong class="jf-logo"><a href="index.hrm"><img src="{{ asset('site/images/flogo.png')}}" alt="Footer Logo"></a></strong>
                    <div class="jf-description">
                        <p>Công ty chúng tôi luôn cung cấp những việc làm tốt nhất hiện nay</p>
                        <p>Công ty:Công ty tìm kiếm việc làm Sức Bật</p>
                        <p>Email: congtysucbat@gmail.com</p>
                        <p>Địa chỉ:27B Nguyễn Đình Chiểu, phường Đa Kao, quận 1, TP.HCM</p>
                        <p>Hotline: 00969 436 832</p>
                    </div>
                    <ul class="jf-socialiconssimple">
                        <li class="jf-facebook"><a href="javascript:void(0);"><i class="fa fa-facebook-f"></i></a></li>
                        <li class="jf-twitter"><a href="javascript:void(0);"><i class="fab fa-twitter"></i></a></li>
                        <li class="jf-youtube"><a href="javascript:void(0);"><i class="fab fa-youtube"></i></a></li>
                        <li class="jf-linkedin"><a href="javascript:void(0);"><i class="fab fa-linkedin-in"></i></a></li>
                        <li class="jf-bloggerb"><a href="javascript:void(0);"><i class="fab fa-blogger-b"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="jf-fourcolumns">
        <div class="container">
            <div class="row">
                <div class="jf-footercol jf-widgetjobarea">
                    <div class="jf-fwidgettitle"><h3><i class="lnr lnr-briefcase"></i> Jobs by Functional Area</h3></div>
                    <div class="jf-widgetcontent">
                        <ul>
                            <li><a href="javascript:void(0);">Software &amp; Web</a></li>
                            <li><a href="javascript:void(0);">Sales &amp; Business</a></li>
                            <li><a href="javascript:void(0);">Accounts &amp; Finance</a></li>
                            <li><a href="javascript:void(0);">Customer Support</a></li>
                            <li><a href="javascript:void(0);">Marketing</a></li>
                            <li><a href="javascript:void(0);">Telemarketing</a></li>
                            <li><a href="javascript:void(0);">Creative Design</a></li>
                            <li><a href="javascript:void(0);">Administration</a></li>
                            <li><a href="javascript:void(0);">Health &amp; Medicine</a></li>
                            <li><a href="javascript:void(0);">Engineering</a></li>
                            <li><a href="javascript:void(0);">Writer</a></li>
                            <li><a href="javascript:void(0);">Human Resources</a></li>
                            <li class="jf-viewmore"><a href="javascript:void(0);">+ View All</a></li>
                        </ul>
                    </div>
                </div>
                <div class="jf-footercol jf-widgetjobcity">
                    <div class="jf-fwidgettitle"><h3><i class="lnr lnr-location"></i> Jobs by City</h3></div>
                    <div class="jf-widgetcontent">
                        <ul>
                            <li><a href="javascript:void(0);">Los Angeles</a></li>
                            <li><a href="javascript:void(0);">Chicago</a></li>
                            <li><a href="javascript:void(0);">Houston</a></li>
                            <li><a href="javascript:void(0);">San Antonio</a></li>
                            <li><a href="javascript:void(0);">San Diego</a></li>
                            <li><a href="javascript:void(0);">San Francisco</a></li>
                            <li><a href="javascript:void(0);">Washington</a></li>
                            <li><a href="javascript:void(0);">Boston</a></li>
                            <li><a href="javascript:void(0);">Las Vegas</a></li>
                            <li><a href="javascript:void(0);">Atlanta</a></li>
                            <li><a href="javascript:void(0);">Miami</a></li>
                            <li><a href="javascript:void(0);">Virginia Beach</a></li>
                            <li class="jf-viewmore"><a href="javascript:void(0);">+ View All</a></li>
                        </ul>
                    </div>
                </div>
                <div class="jf-footercol jf-widgetjobtype">
                    <div class="jf-fwidgettitle"><h3><i class="lnr lnr-bookmark"></i> Jobs by Type</h3></div>
                    <div class="jf-widgetcontent">
                        <ul>
                            <li><a href="javascript:void(0);">Full Time</a></li>
                            <li><a href="javascript:void(0);">Internship</a></li>
                            <li><a href="javascript:void(0);">Part Time</a></li>
                            <li><a href="javascript:void(0);">Temporary/Contract</a></li>
                            <li><a href="javascript:void(0);">Freelance</a></li>
                            <li><a href="javascript:void(0);">Volunteer</a></li>
                        </ul>
                    </div>
                    <div class="jf-fwidgettitle jf-widgettiltshift"><h3><i class="lnr lnr-clock"></i> Jobs by Shifts</h3></div>
                    <div class="jf-widgetcontent">
                        <ul>
                            <li><a href="javascript:void(0);">Evening</a></li>
                            <li><a href="javascript:void(0);">Morning</a></li>
                            <li><a href="javascript:void(0);">Night</a></li>
                            <li><a href="javascript:void(0);">On Rotation</a></li>
                            <li><a href="javascript:void(0);">Hourly</a></li>
                        </ul>
                    </div>
                </div>
                <div class="jf-footercol jf-widgetusfulllinks">
                    <div class="jf-fwidgettitle"><h3><i class="lnr lnr-star-empty"></i> Useful Links</h3></div>
                    <div class="jf-widgetcontent">
                        <ul>
                            <li><a href="javascript:void(0);">About</a></li>
                            <li><a href="javascript:void(0);">Contact</a></li>
                            <li><a href="javascript:void(0);">Privacy Policy</a></li>
                            <li><a href="javascript:void(0);">RTL Version</a></li>
                            <li><a href="javascript:void(0);">Disclaimer</a></li>
                        </ul>
                    </div>
                    <div class="jf-fwidgettitle jf-widgettiltshift"><h3><i class="lnr lnr-smartphone"></i> Download Mobile App</h3></div>
                    <div class="jf-description">
                        <p>Consectetur adipisicing eliti seeiusmod tempor incididunt ut labore etnadolore magna aliqua uet enim minime veniam quis nostrud exercitation.</p>
                    </div>
                    <ul class="jf-btnappdowld">
                        <li><a href="javascript:void(0);"><img src="{{ asset('frontend/images/android-img.png')}}" alt="image description"></a></li>
                        <li><a href="javascript:void(0);"><img src="{{ asset('frontend/images/apple-img.png')}}" alt="image description"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div> -->
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15677.22494344761!2d106.699513!3d10.787841!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf6c2fa947cc7377!2sJob+Thom!5e0!3m2!1sen!2sus!4v1562820637837!5m2!1sen!2sus" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    <div class="jf-footerbottom">
        <a class="jf-btnscrolltop" href="javascript:void(0);"><i class="fa fa-angle-double-up"></i></a>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <p class="jf-copyrights">Copyright © 2019 <span>Jobthom.com</span> All Rights Reserved.</p>
                    <nav class="jf-addnav">
                        <ul>
                            <li><a href="javascript:void(0);">Design By salaweb.vn</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</footer>