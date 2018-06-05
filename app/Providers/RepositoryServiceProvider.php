<?php

namespace App\Providers;
use App\Repositories\Visitors\IVisitorsRepository;
use App\Repositories\Visitors\VisitorRepository;
use Illuminate\Support\ServiceProvider;

/**
 * Class RepositoryServiceProvider
 * @package App\Providers
 */
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * @var array
     */
    protected $repositories = [
        IVisitorsRepository::class => VisitorRepository::class,
    ];

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->repositories as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        }
    }
}
