<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Support\Str;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
		//
    }
	
    public function booking()
    {
        return view('booking');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function bookSeats()
    { 
        $user_email = "test@gmail.com";
		$user_choice = "T9";
		$no_of_booking = 6;	
		if($no_of_booking <=5){
			$seats = [];
			$prev_seats =$user_choice;
			for($i=0;$i<$no_of_booking;$i++){
				$seatcol = substr($user_choice,0,1);
				$seatrow = substr($user_choice,1);
				if($seatcol<="T"&& count($seats)<$no_of_booking){
					$seats[]=$user_choice++;
				}
				if($seatrow==9 && count($seats)<$no_of_booking){
					$seats[]= $seatcol."10";
					$user_choice++;
				}
			}
			$seatavail = false;
			$checkAvailable = true;
			if(!empty($seats) && count($seats)==$no_of_booking){
				$checkAvailable = $this->checkAvailable($seats);
			}
			
			if(!$checkAvailable ||count($seats)!=$no_of_booking){
				$seats = [];
				$seats[] = $prev_seats;
				for($i=1;$i<$no_of_booking;$i++){
					$prev_seats = substr($prev_seats,0,1).(substr($prev_seats,1)-1);
					if(substr($prev_seats,1) >0) {
						$seats[]=$prev_seats--;
					}
				}  
				if(!empty($seats) && count($seats)==$no_of_booking){
					$checkAvailable = $this->checkAvailable($seats);
					if($checkAvailable){ 
						$seatavail = true;							
					}
				}			
			}else if(count($seats)==$no_of_booking){
				$seatavail = true;				
			}
			if($seatavail){
				echo "Booking Confirmed, Seats are ".implode(" ,",$seats);
				$pnr_number = rand(0, 99999999);
				foreach($seats as $sn){
					DB::table('booking')->insert([
						'user_email' =>$user_email,
						'seat_number' =>$sn,
						'pnr_number' =>$pnr_number,
						'booking_date' =>date('m-d-Y'),
					]);
				}
			}else{
				echo "Booking failure";
			} 
		}else{
			echo "Booking failure because of maximum 5 tickets can book at a time.";
		} 
    }
	public function checkAvailable($seats)
	{ 
		$booking = DB::table('booking')->wherein('seat_number',$seats)->count();
		if($booking>0){
			return 0;
		}else{
			return 1;
		}
		
    }

}
