<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class ViewServiceProvider extends ServiceProvider
{

    /**
     * @var array
     */
    private $composers = [
        '*' => [
            \App\Http\View\Composers\BreadcrumbComposer::class,
            \App\Http\View\Composers\NavBarComposer::class
        ],
    ];

    /**
     * @var array
     */
    private $exclude = [
        'auth',
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
        foreach ($this->composers as $route => $compose) {
            if (is_array($compose)) {
                foreach ($compose as $item) {
                    $this->addToView($route, $item);
                }

                continue;
            }
            $this->addToView($route, $compose);
        }
    }


    private function addToView($route, $compose)
    {
        View::composer($route, function ($view) use ($compose) {
            if ( ! Str::contains($view->getName(), $this->exclude)) {
                (new $compose())->compose($view);
            }
        });
    }
}
