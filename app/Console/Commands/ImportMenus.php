<?php

namespace App\Console\Commands;

use App\Repositories\MenuBot;
use Illuminate\Console\Command;

class ImportMenus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'menu:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import the daily menu';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(MenuBot $menus)
    {
        $menus->import();
    }
}
