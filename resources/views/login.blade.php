@extends('layout.layout')
@section('content')
    <section class="">
        <div class="px-4 vh-100 d-flex apacoba align-items-center py-5 px-md-5 text-center text-lg-start"
            style="background-color: hsl(0, 0%, 96%)">

            <div class="container">
                <div class="row gx-lg-5 align-items-center">
                    <div class="col-lg-6 mb-5 mb-lg-0 woy">
                        <h1 class="my-5 display-3 fw-bold text-white">
                            Belajar <br />
                            <span class="text-primary">Laravel Login and Register</span>
                        </h1>
                        <p style="color: rgb(255, 255, 255)">
                            PPLG Wajib Ngulik!
                        </p>
                    </div>

                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <div class="card w-100">
                            <div class="card-body py-5 px-md-5">

                                <form method="POST" action="{{ route('login.auth') }}">

                                    @csrf
                                    @if (session('success'))
                                    <script>
                                    swal("Sukses!", "Berhasil menambahkan akun!", "success");
                                    </script>
                                    @endif
                                    @if(session('notAllowed'))
                                    <script>
                                    swal("Gagal", "Harap login terlebih dahulu!", "error");
                                    </script>
                                    @endif
                                    @if(session('gagal'))
                                    <script>
                                    swal("Gagal", "Harap login terlebih dahulu!", "error");
                                    </script>
                                    @endif
                                    @if ($errors->any())
                                    <script>
                                    swal("Error!", "Harus mengisi semua input!", "error");
                                    </script>
                                    @endif
                                    {{-- <div class="font-20 font-w700 line-h28 mb-6 ">
                                        <b>
                                            <h5>Wellcome to Project My Todo's!</h5>
                                        </b>
                                    </div> --}}
                                    {{-- <br> --}}
                                    <label for="form3Example4" class="form-label">Username</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-text">
                                           <i class='fas fa-user-alt'></i>
                                        </div>
                                        <input type="text" class="form-control" id="form3Example4" aria-describedby="basic-addon3" name="username" />
                                    </div>

                                    <br>
                                    <label for="form3Example4" class="form-label">Password</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-text">
                                           <i class='fas fa-key'></i>
                                        </div>
                                        <input type="password" class="form-control" id="form3Example4" aria-describedby="basic-addon3" name="password" />
                                    </div>

                                    <div class="d-flex justify-content-end align-items-center mb-4">
                                        <a href="/register" class="text-white">Don't have an account?</a>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
