@extends('layouts.app')

@section('content')
<div style="padding-top: 78px; height: 100vh;" class="d-flex justify-content-center align-items-center">
    
    <div class="container-fluid">
        <div>
            <img src="{{ asset('img/svg/fp-header-black-svg.svg') }}" class="black-header" alt="">
            <img src="{{ asset('img/svg/logo-circle.svg') }}" class="bg-circle" alt="">
            <img src="{{ asset('img/tactics-logo-trans.png') }}" class="bg-tactics-logo" alt="">
            <img src="{{ asset('img/svg/Rectangle 5.svg') }}" class="bg-left-1" alt="">
            <img src="{{ asset('img/svg/fp-svg2.svg') }}" class="bg-left-2" alt="">

        </div>
        <div class="text-white mb-5">
            <h1 class="header-tactics lh-1">TACTICS</h1>
            <p class="subheader-tactics col-6 lh-sm fw-lighter">The Ateneo Consortium of Technological Information and Computing Sciences</p>
            <button class="btn btn-dark p-3 px-5">CONTACT US</button>
            <button class="ms-4 btn btn-link text-white text-hide-underline text-underline-hover">Activities<i class="fa-solid fa-arrow-right ms-3 border border-1 p-2 rounded-5"></i></button>
        </div>
    </div>
</div>
<x-announcements></x-announcements>
@include('about')
{{-- @include('create') --}}
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> --}}

@endsection
