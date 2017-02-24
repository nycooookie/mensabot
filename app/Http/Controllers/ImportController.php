<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Cafeteria;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ImportController extends Controller
{

    public function index()
    {
        $api = "https://www.webservices.ethz.ch/gastro/v1/RVRI/Q1E1/meals/de/2017-01-17/lunch";

        $json = file_get_contents($api);
        $obj = json_decode($json);

        dd($obj);

        return;
    }

    public function import()
    {
        $date = Carbon::now()->toDateString();
        $api = 'https://www.webservices.ethz.ch/gastro/v1/RVRI/Q1E1/meals/de/' . $date . '/lunch';

        $json = file_get_contents($api);
        $obj = json_decode($json);

        foreach ($obj as $cafeteria) {

            Cafeteria::updateOrCreate([
                'id' => $cafeteria->id,
                'name' => $cafeteria->mensa]
            );

            foreach ($cafeteria->meals as $meal) {

                Menu::updateOrCreate([
                    'id' => $meal->id,
                    'name' => $meal->label,
                    'type' => $meal->type,
                    'description' => implode(PHP_EOL, $meal->description),
                    'cafeteria_id' => $cafeteria->id,
                    'date' => $date
                ]);

            }

        }

        return;
    }

}
