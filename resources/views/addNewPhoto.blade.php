@extends('layout.layout')

@section('content')
    <div class="container">

        <div class="row d-flex justify-content-center " style="margin-top: 120px">
            <div class="col-12 col-md-8 col-lg-6 col-xl-6">
                <form class="form"
                              method="post"
                              action="{{url('/addPhoto')}}"
                              id="loginForm">
                              @csrf

                            <div class="form-outline mb-4">
                                <input type="text" id="url" name="url" class="form-control form-control-lg" placeholder="Enter a photo Url">

                            </div>

                            <button class="btn btn-primary btn-lg btn-block" type="submit">Submit</button>
                        </form>
            </div>
        </div>
    </div>
@endsection

@section('styles')
@endsection
