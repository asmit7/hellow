<?php

namespace App\Http\Controllers\Frontend;

use App\Enums\TableStatus;
use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Table;
use App\Rules\DateBetween;
use App\Rules\TimeBetween;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class ReservationController extends Controller
{
    public function stepOne(Request $request)
    {
       $reservation = $request->session()->get('reservation'); 
       $min_date = Carbon::today();
       $max_date = Carbon::now()->addWeek();
        return view('reservations.step-one',compact('reservation','min_date','max_date'));
    }

    public function storeStepOne(Request $request)
    {
       // return $request;
        $validated = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required','email'],
            'tel_number' => ['required'],
            'res_date' => ['required','date',new DateBetween,new TimeBetween],
          //  'table_id' => ['required'],
            'gust_number' => ['required']
        ]);

        if(empty($request->session()->get('reservation'))){
         $reservation = new Reservation();
         $reservation->fill($validated);
         $request->session()->put('reservation',$reservation);
        }else{
            $reservation = $request->session()->get('reservation');
            $reservation->fill($validated);
            $request->session()->put('reservation',$reservation);
        };
        return redirect()->route('reservation.store.step.two');
//->with('success' ,'Reservation  deleted Successfully')
    }
    public function stepTwo(Request $request)
    {
       $reservation = $request->session()->get('reservation'); 
       

       $res_table_ids = Reservation::orderBy('res_date')->get()->filter(function($value) use($reservation){
             return $value->res_date->format('Y-m-d') == $reservation->res_date->format('Y-m-d'); 
       })->pluck('table_id'); 
      
       $tables = Table::where('status',TableStatus::Avaliable)
                 ->where('guest_number','>=',$reservation->gust_number)
                 ->whereNotIn('id',$res_table_ids)->get();

               //  return $tables;
        return view('reservations.step-two',compact('reservation','tables'));
    }

    public function storeStepTwo(Request $request)
    {
       $validated = $request->validate([
        'table_id' => ['required'],
       ]);

       $reservation = $request->session()->get('reservation');
       $reservation->fill($validated);
       $reservation->save();
       $request->session()->forget('reservation');
       return redirect()->route('reservations.thankyou');
    }


    public function thankYou()
    {
        return view('reservations.thank-you'); 
    }
}
