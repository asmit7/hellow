<x-guest-layout>

    <!-- End Main Hero Content -->


    <!-- End Main Hero Content -->

    <section class="mt-8 bg-white">

        <div class="container w-full px-5 py-6 mx-auto">
            <div class="flex items-center min-h-screen bg-gray-58">
                <div class="flex-1 h-full max-w-4xl mx-auto bg-white lounded-lg shadow-xl">
                    <div class="flex flex-col md:flex-row">
                        <div class="h-32 md:h-auto md:w-1/2">
                            <img class="object-cover w-full h-full" src="https://cdn.pixabay.com/photo/2016/11/18/14/39/beans-1834984_960_720.jpg" alt="">
                        </div>
                        <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                            <div class="w-full">
                                <h3 class="mb-4 text-xl font-bold text-blue-600">Make Reservation</h3>
                                <div class="w-full bg-gray-200 rounded-full">
                                    <div class="w-40 p-1 text-xs font-medium leading-none text-center text-blue-100 bg-blue-600">
                                        Step-1
                                    </div>
                                </div>

                                <form method="POST" action="{{route('reservation.store.step.one')}}">
                                    @csrf
                                    <div class="mb-4 mt-4 sm:col-span-6">
                                        <label for="first_name" class="block text-sm font-medium text-gray-700">Frist Name</label>
                                        <div class="mt-1">
                                            <input type="text" value="{{$reservation->first_name ?? ''}}" id="first_name" name="first_name" class="block w-full transition
                                         duration-150 ease-in-out appearance  bg-white border  border-gray-400 rounded" />
                                        </div>
                                        @error('first_name')
                                        <div class="text-sm text-red mb-2">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-4 sm:col-span-6">
                                        <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                                        <div class="mt-1">
                                            <input type="text" value="{{$reservation->last_name ?? ''}}" id="last_name" name="last_name" class="block w-full transition
                                 duration-150 ease-in-out appearance  bg-white border  border-gray-400 rounded" />
                                        </div>
                                        @error('last_name')
                                        <div class="text-sm text-red mb-2">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="sm:col-span-6">
                                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                        <div class="mt-1">
                                            <input type="email" value="{{$reservation->email ?? ''}}" id="email" name="email" class="block w-full transition
                                 duration-150 ease-in-out appearance  bg-white border  border-gray-400 rounded" />
                                        </div>
                                        @error('email')
                                        <div class="text-sm text-red mb-2">{{$message}}</div>
                                        @enderror
                                    </div>

                                    <div class=" sm:col-span-6">
                                        <label for="tel_number" class="block text-sm font-medium text-gray-700">Tel Number</label>
                                        <div class="mt-1">
                                            <input type="text" value="{{$reservation->tel_number ?? ''}}" id="tel_number" name="tel_number" class="block w-full transition
                                            duration-150 ease-in-out appearance  bg-white border  border-gray-400 rounded" />
                                        </div>
                                        @error('tel_number')
                                        <div class="text-sm text-red mb-2">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-4 sm:col-span-6">
                                        <label for="gust_number" class="block text-sm font-medium text-gray-700">Gust Number</label>
                                        <div class="mt-1">
                                            <input type="number" value="{{$reservation->gust_number  ?? ''}}" id="gust_number" name="gust_number" class="block w-full transition
                                 duration-150 ease-in-out appearance  bg-white border  border-gray-400 rounded" />
                                        </div>
                                        @error('gust_number')
                                        <div class="text-sm text-red mb-2">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-4 sm:col-span-6">
                                        <label for="res_date" class="block text-sm font-medium text-gray-700">Reservation Date</label>
                                        <div class="mt-1">
                                            <input type="datetime-local"
                                            min="{{$min_date->format('Y-m-d\TH:i:s')}}"
                                            max="{{$max_date->format('Y-m-d\TH:i:s')}}"
                                             value="{{$reservation  ? $reservation->res_date->format('Y-m-d\TH:i:s') : ''}}" 
                                           
                                            id="res_date" name="res_date" class="block w-full transition
                                 duration-150 ease-in-out appearance  bg-white border  border-gray-400 rounded" />
                                        </div>
                                        @error('res_date')
                                        <div class="text-sm text-red mb-2">{{$message}}</div>
                                        @enderror
                                    </div>

                                    <div class="mt-6 p-4 flex justify-end">
                                        <button type="submit" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Next</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
    </section>




</x-guest-layout>