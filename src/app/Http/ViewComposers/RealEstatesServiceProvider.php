<?php

namespace App\Http\ViewComposers;

use Illuminate\Support\ServiceProvider;
use LaravelAcl\Authentication\Classes\Menu\SentryMenuFactory;
use URL, View;

class RealEstatesServiceProvider extends ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        //
    }

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot() {

        //Testimonials
        View::composer(['laravel-authentication-acl::admin.testimonials.*'], function ($view) {
            $view->with('sidebar_items', [
                "List" => [
                    "url" => URL::route('testimonials.list'),
                    "icon" => '<i class="fa fa-list"></i>'
                ],
                "Add testimonial" => [
                    "url" => URL::route('testimonials.add'),
                    "icon" => '<i class="fa fa-plus"></i>'
                ]
            ]);
        });
        
        //Real Estates
        View::composer(['laravel-authentication-acl::admin.realestates.*'], function ($view) {
            $view->with('sidebar_items', [
                "List" => [
                    "url" => URL::route('realestates.list'),
                    "icon" => '<i class="fa fa-list"></i>'
                ],
                "Add real estates" => [
                    "url" => URL::route('realestates.add'),
                    "icon" => '<i class="fa fa-plus"></i>'
                ],
                "Categories" => [
                    "url" => URL::route('categories.list'),
                    "icon" => '<i class="fa fa-tags"></i>'
                ],
            ]);
        });
        
        //Real Estates
        View::composer(['laravel-authentication-acl::admin.categories.*'], function ($view) {
            $view->with('sidebar_items', [
                "List" => [
                    "url" => URL::route('realestates.list'),
                    "icon" => '<i class="fa fa-list"></i>'
                ],
                "Add real estates" => [
                    "url" => URL::route('realestates.add'),
                    "icon" => '<i class="fa fa-plus"></i>'
                ],
                "Categories" => [
                    "url" => URL::route('categories.list'),
                    "icon" => '<i class="fa fa-tags"></i>'
                ],
            ]);
        });
    }

}
