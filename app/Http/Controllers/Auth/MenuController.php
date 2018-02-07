<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    public function update(Request $request)
    {
        $menus = config('menus');
        $menus[$request->menu] = !$menus[$request->menu];
        $updated = "<?php" . PHP_EOL . "return " . var_export($menus, true) . ";" . PHP_EOL;
        return File::put(config_path("menus.php"), $updated);
    }
}
