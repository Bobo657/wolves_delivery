<div class="modal fade" wire:ignore.self  id="add-delivery" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Delivery</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group mb-4">
                        <label for="Sender Name">Sender Name</label>
                        <input type="text" wire:model.defer="sender" class="form-control" placeholder="Apartment, studio, or floor">
                    </div> 
                    <div class="form-row mb-4">
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input type="email" wire:model.defer="email" class="form-control" id="inputEmail4" placeholder="Email">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phone">Phone</label>
                            <input type="text" wire:model.defer="phone" class="form-control" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="location">From</label>
                        <input type="text" wire:model.defer="location" class="form-control">
                    </div>
                    <div class="form-group mb-4">
                        <label for="inputAddress2">Destination</label>
                        <input type="text" wire:model.defer="destination" class="form-control">
                    </div>
                    <div class="form-group mb-4">
                        <label for="inputAddress2">Current Location</label>
                        <input type="text" wire:model.defer="current_location" class="form-control">
                    </div> 
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                <button type="button" wire:click="update" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>