<?php

namespace App\Http\ViewComposers;

use Facades\App\Client;
use Illuminate\View\View;

class ClientTypeahead
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('clients', Client::typeahead());
    }

}
