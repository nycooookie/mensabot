<?php

namespace App\Repositories;

use App\User;
use App\Menu;
use App\Cafeteria;
use Carbon\Carbon;


class MenuBot
{

    public function getFavoriteMenus(User $user)
    {
        dd($user);
    }

    public function import()
    {
        $date = Carbon::today()->toDateString();
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
                    'description' => implode(' ', $meal->description),
                    'cafeteria_id' => $cafeteria->id,
                    'date' => Carbon::today()
                ]);
            }
        }
        return;
    }

}