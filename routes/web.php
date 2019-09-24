<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});

Route::prefix('auth')->group(function () {
    Route::name('auth.')->group(function () {
        Route::get('report','AuthController@report')->name('get.report');
        Route::get('login','AuthController@login')->name('get.login');
        Route::post('login','AuthController@post_login')->name('post.login');
        Route::get('forgot-password','AuthController@forgot')->name('get.forgot');
        Route::post('forgot-password','AuthController@post_forgot')->name('post.forgot');
        Route::get('reset-password/{token}','AuthController@reset_password')->name('get.reset');
        Route::get('change-password/{token}','AuthController@get_change_password')->name('get.change_password');
        Route::post('change-password/{token}','AuthController@post_change_password')->name('post.change_password');
        Route::get('logout','AuthController@logout')->name('get.logout');
    });
});

/**
 * Route for guest
 */
Route::namespace('Site')->group(function () {

        Route::name('site.')->group(function () {
            Route::get('/', 'HomeController@index')->name('index');//done
            Route::get('gioi-thieu', 'AboutController@index')->name('gioithieu');//done
            Route::get('nha-tuyen-dung', 'EmployerController@index')->name('nhatuyendung'); //done
            Route::get('chi-tiet-tuyen-dung/{slug}/{id}', 'EmployerController@detail')->name('detail_tuyendung'); //done
            Route::get('tim-kiem', 'CategoryController@timkiem')->name('timkiem');
            Route::get('cong-viec', 'JobController@index')->name('job');
            Route::get('chi-tiet-cong-viec/{slug}/{id}', 'HomeController@detail')->name('detail_job');//done
            Route::post('chi-tiet-cong-viec/{slug}/{id}', 'HomeController@contact')->name('contact');//done
            Route::get('dangky', 'AuthController@index')->name('dangky');
            Route::get('tin-tuc', 'NewsController@index')->name('tintuc'); //done
            Route::get('chi-tiet-tin/{slug}/{id}', 'NewsController@chitiet')->name('chitiet');  //done
            Route::get('tin-theo-danh-muc/{id}', 'NewsController@news_by_cate')->name('tin_danhmuc');  //done

            Route::post('searchJob', 'AjaxController@searchJob')->name('searchJob'); //Search cong viec
        });
});

/**
 * Route for member
 */
Route::namespace('Member')->group(function () {
    Route::name('member.')->group(function () {
        Route::prefix('member')->group(function () {
            Route::get('profile', 'PersonalController@profile')->name('profile');
            Route::get('applied', 'JobController@applied')->name('applied');
            Route::get('following', 'JobController@following')->name('following');
            Route::get('hoso', 'PersonalController@hoso')->name('hoso');
            Route::get('changepass', 'PersonalController@changepass')->name('changepass');
        });
    });
});



/**
 * Route for admin
 */
