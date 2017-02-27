<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Cafeteria;
use App\Repositories\MenuBot;
use Illuminate\Http\Request;

class ImportController extends Controller
{

    public function import(MenuBot $menus)
    {
        $menus->import();

        return;
    }

}
