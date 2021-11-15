<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;

class NavBarComposer
{

    /**
     * @var array
     */
    protected $menu;


    public function __construct()
    {
        $this->menu = [
            [
                'name'    => __('Dashboard'),
                'icon'    => 'tim-icons icon-chart-pie-36',
                'display' => true,
                'route'   => route('home'),
            ],
            [
                'name'     => __('Foods'),
                'icon'     => 'tim-icons icon-basket-simple',
                'display'  => true,
                'route'    => 'foods',
                'sub_menu' => [
                    [
                        'name'  => __('Types'),
                        'icon'  => 'tim-icons icon-bullet-list-67',
                        'route' => route('foods.types.index'),
                    ]
                ],
            ],
            [
                'name'     => __('Settings'),
                'icon'     => 'tim-icons icon-settings',
                'display'  => true,
                'route'    => 'settings',
                'sub_menu' => [
                    [
                        'name'  => __('Users'),
                        'icon'  => 'tim-icons icon-book-bookmark sidebar-mini-icon',
                        'route' => route('settings.users.index'),
                    ],
                    [
                        'name'  => __('Roles'),
                        'icon'  => 'tim-icons icon-book-bookmark sidebar-mini-icon',
                        'route' => route('settings.roles.index'),
                    ],
                    [
                        'name'  => __('Permissions'),
                        'icon'  => 'tim-icons icon-book-bookmark sidebar-mini-icon',
                        'route' => route('settings.permissions.index'),
                    ],
                ],
            ],
        ];
    }


    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $view->with(['menu' => $this->menu]);
    }
}
