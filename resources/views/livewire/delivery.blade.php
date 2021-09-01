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
                    
                    <td class="">
                        <span class="shadow-none badge outline-badge-primary">
                        {{ $delivery->status }}
                        </span>
                    </td>
                    <td>{{ $delivery->created_at->format('Y-m-d') }}</td>
                    <td> </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
