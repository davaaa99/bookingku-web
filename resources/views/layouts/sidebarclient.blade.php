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
                    <a href="{{ route('bookinglist') }}" class="content-link">
                        <!-- <i class="far fa-address-card"></i> -->
                        <img class="logo" src="{{ asset('client/order.png')}}">
                        Order
                    </a>
                </div>
                <div class="content-item d-flex align-items-center">
                    <a href="/locations" class="content-link">
                        <!-- <i class="far fa-credit-card"></i> -->
                        <img class="logo" src="{{ asset('client/location.png')}}">
                        Location
                    </a>
                </div>
                <div class="content-item d-flex align-items-center">
                    <a href="{{ route('lapang') }}" class="content-link">
                        <!-- <i class="far fa-credit-card"></i> -->
                        <img class="logo" src="{{ asset('client/field.png')}}">
                        Field
                    </a>
                </div>
                <div class="content-item d-flex align-items-center">
                    <a href="{{ route('schedule') }}" class="content-link">
                    <img class="logo" src="{{ asset('client/schedule.png')}}" >
                        Schedule
                    </a>
                </div>
                <div class="content-item d-flex align-items-center">
                    <a class="content-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <img class="logo" src="{{ asset('client/schedule.png')}}">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</aside>