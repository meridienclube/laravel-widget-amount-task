<?php
namespace ConfrariaWeb\WidgetWelcome\Databases\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        DB::table('widgets')->insert([
            'name' => 'Widget Amount Task',
            'view' => 'widgetAmountTask',
            'service' => 'WidgetAmountTask',
            'description' => 'Widget that brings a list of users and the number of tasks per period.'
        ]);
    }
}
