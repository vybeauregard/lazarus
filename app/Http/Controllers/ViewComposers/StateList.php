<?php

namespace App\Http\ViewComposers;

use Facades\App\State;
use Illuminate\View\View;

class StateList
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('states', State::list());
    }

}
