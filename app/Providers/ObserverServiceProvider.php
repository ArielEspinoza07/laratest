<?php

namespace App\Providers;

use App\Models\TypeFood;
use App\Models\User;
use App\Observers\TypeFoodObserver;
use App\Observers\UserObserver;
use Illuminate\Support\ServiceProvider;

class ObserverServiceProvider extends ServiceProvider
{

    /**
     * @var array
     */
    protected $observers = [
        TypeFood::class => TypeFoodObserver::class,
        User::class     => UserObserver::class,
    ];


    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }


    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        foreach ($this->observers as $model => $observer) {
            $model::observe($observer);
        }
    }
}
