<div>
    <div class="col-12 mb-4">
        <div class="hero bg-primary text-white">
            <div class="hero-inner">
                @if (Session::has('menyapa'))
                    <h2>Hallo, Selamat Datang di Dashboard Module Anda</h2>
                <p class="lead">{!! session('menyapa') !!}</p>
                <div class="mt-4">
                    <a href="#" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="far fa-user"></i>
                        Setup Account</a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
