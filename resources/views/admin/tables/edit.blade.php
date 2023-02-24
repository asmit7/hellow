<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex justify m-2 p-2">
                <a href="{{ route('admin.tables.index') }}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">
                    Table Index
                </a>
            </div>
            <!-- table -->
            <div class="p-2 m-2 bg-slate-100 rounded">
                <div class="mt-10 w-1/2 space-y-8 divide-gray-200">
                    <form method="POST" action="{{ route('admin.tables.update',$table->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="sm:col-span-6">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <div class="mt-1">
                                <input type="text" id="name" name="name" value="{{ $table->name }}" class="block w-full transition
                                 duration-150 ease-in-out appearance  bg-white border  border-gray-400 rounded" />
                            </div>
                            @error('name')
                            <div class="text-sm text-red mb-2">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-6">
                            <label for="guest_number" class="block text-sm font-medium text-gray-700">Guest Number</label>
                            <div class="mt-1">
                                <input type="number" id="guest_number" name="guest_number" value="{{ $table->guest_number }}" class="block w-full transition
                                 duration-150 ease-in-out appearance  bg-white border  border-gray-400 rounded" />
                            </div>
                            @error('guest_number')
                            <div class="text-sm text-red mb-2">{{$message}}</div>
                            @enderror
                        </div>
                       
                        <div class="sm:col-span-6 pt-5">
                            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                            <div class="mt-1">
                                <select id="status" name="status" class="form-multiselect block w-full mt-1">
                                    
                                @foreach(App\Enums\TableStatus::cases() as $status ) 
                                    <option value="{{$status->value}}" > {{$status->name}}</option>
                                   @endforeach
                                   
                                </select>
                            </div>
                        </div> 
                        <div class="sm:col-span-6 pt-5">
                            <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                            <div class="mt-1">
                                <select id="location" name="location" class="form-multiselect block w-full mt-1">
                                   @foreach(App\Enums\TableLocation::cases() as $location ) 
                                    <option value="{{$location->value}}" >{{$location->name}}</option>
                                   @endforeach
                                </select>
                            </div>
                        </div> 
                        <div class="mt-6 p-4"> 
                            <button type="submit" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Store</button>
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>
</x-admin-layout>