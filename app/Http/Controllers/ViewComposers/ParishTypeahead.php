<?php

namespace App\Http\ViewComposers;

use Facades\App\Parish;
use Illuminate\View\View;

class ParishTypeahead
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('parishes', Parish::typeahead());
    }

}
