<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
	
	
    protected $fillable = [
		'booking_id','user_email','seat_number','pnr_number','booking_date','updated_on',
    ];
}
