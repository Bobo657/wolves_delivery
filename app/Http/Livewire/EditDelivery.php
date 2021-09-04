<?php

namespace App\Http\Livewire;
use App\Models\Delivery as Order;
use Livewire\Component;

class EditDelivery extends Component
{
    protected $listeners = ['get_delivery' => 'get_delivery'];

	public  $delivery = false;
    public  $sender;
    public  $email;
    public  $phone;
    public  $destination;
    public  $location;
    public  $current_location;

    public function get_delivery(Order $delivery)
    {	
       
        $this->resetErrorBag();

    	$this->delivery = $delivery;
    	$this->current_location = $delivery->current_location;
        $this->sender  = $delivery->sender;
    	$this->email = $delivery->email;
    	$this->phone = $delivery->phone;
        $this->location = $delivery->location;
        $this->destination = $delivery->destination;
        $this->emit('showModal', '#edit-delivery');
    }

    public function update()
    {
       $data =  $this->validate([
		            'phone' => 'required',
		            'sender' => 'required',
                    'location' => 'required',
		            'destination' => 'required',
                    'current_location' => 'required',
		            'email' => 'required'
		        ]);

        $this->delivery->update($data);

        $this->reset();
        $this->emit('closeModals');
        $this->emit('recordUpdated');
        $this->emit('notify', 'Update succesfully');
    }

    public function render()
    {
        return view('livewire.edit-delivery');
    }
}
