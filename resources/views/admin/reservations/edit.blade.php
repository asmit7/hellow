<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex justify m-2 p-2">
                <a href="{{ route('admin.reservations.index') }}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">
                    Reservation Index
                </a>
            </div>
            <!-- table -->
            <div class="p-2 m-2 bg-slate-100 rounded">
                <div class="mt-10 w-1/2 space-y-8 divide-gray-200">
                    <form method="POST" action="{{ route('admin.reservations.update',$reservation->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="sm:col-span-6">
                            <label for="first_name" class="block text-sm font-medium text-gray-700">Frist Name</label>
                            <div class="mt-1">
                                <input type="text" value="{{$reservation->first_name}}" id="first_name" name="first_name" class="block w-full transition
                                 duration-150 ease-in-out appearance  bg-white border  border-gray-400 rounded" />
                            </div>
                            @error('first_name')
                            <div class="text-sm text-red mb-2">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-6">
                            <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                            <div class="mt-1">
                                <input type="text" value="{{$reservation->last_name}}" id="last_name" name="last_name" class="block w-full transition
                                 duration-150 ease-in-out appearance  bg-white border  border-gray-400 rounded" />
                            </div>
                            @error('last_name')
                            <div class="text-sm text-red mb-2">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-6">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <div class="mt-1">
                                <input type="email" value="{{$reservation->email}}" id="email" name="email" class="block w-full transition
                                 duration-150 ease-in-out appearance  bg-white border  border-gray-400 rounded" />
                            </div>
                            @error('email')
                            <div class="text-sm text-red mb-2">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-6">
                            <label for="tel_number" class="block text-sm font-medium text-gray-700">Tel Number</label>
                            <div class="mt-1">
                                <input type="text"  value="{{$reservation->tel_number}}" id="tel_number" name="tel_number" class="block w-full transition
                                 duration-150 ease-in-out appearance  bg-white border  border-gray-400 rounded" />
                            </div>
                            @error('tel_number')
                            <div class="text-sm text-red mb-2">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-6">
                            <label for="gust_number"  class="block text-sm font-medium text-gray-700">Gust Number</label>
                            <div class="mt-1">
                                <input type="number" value="{{$reservation->gust_number}}" id="gust_number" name="gust_number" class="block w-full transition
                                 duration-150 ease-in-out appearance  bg-white border  border-gray-400 rounded" />
                            </div>
                            @error('gust_number')
                            <div class="text-sm text-red mb-2">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-6">
                            <label for="res_date" class="block text-sm font-medium text-gray-700">Reservation Date</label>
                            <div class="mt-1">
                                <input type="datetime-local" value="{{$reservation->res_date}}" id="res_date" name="res_date" class="block w-full transition
                                 duration-150 ease-in-out appearance  bg-white border  border-gray-400 rounded" />
                            </div>
                            @error('res_date')
                            <div class="text-sm text-red mb-2">{{$message}}</div>
                            @enderror
                        </div>
                       

                        <div class="sm:col-span-6 pt-5">
                            <label for="status" class="block text-sm font-medium text-gray-700">Table</label>
                            <div class="mt-1">
                                <select id="table_id" name="table_id" class="form-multiselect block w-full mt-1">

                                    @foreach($tables as $table )
                                    <option value="{{$table->id}}" >{{$table->name}}({{$table->guest_number}})
                                        ({{$table->guest_number}}) Guest
                                    </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        
                        <div class="mt-6 p-4">
                            <button type="submit" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Update</button>
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>
</x-admin-layout>