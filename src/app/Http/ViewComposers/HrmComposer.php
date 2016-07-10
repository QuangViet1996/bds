<?php namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\UserRepository;
use LaravelAcl\Authentication\Classes\Menu\SentryMenuFactory;


class HrmComposer {

    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct() {
        // Dependencies automatically resolved by service container...
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view) {
    }
}
