<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex justify m-2 p-2">
                <a href="{{ route('admin.categories.index') }}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">
                    Category Index
                </a>
            </div>
            <!-- table -->
            <div class="p-2 m-2 bg-slate-100 rounded">
                <div class="mt-10 w-1/2 space-y-8 divide-gray-200">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('admin.categories.store') }}">
                        @csrf
                        <div class="sm:col-span-6">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <div class="mt-1">
                                <input type="text" id="name" name="name" class="block w-full transition
                                      duration-150 ease-in-out appearance  bg-white border  border-gray-400 rounded" />
                            </div>
                            @error('name')
                            <div class="text-sm text-red mb-2">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-6">
                            <label for="image" class="block text-sm font-medium text-gray-700">Post Image</label>
                            <div class="mt-1">
                                <input type="file" id="image" name="image" class="p-2 block w-full transition
                                     duration-150 ease-in-out appearance bg-white border  border-gray-400 rounded" />
                            </div>
                            @error('image')
                            <div class="text-sm text-red mb-2">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-6">
                            <label for="description" class="block text-sm font-medium text-gray-700">Deccription</label>
                            <div class="mt-1">
                                <textarea id="description" name="description" rows="3" class="block w-full shadow-sm focus:ring-indigo-500 duration-150 transition ease-in-out appearance
                                      bg-white border border-gray-400 rounded">

                                   </textarea>
                            </div>
                            @error('description')
                            <div class="text-sm text-red mb-2">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mt-6 p-4"> <button type="submit" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Store</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>