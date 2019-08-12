<aside>
    <div id="sidebar">
        <div class="sidebar fixed-top">
            <div class="brand">
                <a href="" class="d-flex justify-content-center align-items-center">
                    <img class="" src="{{ asset('logo/logo.png') }}" alt=""> &nbsp;<h4> BOOKINGKU </h1>
                </a>
            </div>
            <div class="d-flex justify-content-center">
                <div class="line-white"></div>
            </div>
            <div class="spacer-30"></div>
            <div class="content-side">
                <div class="content-item d-flex align-items-center">
                    <a href="{{ route('admin') }}" class="content-link">
                    <img class="logo" src="{{ asset('client/dashboard.png') }}">
                        Dashboard
                    </a>
                </div>
                <div class="content-item d-flex align-items-center">
                    <a href="{{ route('clientlist') }}" class="content-link">
                        <!-- <i class="far fa-address-card"></i> -->
                        <img class="logo" src="{{ asset('client/order.png')}}">
                        Order
                    </a>
                </div>
                <div class="content-item d-flex align-items-center">
                    <a href="{{ route('payment') }}" class="content-link">
                        <!-- <i class="far fa-credit-card"></i> -->
                        <img class="logo" src="{{ asset('client/location.png')}}">
                        Location
                    </a>
                </div>
                <div class="content-item d-flex align-items-center">
                    <a href="{{ route('payment') }}" class="content-link">
                        <!-- <i class="far fa-credit-card"></i> -->
                        <img class="logo" src="{{ asset('client/field.png')}}" >
                        Field
                    </a>
                </div>
                <div class="content-item d-flex align-items-center">
                    <a href="{{ route('payment') }}" class="content-link">
                        <!-- <i class="far fa-credit-card"></i> -->
                        <img class="logo" src="{{ asset('client.schedule.png')}}">
                        Schedule
                    </a>
                </div>
            </div>
        </div>
    </div>
</aside>
