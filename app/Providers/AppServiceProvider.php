<?php

namespace App\Providers;

use App\Repositories\Banner\BannerRepository;
use App\Repositories\Banner\EloquentBanner;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Category\EloquentCategory;
use App\Repositories\Content\ContentRepository;
use App\Repositories\Content\EloquentContent;
use App\Repositories\Employer\EloquentEmployer;
use App\Repositories\Employer\EmployerRepository;
use App\Repositories\Category_Job\EloquentCategoryJob;
use App\Repositories\Category_Job\CategoryJobRepository;
use App\Repositories\Job\EloquentJob;
use App\Repositories\Job\JobRepository;
use App\Repositories\News\EloquentNews;
use App\Repositories\News\NewsRepository;
use App\Repositories\Page\EloquentPage;
use App\Repositories\Page\PageRepository;
use App\Repositories\Position\EloquentPosition;
use App\Repositories\Position\PositionRepository;
use App\Repositories\User\EloquentUser;
use App\Repositories\User\UserRepository;
use App\Repositories\Info\EloquentInfo;
use App\Repositories\Info\InfoRepository;
use App\Repositories\Career\EloquentCareer;
use App\Repositories\Career\CareerRepository;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Blade;
use DB,View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->isLocal()) {
            $this->app->register(TelescopeServiceProvider::class);
        }

        $this->app->bind(BannerRepository::class,EloquentBanner::class);
        $this->app->bind(CategoryRepository::class,EloquentCategory::class);
        $this->app->bind(ContentRepository::class,EloquentContent::class);
        $this->app->bind(EmployerRepository::class,EloquentEmployer::class);
        $this->app->bind(JobRepository::class,EloquentJob::class);
        $this->app->bind(NewsRepository::class,EloquentNews::class);
        $this->app->bind(PageRepository::class,EloquentPage::class);
        $this->app->bind(PositionRepository::class,EloquentPosition::class);
        $this->app->bind(UserRepository::class,EloquentUser::class);
        $this->app->bind(InfoRepository::class,EloquentInfo::class);
        $this->app->bind(CategoryJobRepository::class,EloquentCategoryJob::class);
        $this->app->bind(CareerRepository::class,EloquentCareer::class);

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */

    public function boot()
    {
        Schema::defaultStringLength(191);

        Blade::component('admin.components.card', 'card');
        Blade::component('admin.components.card-table', 'cardTable');
        Blade::component('admin.components.switch', 'switchCom');
        Blade::component('admin.components.editor', 'editor');
        Blade::component('admin.components.tag', 'tag');
        Blade::component('admin.components.description', 'description');
    }
}
