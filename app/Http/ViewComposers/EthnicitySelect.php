<?php

namespace App\Http\ViewComposers;

use DB;
use Illuminate\View\View;

class EthnicitySelect
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $ethnicities = DB::table('clients')
            ->selectRaw('DISTINCT ethnicity')
            ->whereNotIn('ethnicity', [''])
            ->orderBy('ethnicity')
            ->get()
            ->keyBy('ethnicity')
            ->keys();
        $view->with('ethnicities', $ethnicities);
    }

}
