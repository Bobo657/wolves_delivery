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
    		return $q->where('name', 'LIKE', "%{$this->search}%")
    				->orWhere('package', 'LIKE', "%{$this->search}%")
    				->orWhere('state', 'LIKE', "%{$this->search}%")
    				->orWhere('address', 'LIKE', "%{$this->search}%")
    				->orWhere('alternate_phone', 'LIKE', "%{$this->search}%")
    				->orWhere('phone', 'LIKE', "%{$this->search}%");
    				 
		})->when(!empty($this->start_date), function ($q) {
    		return $q->where('created_at', '>=', $this->start_date);
		})->when(!empty($this->end_date), function ($q) {
    		return $q->where('created_at', '<=', $this->end_date);
		});
        
        return view('livewire.delivery', [
            'deliveries' => $deliveries->orderBy('created_at', $this->order_by)->get()
        ])->layout('deliveries');
    }
}
