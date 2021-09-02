<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'description'
    ];


    public function getStatusColorAttribute()
    {   
        switch ($this->status) {
            case 'onhold':
                return 'danger';
                break;
            case 'pending':
                return 'warning';
                break;
            default:
                return 'info';
                break;
        }
    }

     public static function boot() {
        parent::boot();

        static::creating (function($delivery){   
            $delivery->tracking_number = random_int(111, 999).time(); 
            
            //Mail::to($user->email)->send(new AccountActivationEmail($user));
        });
    }
}
