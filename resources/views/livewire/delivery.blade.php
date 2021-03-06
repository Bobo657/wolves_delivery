<div class="layout-px-spacing">

    <div class="page-header">
        <div class="page-title">
            <h3> Delivery Dashboard 
                <button class="btn btn-primary mb-2 mr-2"  data-toggle="modal" data-target="#add-delivery">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square">
                    <polyline points="9 11 12 14 22 4"></polyline>
                    <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>Add New Delivery
                </button>
            </h3>

        </div>


        <div class="form-group">
            <input type="text" class="form-control" wire:model="search" aria-describedby="h-text1" placeholder="Seach.....">
        </div>
    </div>

    <div class="row layout-spacing">

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="table-responsive">
                <table class="table mb-4">
                <caption>List of all deliveries</caption>
                <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Location</th>
                            <th class="">Status</th>
                            <th>Date</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($deliveries as $delivery)
                        <tr>
                            <td class="text-center">{{ $delivery->tracking_number }}</td>
                            <td class="text-primary">{{ $delivery->sender }}</td>
                            <td>{{ $delivery->email }}</td>
                            <td>{{ $delivery->phone }}</td>
                            <td>{{ $delivery->location }}</td>
                            <td>{{ $delivery->destination }}</td>
                            <td>{{ $delivery->current_location }}</td>
                            <td class="">
                                <span class="shadow-none badge outline-badge-{{ $delivery->status_color}}">
                                {{ $delivery->status }}
                                </span>
                            </td>
                            <td>{{ $delivery->created_at->format('Y-m-d') }}</td>
                            <td class="text-center">
                            <div class="dropdown d-inline-block">
                                    <a class="dropdown-toggle" href="#" role="button" id="pendingTask" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical">
                                            <circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle>
                                            <circle cx="12" cy="19" r="1"></circle>
                                        </svg>
                                    </a>

                                    <div class="dropdown-menu left" aria-labelledby="pendingTask" style="will-change: transform;">
                                        <a class="dropdown-item" href="javascript:void(0);" wire:click.prevent="changeStatus({{$delivery->id}}, 'in transit')">
            
                                            In Transit
                                        </a>
                                        <a class="dropdown-item" href="javascript:void(0);" wire:click.prevent="changeStatus({{$delivery->id}}, 'onhold')">
                                            Onhold
                                        </a>
                                        <a class="dropdown-item" href="javascript:void(0);" wire:click.prevent="changeStatus({{$delivery->id}}, 'delivered')">
                                            Delivered
                                        </a>
                                        <a class="dropdown-item" href="javascript:void(0);" wire:click.prevent="$emitTo('edit-delivery', 'get_delivery', '{{$delivery->id}}')">
                                            Edit 
                                        </a>
                                        <a class="dropdown-item" href="javascript:void(0);" wire:click.prevent="delete({{ $delivery->id }})">
                                            Delete
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            @livewire('edit-delivery')
            @livewire('add-delivery')
        </div>
    </div>
</div>