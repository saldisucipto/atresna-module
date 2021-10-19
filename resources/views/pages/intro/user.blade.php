<x-backend-layout>
    <x-slot name="container">
        <div class="container mt-15 select-none">
            @if (Session::has('message'))
            <div class="alert alert-info alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <i class="fa fa-check-circle"></i> {!! session('message') !!}
            </div>
            @endif
            <div class="row text-white bg-primary">
                <div class="col-xl-8 py-2 ">
                    <h3 class="text-md uppercase"> <span
                            class="bg-white px-4 py-3 rounded-full text-primary font-bold text-lg shadow">2</span>
                        MAKE ADMINISTRATOR USER
                    </h3>
                </div>
            </div>
            <div class="row text-white mt-3 bg-primary">
                <div class="col-xl-8 py-2 mx-auto text-center uppercase">
                    <h1 class="py-2">ADMINISTRATOR USER</h1>
                    <form class="text-left" action="{{route('companyinfo')}}" enctype="multipart/form-data"
                        method="POST">
                        @csrf
                        <div class="form-row py-1">
                            <label class="font-bold" for="name">Nama</label>
                            <input class="form-control form-control-sm" type="text" placeholder="Nama" required
                                name="name" id="name">
                        </div>
                        <div class="form-row py-1">
                            <label class="font-bold" for="email">Email</label>
                            <input class="form-control form-control-sm" type="email" placeholder="Email" maxlength="13"
                                required name="email" id="email">
                        </div>
                        <div class="form-row py-1">
                            <label class="font-bold" for="password">Password</label>
                            <input class="form-control form-control-sm" type="password" placeholder="Password" required
                                name="password" id="password">
                        </div>
                        <div class="form-row py-4 text-right">
                            {{-- <label class="font-bold" for="company_logo_info">Company Logo</label> --}}
                            <button type="submit btn-block"> <a type="submit"
                                    class="btn btn-block bg-white text-primary">Next
                                    &nbsp; <i class="fas fa-arrow-right"></i></a></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-slot>
</x-backend-layout>
