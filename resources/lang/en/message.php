<?php

$data['user']              =  [
    'create_success'       => 'Add successful members.',
    'edit_success'         => 'Successful member updates.',
    'delete_success'       => 'Delete member successfully.',
    
    'email_required'       => 'Please enter email.',
    'email_email'          => 'Please enter the correct email format.',
    'email_unique'         => 'This email already exists in the system.',
    'password_required'    => 'Please enter a password',
    'password_confirmed'   => 'Confirm password does not match',
    'password_min'         => 'Password length at least 6 characters',
    'fullname_required'    => 'Please enter member name',
    'phone_required'       => 'Please enter member phone'
];

$data['category']          =  [
    'create_success'       => 'Add the category successfully.',
    'edit_success'         => 'Update genre successfully.',
    'delete_success'       => 'Delete category successfully.',
    'delete_fail'          => 'Cannot remove the category because it contains subcategories.',

    'name_vi_required'     => 'Please enter a category name.',
    'name_vi_unique'       => 'This category already exists in the system.',
    'slug_vi_required'     => 'Please enter an unsigned title.'
];

$data['employer']          =  [
    'create_success'       => 'Add successful employers.',
    'edit_success'         => 'Successful employer updates.',
    'delete_success'       => 'Delete successful employers.',
    'delete_fail'          => 'This employer cannot be removed because it contains jobs',

    'name_vi_required'     => 'Please enter the employer name.',
    'name_vi_unique'       => 'This employer name already exists in the system.',
    'slug_vi_required'     => 'Please enter an unsigned employer name.',
    'viewed_required'      => 'Please enter employer views',
];

$data['career']            =  [
    'create_success'       => 'Add successful careers.',
    'edit_success'         => 'Successful career updates.',
    'delete_success'       => 'Delete successful careers.',
    'delete_fail'          => 'This career cannot be removed because it contains jobs',

    'name_vi_required'     => 'Please enter the career name.',
    'name_vi_unique'       => 'This career name already exists in the system.',
    'slug_vi_required'     => 'Please enter an unsigned career name.',
    'viewed_required'      => 'Please enter career views',
];

$data['job']               =  [
    'create_success'       => 'Add job successfully.',
    'edit_success'         => 'Successful job updates.',
    'delete_success'       => 'Delete successful job.',
    'no_category'          => 'Please enter category data',
    'no_employer'          => 'Please enter employer data',

    'name_vi_required'     => 'Please enter the job name.',
    'name_vi_unique'       => 'This job name already exists in the system.',
    'slug_vi_required'     => 'Please enter an unsigned job name.',
    'viewed_required'      => 'Please enter job views',
    'employer_id_required' => 'Please select an employer',
    'category_required'    => 'Please select at least 1 attribute for the job',
    'city_required'        => 'Please select a city'
];

$data['page']              =  [
    'create_success'       => 'Add the page successfully.',
    'edit_success'         => 'Update page successfully.',
    'delete_success'       => 'Delete successful page.',

    'title_vi_required'    => 'Please enter the page name.',
    'title_vi_unique'      => 'This page name already exists in the system.',
    'slug_vi_required'     => 'Please enter an unsigned page name.',
];

$data['content']           =  [
    'create_success'       => 'Add the page successfully.',
    'edit_success'         => 'Update page successfully.',
    'delete_success'       => 'Delete successful page.',

    'title_vi_required'    => 'Please enter the page name.',
    'title_vi_unique'      => 'This page name already exists in the system.',
    'slug_vi_required'     => 'Please enter an unsigned page name.',
];

$data['content']           =  [
    'create_success'       => 'Add content successfully.',
    'edit_success'         => 'Update content successfully.',
    'delete_success'       => 'Delete content successfully.',

    'code_required'        => 'Please enter the content code.',
    'content_vi_required'  => 'Please enter the content name.',
    'content_vi_unique'    => 'This content name already exists in the system.',
];
return $data;
