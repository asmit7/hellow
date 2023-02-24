<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex justify m-2 p-2">
                <a href="{{ route('admin.menues.index') }}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">
                    Menu Index
                </a>
            </div>
            <!-- table -->
            <div class="p-2 m-2 bg-slate-100 rounded">
                <div class="mt-10 w-1/2 space-y-8 divide-gray-200">
                      <form method="POST" enctype="multipart/form-data" action="{{ route('admin.menues.store') }}">
                       @csrf
                        <div class="sm:col-span-6">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <div class="mt-1">
                                <input type="text" id="title" name="title" class="block w-full transition
                                duration-150 ease-in-out appearance  bg-white border  border-gray-400 rounded" />
                            </div>
                            @error('title')
                            <div class="text-sm text-red mb-2">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-6">
                            <label for="image" class="block text-sm font-medium text-gray-700">Menu Image</label>
                            <div class="mt-1">
                                <input type="file" id="image" name="image" class="p-2 block w-full transition
                                     duration-150 ease-in-out appearance bg-white border  border-gray-400 rounded" />
                            </div>
                            @error('image')
                            <div class="text-sm text-red mb-2">{{$message}}</div>
                            @enderror
                        </div>
                          <div class="sm:col-span-6">
                            <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                            <div class="mt-1">
                                <input type="number" id="price" min="0.00" max="10000" name="price" class="block w-full transition
                                 duration-150 ease-in-out appearance  bg-white border  border-gray-400 rounded" />
                            </div>
                            @error('price')
                            <div class="text-sm text-red mb-2">{{$message}}</div>
                            @enderror
                        </div> 
                        <div class="sm:col-span-6">
                            <label for="description" class="block text-sm font-medium text-gray-700">Deccription</label>
                            <div class="mt-1">
                                <textarea id="description" name="description" rows="3" class="block w-full shadow-sm focus:ring-indigo-500 duration-150 transition ease-in-out appearance
                                      bg-white border border-gray-400 rounded">
                             </textarea>
                             @error('description')
                            <div class="text-sm text-red mb-2">{{$message}}</div>
                            @enderror
                            </div>
                        </div>
                        <div class="sm:col-span-6 pt-5">
                            <label for="title" class="block text-sm font-medium text-gray-700">Categories</label>
                            <div class="mt-1">
                                <select id="categories" name="categories[]" class="form-multiselect block w-full mt-1" multiple>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> 
                        <div class="mt-6 p-4"> <button type="submit" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Store</button>
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>
</x-admin-layout>