Route::namespace('Admin')->group(function () {
    Route::middleware(['checklogin'])->group(function () {
        Route::prefix('admin/ajax')->group(function () {
            Route::name('admin.ajax.')->group(function () {
                Route::post('search-employer','AjaxController@searchEmployer')->name('search_employer');
                Route::post('position','AjaxController@increasePosition')->name('increase_position');
                Route::post('update-position','AjaxController@updatePosition')->name('update_position');
            });
        });

        Route::prefix('admin/category')->group(function () {
            Route::name('admin.category.')->group(function () {
                Route::get('index','CategoryController@index')->name('index');
                Route::get('create','CategoryController@create')->name('create');
                Route::post('store','CategoryController@store')->name('store');
                Route::get('edit/{id}','CategoryController@edit')->name('edit');
                Route::post('update/{id}','CategoryController@update')->name('update');
                Route::get('destroy/{id}','CategoryController@destroy')->name('destroy');
            });
        });

        Route::prefix('admin/page')->group(function () {
            Route::name('admin.page.')->group(function () {
                Route::get('index','PageController@index')->name('index');
                Route::get('create','PageController@create')->name('create');
                Route::post('store','PageController@store')->name('store');
                Route::get('edit/{id}','PageController@edit')->name('edit');
                Route::post('update/{id}','PageController@update')->name('update');
                Route::get('destroy/{id}','PageController@destroy')->name('destroy');
            });
        });

        Route::prefix('admin/content')->group(function () {
            Route::name('admin.content.')->group(function () {
                Route::get('{pageid}/index','ContentController@index')->name('index');
                Route::get('{pageid}/create','ContentController@create')->name('create');
                Route::post('{pageid}/store','ContentController@store')->name('store');
                Route::get('{pageid}/edit/{id}','ContentController@edit')->name('edit');
                Route::post('{pageid}/update/{id}','ContentController@update')->name('update');
                Route::get('{pageid}/destroy/{id}','ContentController@destroy')->name('destroy');
            });
        });

        Route::prefix('admin/news')->group(function () {
            Route::name('admin.news.')->group(function () {
                Route::get('index','NewsController@index')->name('index');
                Route::get('create','NewsController@create')->name('create');
                Route::post('store','NewsController@store')->name('store');
                Route::get('edit/{id}','NewsController@edit')->name('edit');
                Route::post('update/{id}','NewsController@update')->name('update');
                Route::get('destroy/{id}','NewsController@destroy')->name('destroy');
            });
        });

        Route::prefix('admin/user')->group(function () {
            Route::name('admin.user.')->group(function () {
                Route::get('index','UserController@index')->name('index');
                Route::get('create','UserController@create')->name('create');
                Route::post('store','UserController@store')->name('store');
                Route::get('edit/{id}','UserController@edit')->name('edit');
                Route::post('update/{id}','UserController@update')->name('update');
                Route::get('destroy/{id}','UserController@destroy')->name('destroy');
            });
        });

        Route::prefix('admin/employer')->group(function () {
            Route::name('admin.employer.')->group(function () {
                Route::get('index','EmployerController@index')->name('index');
                Route::get('create','EmployerController@create')->name('create');
                Route::post('store','EmployerController@store')->name('store');
                Route::get('edit/{id}','EmployerController@edit')->name('edit');
                Route::post('update/{id}','EmployerController@update')->name('update');
                Route::get('destroy/{id}','EmployerController@destroy')->name('destroy');
                Route::get('job/{id}','EmployerController@job')->name('job');
            });
        });

        Route::prefix('admin/career')->group(function () {
            Route::name('admin.career.')->group(function () {
                Route::get('index','CareerController@index')->name('index');
                Route::get('create','CareerController@create')->name('create');
                Route::post('store','CareerController@store')->name('store');
                Route::get('edit/{id}','CareerController@edit')->name('edit');
                Route::post('update/{id}','CareerController@update')->name('update');
                Route::get('destroy/{id}','CareerController@destroy')->name('destroy');
            });
        });

        Route::prefix('admin/job')->group(function () {
            Route::name('admin.job.')->group(function () {
                Route::get('index','JobController@index')->name('index');
                Route::get('create','JobController@create')->name('create');
                Route::post('store','JobController@store')->name('store');
                Route::get('edit/{id}','JobController@edit')->name('edit');
                Route::post('update/{id}','JobController@update')->name('update');
                Route::get('destroy/{id}','JobController@destroy')->name('destroy');
            });
        });

        Route::prefix('admin/position')->group(function () {
            Route::name('admin.position.')->group(function () {
                Route::get('index','PositionController@index')->name('index');
                Route::get('create','PositionController@create')->name('create');
                Route::post('store','PositionController@store')->name('store');
                Route::get('edit/{id}','PositionController@edit')->name('edit');
                Route::post('update/{id}','PositionController@update')->name('update');
                Route::get('destroy/{id}','PositionController@destroy')->name('destroy');
            });
        });

        Route::prefix('admin/banner')->group(function () {
            Route::name('admin.banner.')->group(function () {
                Route::get('index','BannerController@index')->name('index');
                Route::get('create','BannerController@create')->name('create');
                Route::post('store','BannerController@store')->name('store');
                Route::get('edit/{id}','BannerController@edit')->name('edit');
                Route::post('update/{id}','BannerController@update')->name('update');
                Route::get('destroy/{id}','BannerController@destroy')->name('destroy');
            });
        });
    });
});