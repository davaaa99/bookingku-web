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
                    <a href="{{ route('admin') }}" class="content-link">
                        <i class="far fa-clone"></i>
                        DASHBOARD
                    </a>
                </div>
                <div class="content-item d-flex align-items-center">
                    <a href="{{ route('locationlist') }}" class="content-link">
                        <i class="far fa-address-card"></i>
                        LOCATION
                    </a>
                </div>
                <div class="content-item d-flex align-items-center">
                    <a href="{{ route('locationadd') }}" class="content-link">
                        <i class="far fa-credit-card"></i>
                        LOCATION ADD
                    </a>
                </div>
            </div>
        </div>
    </div>
</aside>
