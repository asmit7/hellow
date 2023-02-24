<x-guest-layout>
  
    <!-- End Main Hero Content -->
   
  
    <!-- End Main Hero Content -->
  
    <section class="mt-8 bg-white">
       
        <div class="container w-full px-5 py-6 mx-auto">
            <div class="grid lg:grid-cols-4 gap-y-6">
                @foreach($categories  as $categorie ) 
                <div class="max-w-xs mx-4 mb-2 rounded-lg shadow-lg">
                    <img class="w-full h-48" src="{{ Storage::url($categorie->image)}}" alt="Image" />
                    <div class="px-6 py-4">
                        <a href="{{route('categories.show',$categorie->id)}}">
                        <h4 class="mb-3 text-xl hover:text-green-400 font-semibold tracking-tight text-green-600
                         uppercase">{{$categorie->name}}</h4>
                        </a>
                        
                      
                    </div>
                   
                </div>
               @endforeach

            </div>
        </div>
    </section>

 


</x-guest-layout>