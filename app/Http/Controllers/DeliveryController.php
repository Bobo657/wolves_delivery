<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use Illuminate\Http\Request;
use Mail;
use App\Mail\ContactMail;

class DeliveryController extends Controller
{
   
    public function show(Delivery $delivery)
    {
        return response()->json($delivery);
    }

    public function contact_us()
    {
        Mail::to('info@wolves-security.com')->send(new ContactMail(request()->all()));
    }
}
