<?php
namespace ConfrariaWeb\WidgetAmountTask\Providers;

use ConfrariaWeb\WidgetAmountTask\Services\WidgetAmountTaskService;
use Illuminate\Support\ServiceProvider;

class WidgetAmountTaskServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../Views', 'widgetAmountTask');
    }

    public function register()
    {
        $this->app->bind('WidgetAmountTaskServiceService', function () {
            return new WidgetAmountTaskService();
        });
    }

}
