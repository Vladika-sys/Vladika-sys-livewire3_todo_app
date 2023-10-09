<div class="container content py-6 mx-auto">
    <div class="mx-auto">
        <div id="create-form" class="hover:shadow p-6 bg-white border-blue-500 border-t-2">
            <div class="flex ">
                <h2 class="font-semibold text-lg text-gray-800 mb-5">Create New Todo</h2>
            </div>
            <div>
                <form>
                    <div class="mb-6">
                        <label for="title"
                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">*
                            Todo </label>
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
                    <button wire:click.prevent="createToDo" type="submit"
                            class="px-4 py-2 bg-blue-500 text-white font-semibold rounded hover:bg-blue-600">Create task
                    </button>

                    @if(session("success"))
                    <span class="text-green-500 text-xs">{{session("success")}}</span>
                    @endif

                </form>
            </div>
        </div>
    </div>
</div>
