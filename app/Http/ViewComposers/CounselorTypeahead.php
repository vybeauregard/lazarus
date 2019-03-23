<?php

namespace App\Http\ViewComposers;

use Facades\App\Counselor;
use Illuminate\View\View;

class CounselorTypeahead
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('counselors', Counselor::typeahead());
    }

}
