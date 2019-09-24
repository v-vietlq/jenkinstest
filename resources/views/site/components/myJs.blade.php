<script language="JavaScript"  src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        searchJob();
        autoClick();
    });

     //Nhấn nút tìm kiếm để chọn theo từ khóa & ngành nghề
    function searchJob(){   
        $('#findBtn').click(function(){
            var search_key = $('#search_key').val();
            var career_position = $('#career_position').val(); 
            var thanhpho = $('#city').val();
            var quan = $('#district').val();
            var thanhpho_check = $('#city2').val();
            var quan_check = $('#district2').val();
            var nganhnghe = [];
            var kinhnghiem = [];
            var mucluong = [];
            var gioitinh = [];
            var thoigian = [];
            //Chọn category ngành nghề
            $('.Career').each(function(){
                if($(this).is(":checked")){
                    nganhnghe.push($(this).val());
                }
            });
            Final_nganhnghe = nganhnghe.toString();
            //Kết thúc category ngành nghề

            //Chọn category kinh nghiẹm
            $('.Experience').each(function(){
                if($(this).is(":checked")){
                    kinhnghiem.push($(this).val());
                }
            });
            Final_kinhnghiem = kinhnghiem.toString();
            //Kết thúc category kinh nghiệm

            //Chọn category mức lương
            $('.Salary').each(function(){
                if($(this).is(":checked")){
                    mucluong.push($(this).val());
                }
            });
            Final_mucluong = mucluong.toString();
            //Kết thúc category mức lương

            //Chọn category giới tính
            $('.Gender').each(function(){
                if($(this).is(":checked")){
                    gioitinh.push($(this).val());
                }
            });
            Final_gioitinh = gioitinh.toString();
            //Kết thúc category giới tính

            //Chọn category thời gian
            $('.Time').each(function(){
                if($(this).is(":checked")){
                    thoigian.push($(this).val());
                }
            });
            Final_thoigian = thoigian.toString();
            //Kết thúc category thời gian
            
            $.ajax({
                method: "POST",
                url: '{{ env('APP_URL') }}'+'/searchJob',
                data: { 
                        search_key : search_key,
                        career_position : career_position,
                        thanhpho : thanhpho,
                        quan : quan,
                        thanhpho_check: thanhpho_check,
                        quan_check : quan_check,
                        nganhnghe: Final_nganhnghe,
                        kinhnghiem: Final_kinhnghiem,
                        mucluong: Final_mucluong,
                        gioitinh: Final_gioitinh,
                        thoigian: Final_thoigian
                      },
                dataType: "json",
            })
            .done(function(data) {
                $('#job_replace').html(' ');
                if(data.length > 0){
                    document.getElementById("result_search").innerHTML = '@php  $locale = \App::getLocale();  @endphp @if($locale =='vi')<h2>Kết quả tìm kiếm</h2>'+
                            '<span>Có '+ data.length +' kết quả tìm kiếm</span> @else <h2>Search results</h2>'+
                            '<span>There are '+ data.length +' search results</span> @endif';

                    data.forEach(function (item) {
                        
                        item.forEach(function(value){
                            document.getElementById("job_replace").innerHTML +=
                            `<div class='jf-candidatessearcgrid jf-verticaltop'>
                            <div class='jf-candidatessearch'>
                                @php  $locale = \App::getLocale();  @endphp
                                @if($locale == 'vi')
                                    <a href="chi-tiet-cong-viec/${value.slug_vi}/${value.job_id}">
                                @else
                                    <a href="chi-tiet-cong-viec/${value.slug_en}/${value.job_id}">
                                @endif
                                    <figure class='jf-candidatescover'>
                                        <img src='{{ asset('site/images/successstory/cover/img-01.jpg')}}' alt='img-description'>	
                                    </figure>
                                    <figure>
                                        <img src='{{ asset('site/images/successstory/grid/img-01.jpg')}}' alt='image description'>
                                    </figure>
                                </a>
                                <div class='jf-employerdetails'>
                                    @if($locale == 'vi')
                                        <h3 style='text-align: center;'> <a href='chi-tiet-cong-viec/${value.slug_vi}/${value.job_id}'>
                                                ${value.employer_name_vi}
                                        </a></h3>
                                    @else
                                        <h3 style='text-align: center;'> <a href='chi-tiet-cong-viec/${value.slug_en}/${value.job_id}'>
                                                ${value.employer_name_en}
                                        </a></h3>
                                    @endif
                                    <h3 style='text-align: center;'><a style='margin-top: 10px;line-height: 31px;color: white' class='jf-btnjobtag jf-fulltimejob' >Hot</a><a style='padding: 2px 13px;font-size: 13px;line-height: 22px;float: right;margin-top: 10px;background-color: #ccc9c1;color: black;' href='javascript:void(0);' class='jf-btnjobtag jf-fulltimejob jf-btnlike '><i class='fa fa-heart-o'></i> quan tâm</a></h3>
                                    <!-- <h3 style='text-align: center;'><a style='padding: 2px 13px;font-size: 13px;line-height: 22px;float: right;margin-top: 10px;background: #ccc9c1;color: white;' href='javascript:void(0);' class='jf-btnjobtag jf-fulltimejob jf-btnlike jf-btnliked'><i class='fa fa-heart-o'></i> quan tâm</a></h3> -->
                                    
                                    @if($locale == 'vi')
                                        <h4><span>Tên tiêu đề: ${value.job_name_vi}</span></h4>
                                        <h4>
                                            <span><i class='lnr lnr-eye'></i> Lượt xem: ${value.viewed}</span>
                                            <span><i class='lnr lnr-diamond'></i>Mức lương: ${value.salary_vi} triệu/1 tháng</span>
                                            <span><i class='lnr lnr-briefcase'></i>Kinh nghiệm: ${value.years_experience} năm</span>
                                            <span><i class='lnr lnr-map-marker'></i>${value.place_work_vi}</span>
                                            <span><i class='lnr lnr-tag'></i>
                                                <a href='javascript:void(0);'>
                                                    Nghành: ${value.career_vi}
                                                </a>
                                            </span>
                                        </h4>
                                    @else
                                        <h4><span>Title Name: ${value.job_name_en}</span></h4>
                                        <h4>
                                            <span><i class='lnr lnr-eye'></i> Views: ${value.viewed}</span>
                                            <span><i class='lnr lnr-diamond'></i>Salary: ${value.salary_en} triệu/1 tháng</span>
                                            <span><i class='lnr lnr-briefcase'></i>Experience: ${value.years_experience} years</span>
                                            <span><i class='lnr lnr-map-marker'></i>${value.place_work_en}</span>
                                            <span><i class='lnr lnr-tag'></i>
                                                <a href='javascript:void(0);'>
                                                    Industry: ${value.career_en}
                                                </a>
                                            </span>
                                        </h4>
                                    @endif
                                </div>
                                <center><a href='javascript:void(0);' class='jf-btn jf-active'>Apply Now</a></center><br />
                            </div>
                        </div>`;
                        });
                    });
                }else{
                    document.getElementById("result_search").innerHTML = '@php  $locale = \App::getLocale();  @endphp @if($locale=='vi') <h2>Kết quả tìm kiếm</h2> @else <h2>Search results</h2> @endif';
                    document.getElementById("job_replace").innerHTML = '@php  $locale = \App::getLocale();  @endphp @if($locale=='vi') Không tìm thấy kết quả phù hợp @else No matching results were found @endif';
                }   
            });
        });
    }

    //Form check
    function autoClick(){
        $( ".category-check" ).change(function() {
            $("#findBtn").trigger('click'); //Auto click nút tìm kiếm 
            searchJob(); // Gọi lại hàm trên
        });
    }
</script>
