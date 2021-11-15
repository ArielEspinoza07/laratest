<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;

/**
 * Class BreadcrumbComposer
 * @property array breadcrumb
 *
 * @package App\Http\View\Composers
 */
class BreadcrumbComposer
{

    /**
     * @var array
     */
    protected $breadcrumb;


    /**
     * BreadcrumbComposer constructor.
     */
    public function __construct()
    {
        $this->breadcrumb = [
            'home'       => [
                'name'  => __('Dashboard'),
                'route' => route('home'),
            ],
            'types' => [
                'name'  => __('Type Foods'),
                'route' => route('foods.types.index'),
            ],
            'permissions' => [
                'name'  => __('Permissions'),
                'route' => route('settings.permissions.index'),
            ],
            'roles'       => [
                'name'  => __('Roles'),
                'route' => route('settings.roles.index'),
            ],
            'users'       => [
                'name'  => __('Users'),
                'route' => route('settings.users.index'),
            ],
        ];
    }


    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $view->with(['breadCrumb' => $this->breadcrumb]);
    }
}
