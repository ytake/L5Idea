<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app['aspect.annotation.register']->registerAnnotations([
            app_path('Annotation/Reserve.php')
        ]);
        /** @var \Ytake\LaravelAspect\AspectManager $aspect */
        $aspect = $this->app['aspect.manager'];
        $aspect->register(\App\Modules\CacheableModule::class);
        $aspect->register(\App\Modules\CacheEvictModule::class);
        $aspect->register(\App\Modules\ReserveModule::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        if($this->app->environment() === 'local') {
            $this->app->register('Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider');
        }

        $this->app->bind(
            \App\Repositories\EntryRepositoryInterface::class,
            \App\Repositories\EntryRepository::class
        );
        $this->app->bind(
            \App\Repositories\Criteria\Entryable::class,
            \App\Repositories\Criteria\EntryDataAccessObject::class
        );

        $this->app->bind(
            \App\Repositories\ReserveRepositoryInterface::class,
            \App\Repositories\ReserveRepository::class
        );
    }
}
