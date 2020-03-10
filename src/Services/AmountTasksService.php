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
        $this->responsibles = option($this->widget->pivot, 'responsibles', [])->pluck('id');
        $this->statuses = option($this->widget->pivot, 'statuses', [])->pluck('id');
        $this->task_types = option($this->widget->pivot, 'task_types', [])->pluck('id');
    }

    public function get()
    {
        //
    }

    public function users()
    {
        foreach ($this->users as $user) {
            $user->tasks = resolve('TaskService')
                ->where([
                    'statuses' => $this->statuses,
                    'types' => $this->task_types,
                    'destinateds' => $this->responsibles
                ])
                ->get();
        }
        return $this->users;
    }

}
