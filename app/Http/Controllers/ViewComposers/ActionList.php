<?php

namespace App\Http\ViewComposers;

use Facades\App\Action;
use Illuminate\View\View;

class ActionList
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('actions', Action::getTypes()->pluck('type', 'id'));
    }

}
