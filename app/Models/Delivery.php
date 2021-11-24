<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mail;
use App\Mail\DeliveryMail;

class Delivery extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender',
        'email',
        'phone',
        'location',
        'destination',
        'tracking_number',
        'current_location'
    ];


    public function getStatusColorAttribute()
    {   
        switch ($this->status) {
            case 'onhold':
                return 'danger';
                break;
            case 'in transit':
                return 'warning';
                break;
            case 'picked up':
                return 'primary';
                break;
            default:
                return 'info';
                break;
        }
    }

    public function getStatusImageAttribute()
    {   
        switch ($this->status) {
            case 'onhold':
                return 'onhold.png';
                break;
            case 'in transit':
                return 'in_transit.png';
                break;
            case 'picked up':
                return 'pickup.svg';
                break;
            default:
                return 'delivered.png';
                break;
        }
    }

    public function getShowNumberAttribute()
    {   
        switch ($this->status) {
            case 'onhold':
                return false;
                break;
            case 'in transit':
                return true;
                break;
            case 'picked up':
                return true;
                break;
            default:
                return false;
                break;
        }
    }

    public function getStatusMessageAttribute()
    {   
        switch ($this->status) {
            case 'onhold':
                return 'Your parcel is currently <b>on hold</b>. Kindly contact the customer Care Department on <a href="#">customercare@wolves-security.com</a>';
                break;
            case 'in transit':
                return 'Your parcel is currently <b>in transit</b>. Kindly contact the customer Care Department on <a href="#">customercare@wolves-security.com</a>';
                break;
            case 'picked up':
                return 'Your parcel has been <b>picked</b> up and is being prepared for delivery. Kindly contact the customer Care Department on <a href="#">customercare@wolves-security.com</a>';
                break;
            default:
                return 'Your parcel has been <b>delivered</b> successfully. Kindly contact the customer Care Department on <a href="#">customercare@wolves-security.com</a>';
                break;
        }
    }

     public static function boot() {
        parent::boot();
        static::creating (function($delivery){   
<<<<<<< HEAD
            $delivery->tracking_number = random_int(111, 999).random_int(111, 999).'WS'; 
        });

        static::saved (function($delivery){  
            //Mail::to($delivery->email)->send(new DeliveryMail($delivery));
=======
            $delivery->tracking_number = random_int(111, 999).random_int(111, 999).'WS';
            Mail::to($delivery->email)->send(new DeliveryMail($delivery)); 
        });

        static::updated (function($delivery){ 
            if($delivery->wasChanged('status')){
                Mail::to($delivery->email)->send(new DeliveryMail($delivery));
            }
>>>>>>> 6559f023fb70f593eb97f68242096e8ea3b2acdd
        });
    }
}
