<?PHP

namespace ConfrariaWeb\WidgetAmountTask\Services;

class WidgetAmountTaskService
{

    protected $widget;
    protected $users;

    public function __construct($widget)
    {
        $this->widget = $widget['widget'];
        $this->pivot = $this->widget->pivot;
        $this->users = option($this->widget->pivot, 'users', []);

    }

    public function get()
    {
        return [
            'users' => $this->users(),
            'pivot' => $this->pivot
        ];
    }

    public function users()
    {
        foreach ($this->users as $user) {
            $user->tasks = resolve('TaskService')->where(['statuses' => option($this->pivot, 'statuses', []), 'types' => option($this->pivot, 'task_types', []), 'destinateds' => [$user->id]])->get();
        }
        return $this->users;
    }

}
