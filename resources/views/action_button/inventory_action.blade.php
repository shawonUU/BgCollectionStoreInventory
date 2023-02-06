<div class="dropdown show">
    @if ((auth()->user()->role_id == 2 && auth()->user()->id == $inventory->created_by) or (auth()->user()->role_id==6))
    <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        Action
    </a>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <a id="booking_btn" href="{{ route('boking_histories', Crypt::encrypt($inventory->id)) }}"
            class="dropdown-item">Booking History</a>
        <a id="stockin_btn" href="{{ route('stock_histories', Crypt::encrypt($inventory->id)) }}"
            class="dropdown-item">Stock History</a>

            <a href="{{ route('booking.edit', Crypt::encrypt($inventory->id)) }}" class="dropdown-item">Edit Booking</a>
        @endif
    </div>
</div>
