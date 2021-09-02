<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Delivery as Order;

class Delivery extends Component
{   
    public $order_by = 'desc';
	public $search; 
	public $start_date;
	public $end_date;

    protected $listeners = [
    'recordUpdated' => 'render',
    'remove' => 'delete'
    ]; 

    public function reset_filter()
    {
        $this->reset('start_date', 'end_date');
    }

    public function set_no_of_rows($no_of_rows)
    {  
        $this->resetPage();
        $this->no_of_rows = $no_of_rows;
    }

    public function changeStatus(Order $order, $status){
        $order->status = $status;
        $order->save();
    }

    public function delete(Order $order){
        $order->delete();
    }
  
    public function render()
    {
        $deliveries = Order::query();

    	$deliveries->when(!empty($this->search), function ($q) {
    		return $q->where('sender', 'LIKE', "%{$this->search}%")
    				->orWhere('email', 'LIKE', "%{$this->search}%")
    				->orWhere('status', 'LIKE', "%{$this->search}%")
    				->orWhere('phone', 'LIKE', "%{$this->search}%")
    				->orWhere('tracking_number', 'LIKE', "%{$this->search}%");
    				 
		});
        
        return view('livewire.delivery', [
            'deliveries' => $deliveries->orderBy('created_at', $this->order_by)->get()
        ])->layout('deliveries');
    }
}
