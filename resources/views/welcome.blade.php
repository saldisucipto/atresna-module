<x-backend-layout>
    <x-slot name="container">

        <p class="text-center mt-52 text-uppercase text-primary text-2xl font-bold pb-3 select-none"><i
                class="fas fa-hands text-warning fa-2x"></i> &nbsp; INSTALASI APLIKASI
        </p>

        <div
            class="container d-flex justify-content-center align-content-center align-items-center bg-primary text-white">

            <div class="p-5 select-none">
                <div class="text-left">
                    <h1 class="text-2xl text-uppercase">Selamat Datang Di Atresna Module ERP</h1>
                    <p>Module Aplikasi Ini Dibuat Untuk Menampung Transaksi Perusahaan yang
                        Membutuhkan File dan Data Yang Saling Berelasi Satu Sama Lain. Create With <i
                            class="fas fa-heart text-danger"></i> By |
                        <strong><a class="text-white font-bold">ATRESNA
                                CREATIVE</a></strong>
                    </p>
                </div>
            </div>
            <div class="p-5 select-none">
                <div>Untuk Melanjutkan, Klik Next Pada Tombol Berikut</div>
                <button class="btn btn-block btn-sm bg-white text-primary"><a href="{{route('companyinfo')}}">Next
                        &nbsp; <i class="fas fa-arrow-right"></i></a></button>
            </div>
        </div>
    </x-slot>
</x-backend-layout>
