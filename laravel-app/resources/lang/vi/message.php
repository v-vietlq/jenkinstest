<?php

$data['user']                 =  [
    'create_success'          => 'Thêm thành viên thành công.',
    'edit_success'            => 'Cập nhật thành viên thành công.',
    'delete_success'          => 'Xóa thành viên thành công.',
    
    'email_required'          => 'Vui lòng nhập email.',
    'email_email'             => 'Vui lòng nhập đúng định dạng email.',
    'email_unique'            => 'Email này đã tồn tại trong hệ thống.',
    'password_required'       => 'Vui lòng nhập mật khẩu',
    'password_confirmed'      => 'Xác nhận mật khẩu không trùng khớp',
    'password_min'            => 'Chiều dài mật khẩu ít nhất 6 ký tự',
    'fullname_required'       => 'Vui lòng nhập họ tên thành viên',
    'phone_required'          => 'Vui lòng nhập điện thoại thành viên'
];

$data['category']             =  [
    'create_success'          => 'Thêm thể loại thành công.',
    'edit_success'            => 'Cập nhật thể loại thành công.',
    'delete_success'          => 'Xóa thể loại thành công.',
    'delete_fail'             => 'Không thể xóa thể loại vì chứa thể loại con.',

    'name_vi_required'        => 'Vui lòng nhập tên thể loại.',
    'name_vi_unique'          => 'Thể loại này đã tồn tại trong hệ thống.',
    'slug_vi_required'        => 'Vui lòng nhập tiêu đề không dấu.'
];

$data['employer']             =  [
    'create_success'          => 'Thêm nhà tuyển dụng thành công.',
    'edit_success'            => 'Cập nhật nhà tuyển dụng thành công.',
    'delete_success'          => 'Xóa nhà tuyển dụng thành công.',
    'delete_fail'             => 'Không thể xóa nhà tuyển dụng này vì chứa các việc làm',

    'name_vi_required'        => 'Vui lòng nhập tên nhà tuyển dụng.',
    'name_vi_unique'          => 'Tên nhà tuyển dụng này đã tồn tại trong hệ thống.',
    'slug_vi_required'        => 'Vui lòng nhập tên nhà tuyển dụng không dấu.',
    'viewed_required'         => 'Vui lòng nhập lượt xem nhà tuyển dụng',
];

$data['career']               =  [
    'create_success'          => 'Thêm ngành nghề thành công.',
    'edit_success'            => 'Cập nhật ngành nghề thành công.',
    'delete_success'          => 'Xóa ngành nghề thành công.',
    'delete_fail'             => 'Không thể xóa ngành nghề này vì chứa các việc làm',

    'name_vi_required'        => 'Vui lòng nhập tên ngành nghề.',
    'name_vi_unique'          => 'Tên ngành nghề này đã tồn tại trong hệ thống.',
    'slug_vi_required'        => 'Vui lòng nhập tên ngành nghề không dấu.',
    'viewed_required'         => 'Vui lòng nhập lượt xem ngành nghề',
];

$data['job']                  =  [
    'create_success'          => 'Thêm công việc thành công.',
    'edit_success'            => 'Cập nhật công việc thành công.',
    'delete_success'          => 'Xóa công việc thành công.',
    'no_category'             => 'Vui lòng nhập dữ liệu thể loại',
    'no_employer'             => 'Vui lòng nhập dữ liệu nhà tuyển dụng',

    'name_vi_required'        => 'Vui lòng nhập tên công việc.',
    'name_vi_unique'          => 'Tên công việc này đã tồn tại trong hệ thống.',
    'slug_vi_required'        => 'Vui lòng nhập tên công việc không dấu.',
    'viewed_required'         => 'Vui lòng nhập lượt xem công việc',
    'employer_id_required'    => 'Vui lòng chọn nhà tuyển dụng',
    'category_required'       => 'Vui lòng chọn ít nhất 1 thuộc tính cho công việc',
    'city_required'           => 'Vui lòng chọn thành phố'
];

$data['page']                 =  [
    'create_success'          => 'Thêm trang thành công.',
    'edit_success'            => 'Cập nhật trang thành công.',
    'delete_success'          => 'Xóa trang thành công.',

    'title_vi_required'       => 'Vui lòng nhập tên trang.',
    'title_vi_unique'         => 'Tên trang này đã tồn tại trong hệ thống.',
    'slug_vi_required'        => 'Vui lòng nhập tên trang không dấu.',
];

$data['content']              =  [
    'create_success'          => 'Thêm nội dung thành công.',
    'edit_success'            => 'Cập nhật nội dung thành công.',
    'delete_success'          => 'Xóa nội dung thành công.',

    'code_required'           => 'Vui lòng nhập mã code nội dung.',
    'code_unique'             => 'Mã code này đã tồn tại trong hệ thống.',
    'content_vi_required'     => 'Vui lòng nhập tên nội dung.',
    
];

$data['news']                 =  [
    'create_success'          => 'Thêm tin tức thành công.',
    'edit_success'            => 'Cập nhật tin tức  thành công.',
    'delete_success'          => 'Xóa tin tức  thành công.',

    'title_vi_required'       => 'Vui lòng nhập tiêu đề tin tức.',
    'title_vi_unique'         => 'Tiêu đề tin tức này đã tồn tại trong hệ thống.',
    'slug_vi_required'        => 'Vui lòng nhập tiêu đề không dấu.'
];

$data['auth']                 =  [
    'login_success'           => 'Đăng nhập thành công.',
    'login_fail'              => 'Đăng nhập thất bại.',
    'logout_success'          => 'Đăng xuất thành công.',
    'logout_fail'             => 'Bạn chưa đăng nhập.',
    'sent_success'            => 'Gửi email khôi phục mật khẩu thành công',
    'change_password_success' => 'Cập nhật mật khẩu thành công.',
    'token_invalid'           => 'Mã thay đổi mật khẩu không chính xác',

    'email_required'          => 'Vui lòng nhập email.',
    'email_email'             => 'Vui lòng nhập đúng định dạng email.',
    'email_exists'            => 'Email này không tồn tại trong hệ thống.',
    'password_required'       => 'Vui lòng nhập mật khẩu.',
    'password_required'       => 'Vui lòng nhập mật khẩu.',
    'password_confirmed'      => 'Xác nhận mật khẩu không trùng khớp.',
    'password_min'            => 'Chiều dài mật khẩu ít nhất 6 ký tự.',
];
return $data;
