<?php

namespace ConfrariaWeb\WidgetAmountTask\Databases\Seeds;

use ConfrariaWeb\Option\Models\Option;
use ConfrariaWeb\Widget\Models\Widget;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $widget = Widget::updateOrCreate([
            'name' => 'Widget Amount Task',
            'view' => 'widgetAmountTask',
            'service' => 'WidgetAmountTask',
            'description' => 'Widget that brings a list of users and the number of tasks per period.'
        ]);
        $options = Option::whereIn('name', ['statuses', 'task_types', 'responsibles'])->get()->pluck('id');
        $widget->options()->sync($options);
    }
}
