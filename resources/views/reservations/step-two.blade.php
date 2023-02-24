<x-guest-layout>
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
                                    <div class="w-100 p-1 rounded-lg text-xs font-medium leading-none text-center text-blue-100 bg-blue-600">
                                        Step-2
                                    </div>
                                </div>
                                <form method="POST" action="{{route('reservation.store.step.two')}}">
                                    @csrf
                                    <div class="mb-4 sm:col-span-6 pt-5">
                                        <label for="status" class="block text-sm font-medium text-gray-700">Table</label>
                                        <div class="mt-1">
                                            <select id="table_id" name="table_id" class="form-multiselect block w-full transition
                                            duration-150 ease-in-out appearance  bg-white border  border-gray-400 rounded">

                                                @foreach($tables as $table )
                                                <option value="{{$table->id}}">{{$table->name}}
                                                    ({{$table->guest_number}}) Guest
                                                </option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="mt-6 p-4 flex justify-end">
                                        <a href="{{route('reservation.step.one')}}" class="mr-2 px-4 py-2 bg-yellow-400 hover:bg-yellow-500 rounded-lg text-white">Privious</a>
                                        <button type="submit" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Make Reservation</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
    </section>




</x-guest-layout>