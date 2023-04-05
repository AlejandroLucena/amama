<?php

declare(strict_types=1);

namespace Shared\Infrastructure\Persistence\Provider;

use Illuminate\Support\ServiceProvider;

class PersistenceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'DashboardContext\Post\Domain\Contract\PostRepository',
            'DashboardContext\Post\Infrastructure\Persistence\Eloquent\EloquentPostRepository'
        );
        $this->app->bind(
            'DashboardContext\Postcategory\Domain\Contract\PostcategoryRepository',
            'DashboardContext\Postcategory\Infrastructure\Persistence\Eloquent\EloquentPostcategoryRepository'
        );
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            PostRepository::class,
            PostcategoryRepository::class,
        ];
    }
}
