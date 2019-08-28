<aside>
    <div id="sidebar">
        <div class="sidebar fixed-top">
            <div class="brand">
                <a href="" class="d-flex justify-content-center align-items-center">
                    <img class="" src="{{ asset('logo/logo.png') }}" alt="">
                </a>
            </div>
            <div class="d-flex justify-content-center">
                <div class="line-white"></div>
            </div>
            <div class="spacer-30"></div>
            <div class="content-side">
                <div class="content-item d-flex align-items-center">
                    <a href="{{ route('locationlist') }}" class="content-link">
                        <i class="far fa-clone"></i>
                        CLIENT PAGE
                    </a>
                </div>
                <div class="content-item d-flex align-items-center">
                    <a href="{{ route('admin') }}" class="content-link">
                        <i class="far fa-clone"></i>
                        VERIFY BOOKING
                    </a>
                </div>
                <div class="content-item d-flex align-items-center">
                    <a href="{{ route('clientlist') }}" class="content-link">
                        <i class="far fa-address-card"></i>
                        CLIENT LIST
                    </a>
                </div>
                <div class="content-item d-flex align-items-center">
                    <a href="{{ route('payment') }}" class="content-link">
                        <i class="far fa-credit-card"></i>
                        PAYMENT
                    </a>
                </div>
                <div class="content-item d-flex align-items-center">
                    <a class="content-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="far fa-address-card"></i>
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