<ul class="list-group">

    <li class="list-group-item list-group-item-action active">
        <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">Tarefas X Usuários</h5>
            <small>{{ date('d/m/Y') }}</small>
        </div>
        <p class="mb-1">
            Lista dos usuário {{ $users->implode('name', ', ') }},
            com tarefas de tipos {{ $task_types->implode('name', ', ') }}
            e status {{ $statuses->implode('name', ', ') }}.
        </p>
        <small>Widget para visualização de quantidade de tarefas por usuário</small>
    </li>

    @foreach($mount as $m)
    <li class="list-group-item d-flex justify-content-between align-items-center">
        {{ $m['name'] }}
        <span class="badge badge-primary badge-pill">{{ $m['tasks'] }}</span>
    </li>
    @endforeach
</ul>