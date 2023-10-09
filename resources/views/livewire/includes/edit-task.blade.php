<!-- Modal -->
<div class="modal fade" id="editTaskModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit task</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="updateTask()" method="post" id="">
                    <input type="hidden" wire:model="selectedTaskId">
                    <div class="mb-6">
                        <label for="title"
                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">*
                            Task title </label>
                        <input type="text" wire:model="title" value="{{old('title')}}" id="title" placeholder="Todo.."
                               class="bg-gray-100  text-gray-900 text-sm rounded block w-full p-2.5">
                        @error("title")
                        <span class="text-red-500 text-xs mt-3 block ">{{$message}}</span>
                        @enderror
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">*
                            Category </label>
                        <select wire:model="category_id" id="category"
                                class="bg-gray-100  text-gray-900 text-sm rounded block w-full p-2.5">
                            <option value="">Select Category</option>
                            @foreach(\App\Models\Category::getAllCategories() as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        <label for="Task description"
                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">*
                            Task description </label>
                        <textarea type="text" wire:model="description" id="description" placeholder="Task description.."
                                  class="bg-gray-100  text-gray-900 text-sm rounded block w-full p-2.5">{{old("description")}}</textarea>
                        @error("description")
                        <span class="text-red-500 text-xs mt-3 block ">{{$message}}</span>
                        @enderror
                        <label for="due_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">*
                            Due date </label>
                        <input type="date" wire:model="dueDate" id="due_date" placeholder="Due date.."
                               class="bg-gray-100  text-gray-900 text-sm rounded block w-full p-2.5">
                        @error("due_date")
                        <span class="text-red-500 text-xs mt-3 block ">{{$message}}</span>
                        @enderror
                    </div>

                    @if(session("success"))
                        <span class="text-green-500 text-xs">{{session("success")}}</span>
                    @endif
                    <button data-modal-hide="defaultModal" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit</button>
                </form>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>

@push("scripts")
    <script>
        window.addEventListener('showTaskEditModal', event => {
            $('#editTaskModal').modal('show');
        })
        window.addEventListener('hideTaskEditModal', event => {
            $('#editTaskModal').modal('hide');
        })
    </script>
@endpush
