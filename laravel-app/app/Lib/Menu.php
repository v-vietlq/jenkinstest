<?php 
function menu () {
    $menu['category']       =  array(
        'name'            => 'module.controller.category',
        'route'           => 'admin.category.index',
        'status'          => 'on',
        'request'         => 'admin/category/*',
        'icon'            => 'icon-list',
        'action'          => array(
            'index'       => array(
                'name'    => 'module.title.category_index',
                'route'   => 'admin.category.index',
                'status'  => 'on',
                'request' => 'admin/category/index',
            ),
            'create'      => array(
                'name'    => 'module.title.category_create',
                'route'   => 'admin.category.create',
                'status'  => 'on',
                'request' => 'admin/category/create',
            ),
        )
    );
    $menu['page']       =  array(
        'name'            => 'module.controller.page',
        'route'           => 'admin.page.index',
        'status'          => 'on',
        'request'         => 'admin/page/*',
        'icon'            => 'icon-folder-open',
        'action'          => array(
            'index'       => array(
                'name'    => 'module.title.page_index',
                'route'   => 'admin.page.index',
                'status'  => 'on',
                'request' => 'admin/page/index',
            ),
            'create'      => array(
                'name'    => 'module.title.page_create',
                'route'   => 'admin.page.create',
                'status'  => 'on',
                'request' => 'admin/page/create',
            ),
        )
    );

    $menu['employer']       =  array(
        'name'            => 'module.controller.employer',
        'route'           => 'admin.employer.index',
        'status'          => 'on',
        'request'         => 'admin/employer/*',
        'icon'            => 'icon-users',
        'action'          => array(
            'index'       => array(
                'name'    => 'module.title.employer_index',
                'route'   => 'admin.employer.index',
                'status'  => 'on',
                'request' => 'admin/employer/index',
            ),
            'create'      => array(
                'name'    => 'module.title.employer_create',
                'route'   => 'admin.employer.create',
                'status'  => 'on',
                'request' => 'admin/employer/create',
            ),
        )
    );

    $menu['career']       =  array(
        'name'            => 'module.controller.career',
        'route'           => 'admin.career.index',
        'status'          => 'off',
        'request'         => 'admin/career/*',
        'icon'            => 'icon-stack3',
        'action'          => array(
            'index'       => array(
                'name'    => 'module.title.career_index',
                'route'   => 'admin.career.index',
                'status'  => 'on',
                'request' => 'admin/career/index',
            ),
            'create'      => array(
                'name'    => 'module.title.career_create',
                'route'   => 'admin.career.create',
                'status'  => 'on',
                'request' => 'admin/career/create',
            ),
        )
    );

    $menu['job']       =  array(
        'name'            => 'module.controller.job',
        'route'           => 'admin.job.index',
        'status'          => 'on',
        'request'         => 'admin/job/*',
        'icon'            => 'icon-user-tie',
        'action'          => array(
            'index'       => array(
                'name'    => 'module.title.job_index',
                'route'   => 'admin.job.index',
                'status'  => 'on',
                'request' => 'admin/job/index',
            ),
            'create'      => array(
                'name'    => 'module.title.job_create',
                'route'   => 'admin.job.create',
                'status'  => 'on',
                'request' => 'admin/job/create',
            ),
        )
    );
    $menu['news']       =  array(
        'name'            => 'module.controller.news',
        'route'           => 'admin.news.index',
        'status'          => 'on',
        'request'         => 'admin/news/*',
        'icon'            => 'icon-new',
        'action'          => array(
            'index'       => array(
                'name'    => 'module.title.news_index',
                'route'   => 'admin.news.index',
                'status'  => 'on',
                'request' => 'admin/news/index',
            ),
            'create'      => array(
                'name'    => 'module.title.news_create',
                'route'   => 'admin.news.create',
                'status'  => 'on',
                'request' => 'admin/news/create',
            ),
        )
    );
    $menu['position']       =  array(
        'name'            => 'module.controller.position',
        'route'           => 'admin.position.index',
        'status'          => 'on',
        'request'         => 'admin/position/*',
        'icon'            => 'icon-location4',
        'action'          => array(
            'index'       => array(
                'name'    => 'module.title.position_index',
                'route'   => 'admin.position.index',
                'status'  => 'on',
                'request' => 'admin/position/index',
            ),
            'create'      => array(
                'name'    => 'module.title.position_create',
                'route'   => 'admin.position.create',
                'status'  => 'on',
                'request' => 'admin/position/create',
            ),
        )
    );
    $menu['banner']       =  array(
        'name'            => 'module.controller.banner',
        'route'           => 'admin.banner.index',
        'status'          => 'on',
        'request'         => 'admin/banner/*',
        'icon'            => 'icon-image4',
        'action'          => array(
            'index'       => array(
                'name'    => 'module.title.banner_index',
                'route'   => 'admin.banner.index',
                'status'  => 'on',
                'request' => 'admin/banner/index',
            ),
            'create'      => array(
                'name'    => 'module.title.banner_create',
                'route'   => 'admin.banner.create',
                'status'  => 'on',
                'request' => 'admin/banner/create',
            ),
        )
    );
    $menu['member']       =  array(
        'name'            => 'module.controller.user',
        'route'           => 'admin.user.index',
        'status'          => 'on',
        'request'         => 'admin/user/*',
        'icon'            => 'icon-user',
        'action'          => array(
            'index'       => array(
                'name'    => 'module.title.user_index',
                'route'   => 'admin.user.index',
                'status'  => 'on',
                'request' => 'admin/user/index',
            ),
            'create'      => array(
                'name'    => 'module.title.user_create',
                'route'   => 'admin.user.create',
                'status'  => 'on',
                'request' => 'admin/user/create',
            ),
        )
    );
    
    return $menu;
}
?>