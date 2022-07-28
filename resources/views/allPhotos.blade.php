@extends('layout.layout')

@section('content')
    <div class="container">
        <div class="row mt-5  pt-3">
            <div class="logout_button float-right">
                <a class="btn btn-primary" href="/logout">Logout</a>
            </div>
        </div>

        <!-- Gallery -->
        <div class="row mt-2 mb-5" >

            @foreach ($imgs as $img)

            <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                <img src="{{url($img->path)}}"
                    class="w-100 shadow-1-strong rounded mb-4" alt="Boat on Calm Water" />
            </div>
            @endforeach


        </div>
        <!-- Gallery -->
    </div>
@endsection

@section('styles')
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endsection

@section('scripts')
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
@endsection
