<div>
    @include('livewire.includes.create-todo')
    @include('livewire.includes.search-task')
    <div id="todos-list">

        @foreach($tasks as $task)
            @include('livewire.includes.todo-card')
        @endforeach
        <div class="my-2">
            {{ $tasks->links() }}
        </div>
    </div>
    @include('livewire.includes.edit-task')
</div>


