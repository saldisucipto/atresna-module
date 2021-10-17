<x-backend-layout>
    <x-slot name="container">
        <div class="container mt-15 select-none">
            <div class="row text-white bg-primary">
                <div class="col-xl-8 py-2 ">
                    <h3 class="text-md uppercase"> <span
                            class="bg-white px-4 py-3 rounded-full text-primary font-bold text-lg shadow">1</span>
                        INFORMASI PERUSAHAAN
                    </h3>
                </div>
            </div>
            <div class="row text-white mt-3 bg-primary">
                <div class="col-xl-8 py-2 mx-auto text-center uppercase">
                    <h1 class="py-2">ISI FORM INFORMASI PERUSAHAAN
                        DIBAWAH</h1>
                    <form class="text-left" action="#">
                        <div class="form-row py-1">
                            <label class="font-bold" for="company_name_info">Nama Perusahaan</label>
                            <input class="form-control form-control-sm" type="text" placeholder="Nama Perusahaan"
                                required name="company_name_info" id="company_name_info">
                        </div>
                        <div class="form-row py-1">
                            <label class="font-bold" for="company_phone_info">Nomor Telepon</label>
                            <input class="form-control form-control-sm" type="text" placeholder="Nomor Telepon"
                                maxlength="13" required name="company_phone_info" id="company_phone_info">
                        </div>
                        <div class="form-row py-1">
                            <label class="font-bold" for="company_email_info">Email</label>
                            <input class="form-control form-control-sm" type="email" placeholder="Email" required
                                name="company_email_info" id="company_email_info">
                        </div>
                        <div class="form-row py-1">
                            <label class="font-bold" for="company_adress_info">Alamat</label>
                            <textarea class="form-control form-control-sm" name="company_adress_info"
                                placeholder="Alamat Kantor/Perusahaan" id="company_adress_info" required cols="30"
                                rows="15"></textarea>
                        </div>
                        <div class="form-row py-1">
                            <label class="font-bold" for="company_logo_info">Company Logo</label>
                        </div>
                        <input type="file" class="" name="company_logo_info" id="company_logo_info">
                        <div class="form-row py-4 text-right">
                            {{-- <label class="font-bold" for="company_logo_info">Company Logo</label> --}}
                            <a href="#" type="submit" class="btn btn-block bg-white text-primary">Next &nbsp; <i
                                    class="fas fa-arrow-right"></i></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-slot>
</x-backend-layout>
