@extends('layout.layout')

@section('content')
    <div class="container">

        <div class="row d-flex justify-content-center " style="margin-top: 120px">
            <div class="col-12 col-md-8 col-lg-6 col-xl-6">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

                        <h3 class="mb-5">Registration</h3>

                        <form action="{{ url('/userReg') }}" method="POST" id="use_reg">
                            @csrf

                            <div class="form-outline mb-4">
                                <input type="text" id="fullName" name="name" class="form-control form-control-lg"
                                    placeholder="Your Full Name" required>
                                <label class="form-label" for="email" style="margin-left: 0px;">Full Name</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="email" id="email" name="email" class="form-control form-control-lg"
                                    placeholder="Your Email" required>
                                <label class="form-label" for="email" style="margin-left: 0px;" >Email</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="text" id="phone" name="phone" class="form-control form-control-lg"
                                    placeholder="Your Phone Number" required>
                                <label class="form-label" for="phone" style="margin-left: 0px;" >Phone</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="password" id="password" name="password" class="form-control form-control-lg"
                                    placeholder="Length must be 4 or more" required>
                                <label class="form-label" for="password" style="margin-left: 0px;">Password</label>
                            </div>

                            <button class="btn btn-primary btn-lg btn-block" type="submit">Submit</button>
                        </form>

                            {{-- <div>@error</div> --}}

                        <div class="text-center pt-2">
                            <p>Already registerd <a href="{{ url('/') }}">Login</a></p>
                        </div>
                        {{-- <hr class="my-4"> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
@endsection
