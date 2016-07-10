<?php namespace  App\Http\ViewComposers;

use Illuminate\Support\ServiceProvider;
use LaravelAcl\Authentication\Classes\Menu\SentryMenuFactory;
use URL;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        // Using class based composers...
        view()->composer(
            'laravel-authentication-acl::admin.hrm.*', 'App\Http\ViewComposers\HrmComposer'
        );

        // Using Closure based composers...
        view()->composer('dashboard', function ($view) {
            //
        });
        
        //Menu items detail
         view()->composer('laravel-authentication-acl::admin.*', function ($view) {
            $menu_items_detail = $this->get_menu_items();
            view()->share('menu_items_detail', $menu_items_detail);
        });
        
        //Menu items detail
        view()->composer('laravel-authentication-acl::userhrm.*', function ($view) {
            $menu_items_detail = $this->get_menu_items();
            view()->share('menu_items_detail', $menu_items_detail);
        });
        
    }
    
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
    
    /**
     * 
     * @param type $route_name
     */
    public function get_menu_items() {
        $menu_items = SentryMenuFactory::create()->getItemListAvailable();
        $menu_items_detail = array();
        
        foreach($menu_items as $key => $item) {
            $menu_items_detail[$key] = array(
                'name' => $item->getName(),
                'sub_items' => $this->get_sub_menu_items_by_route($item->getRoute()),
                'icon' => $this->get_icon_item_by_route($item->getRoute())
            );
        }
        return $menu_items_detail;
    }
    public function get_icon_item_by_route($route_name) {
        $icon = '';
        switch ($route_name) {
            case 'dashboard':
                $icon = 'fa fa-tachometer';
                break;
            case 'hrm':
                $icon = 'fa fa-money';
                break;
            case 'trans':
                $icon = 'fa fa-money';
                break;
            case 'support':
                $icon = 'fa fa-question';
                break;
             case 'users':
                $icon = 'fa fa-user';
                break;
            case 'groups':
                $icon = 'fa fa-users';
                break;
            case 'permission':
                $icon = 'fa fa-key';
                break;
            case 'userhrm':
                $icon = 'fa fa-info';
                break;
        }
        return $icon;
    }
    public function get_sub_menu_items_by_route($route_name) {
        $sub_items = array();
        switch ($route_name) {
            case 'hrm':
                $sub_items = [
                    trans('front.routename_hrm_list') => [
                        "url" => URL::route('hrm.payrolls'),
                        "icon" => '<i class="fa fa-table"></i>'
                    ],
                    trans('front.routename_hrm_add') => [
                        'url' => URL::route('hrm.add_payroll'),
                        "icon" => '<i class="fa fa-credit-card"></i>'
                    ],
                    trans('front.routename_hrm_payrolltypes') => [
                        'url' => URL::route('hrm.payrolltypes'),
                        "icon" => '<i class="fa fa-list-ul"></i>'
                    ],
                    trans('front.routename_hrm_report') => [
                        'url' => URL::route('report.list'),
                        "icon" => '<i class="fa fa-file-text"></i>'
                    ],
                ];
                break;
            case 'dashboard':
                $sub_items = [
                    trans('front.routename_dashboard') => [
                        "url" => URL::route('dashboard.default'),
                        "icon" => '<i class="fa fa-user"></i>'
                    ],
                ];
                break;
            case 'users':
                $sub_items = [
                    trans('front.routename_user_list') => [
                        'url' => URL::route('users.list'),
                        "icon" => '<i class="fa fa-list-alt"></i>'
                    ],
                    trans('front.routename_user_edit') => [
                        'url' => URL::route('users.edit'),
                        "icon" => '<i class="fa fa-plus-circle"></i>'
                    ],
                    trans('front.routename_user_logout') => [
                        "url" => URL::route('user.logout'),
                        "icon" => '<i class="fa fa-sign-out"></i>'
                    ],
                ];
                break;
            case 'groups':
                $sub_items = [
                    trans('front.routename_group_list') => [
                        "url" => URL::route('groups.list'),
                        "icon" => '<i class="fa fa-list-alt"></i>'
                    ],
                    trans('front.routename_group_add') => [
                        'url' => URL::route('groups.edit'),
                        "icon" => '<i class="fa fa-plus-circle"></i>'
                    ]
                ];
                break;
            case 'permission':
                $sub_items = [
                    trans('front.routename_permission_list') => [
                        "url" => URL::route('permission.list'),
                        "icon" => '<i class="fa fa-list-alt"></i>'
                    ],
                    trans('front.routename_permission_add') => [
                        'url' => URL::route('permission.edit'),
                        "icon" => '<i class="fa fa-plus-circle"></i>'
                    ]
                ];
                break;
            case 'userhrm':
                $sub_items = [
                    trans('front.routename_userhrm_list') => [
                        "url" => URL::route('userhrm.list'),
                        "icon" => '<i class="fa fa-exchange"></i>'
                    ],
                ];
                break;
            
            case 'support':
                $sub_items = [
                    trans('supports.support.routename_menu') => [
                        "url" => URL::route('support.list'),
                        "icon" => '<i class="fa fa-info"></i>'
                    ],
                     trans('categories.category.routename_menu') => [
                        "url" => URL::route('categories.list'),
                        "icon" => '<i class="fa fa-tags"></i>'
                    ],
                ];
                break;
            case 'trans':
                $sub_items = [
                    trans('front.routename_trans_list') => [
                        "url" => URL::route('trans'),
                        "icon" => '<i class="fa fa-exchange"></i>'
                    ],
                ];
                break;
        }
        return $sub_items;
    }
}