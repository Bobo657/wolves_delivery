<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Delivery as Order;

class AddDelivery extends Component
{

	public  $delivery = false;
    public  $sender;
    public  $email;
    public  $phone;
    public  $destination;
    public  $location;
    public  $description;

    public function update()
    {
       $data =  $this->validate([
		            'phone' => 'required',
		            'sender' => 'required',
                    'location' => 'required',
		            'destination' => 'required',
                    'description' => 'required',
		            'email' => 'required'
		        ]);

        Order::create($data);

        $this->reset();
        $this->emit('closeModals');
        $this->emit('recordUpdated');
        $this->emit('notify', 'Save succesfully');
    }

    public function render()
    {
        return view('livewire.add-delivery');
    }
}
