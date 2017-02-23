<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImportController extends Controller
{

    public function index()
    {
        $api = "https://www.webservices.ethz.ch/gastro/v1/RVRI/Q1E1/meals/de/2017-01-17/lunch";

        $json = file_get_contents($api);
        $obj = json_decode($json);

        dd($obj);

        foreach ($obj as $mensa) {
            echo($mensa->mensa);
            dd($mensa);
            echo '<br>';
        }

        return;
    }

}
