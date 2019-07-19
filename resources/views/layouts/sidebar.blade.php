<aside>
    <div id="sidebar">
        <div class="sidebar fixed-top">
            <div class="content-side">
                <div class="brand">
                    <a href="" class="d-flex justify-content-center align-items-center">
                        <img class="" src="{{ asset('logo/logo.svg') }}" alt="">
                    </a>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <div class="line-white"></div>
            </div>
            <!-- <div class="pofile-admin d-flex ">
                <div class="avatar"></div>
                <div class="profile-admin-desc">
                    <div class="profile-name">Firman Ramdhani</div>
                    <div class="profile-desc"> Admin</div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <div class="line-white"></div>
            </div> -->
            <div class="content-side">
                <div class="content-item d-flex align-items-center">
                    <a href="{{ route('index') }}" class="content-link">
                        <i class="far fa-clone"></i>
                        VERIFY BOOKING
                    </a>
                </div>
                <div class="content-item d-flex align-items-center">
                    <a href="{{ route('client') }}" class="content-link">
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
            </div>
        </div>
    </div>
</aside>
