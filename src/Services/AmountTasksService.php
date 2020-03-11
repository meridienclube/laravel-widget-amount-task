<?PHP
namespace ConfrariaWeb\WidgetAmountTask\Services;

use ConfrariaWeb\Widget\Contracts\WidgetServiceContract;

class WidgetAmountTaskService implements WidgetServiceContract
{

    public function __construct()
    {
        //
    }

    public function set($data)
    {
        $this->widget = $data;
        $this->pivot = $this->widget->pivot;
        $this->responsibles = option($this->widget->pivot, 'responsibles', []);
        $this->statuses = option($this->widget->pivot, 'statuses', []);
        $this->task_types = option($this->widget->pivot, 'task_types', []);
    }

    public function get()
    {
        $data['users'] = $this->responsibles;
        $data['statuses'] = $this->statuses;
        $data['task_types'] = $this->task_types;
        $data['mount'] = $this->mount();
        return $data;
    }

    public function mount()
    {
        $data = [];
        foreach ($this->responsibles as $k => $user) {
            $data[$k]['name'] = $user->name;
            $data[$k]['tasks'] = $user->tasks()
                ->whereIn('status_id', $this->statuses->pluck('id'))
                ->whereIn('type_id', $this->task_types->pluck('id'))
                ->count();

        }
        return $data;
    }

}
