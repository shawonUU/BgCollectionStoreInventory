<a href="{{ route('buyer.list') }}" class="br-menu-link {{ isset($buyer_list) ? 'active' : '' }}">
    <div class="br-menu-item">
        <i class="fa fa-user"></i>
        <span class="menu-item-label">Buyer list</span>
    </div>
</a>
<a href="{{ route('order.list') }}" class="br-menu-link {{ isset($order_list) ? 'active' : '' }}">
    <div class="br-menu-item">
        <i class="fa fa-user"></i>
        <span class="menu-item-label">Order list</span>
    </div>
</a>
<a href="{{ route('style.index') }}" class="br-menu-link {{ isset($style_page) ? 'active' : '' }}">
    <div class="br-menu-item">
        <i class="fa fa-user"></i>
        <span class="menu-item-label">Style list</span>
    </div>
</a>
<a href="{{ route('stock_out_history') }}" class="br-menu-link {{ isset($stock_out_history) ? 'active' : '' }}">
    <div class="br-menu-item">
        <i class="menu-item-icon  icon ion-android-alarm-clock tx-24"></i>
        <span class="menu-item-label">Stock Out History</span>

    </div>
</a>

<a href="{{ route('knitting') }}" class="br-menu-link {{ isset($yarnBooking) ? 'active' : '' }}">
    <div class="br-menu-item">
        <i class="menu-item-icon  ionicons ion-briefcase tx-24"></i>
        <span class="menu-item-label">Yarn Booking</span>

    </div>
</a>
