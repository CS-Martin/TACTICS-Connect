@extends('layouts.app')

@section('home')
    <div class="">
        <img src="{{ url('../img/fp-bg.png') }}" class="home-bg position-absolute position-fixed" alt="">
    </div>
    <div class="home-container px-5" id="home_section">
        <div class="container-fluid">
            <div>
                <div class="black-header-container">
                    <img src="{{ asset('img/svg/black-header.svg') }}" alt="">
                </div>
                <img src="{{ asset('img/svg/logo-circle.svg') }}" class="bg-circle" alt="">
                <img src="{{ asset('img/tactics-logo-trans.png') }}" class="bg-tactics-logo" alt="">
                <img src="{{ asset('img/svg/Rectangle 5.svg') }}" class="bg-left-1" alt=""o">
                <img src="{{ asset('img/svg/fp-svg2.svg') }}" class="bg-left-2" alt="">
            </div>

            <div class="header-tactics-container text-white">
                <h1 class="header-tactics lh-1">TACTICS</h1>
                <p class="subheader-tactics col-6 lh-sm fw-light">The Ateneo Consortium of Technological Information and
                    Computing Sciences</p>
                <a href="/contact-us" class="btn btn-dark p-3 px-5 text-decoration-none text-white">CONTACT US</a>
            </div>
        </div>
    </div>

    <x-announcements></x-announcements>
    @include('about')
@endsection

<script>
    function scrollToSection(sectionId) {
        var target = $('#' + sectionId);
        if (target.length) {
            $('html, body').animate({
                scrollTop: target.offset().top
            }, 1000);
        }
    }
</script>

<style scoped>
    .home-container {
        font-family: 'Lexend', sans-serif;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        width: 100%;
        z-index: -100;
    }

    .home-bg {
        z-index: -100;
        /* height: 100vh; */
        /* font-family: 'Lexend', sans-serif; */
        /* overflow-x: hidden !important; */
        /* overflow-y: hidden; */
    }

    .header-tactics-container {
        padding: 50px;
    }

    .bg-div {
        z-index: -100;
    }

    h1 {
        font-weight: 700;
        font-size: 170px;
    }

    .bg-circle {
        position: fixed;
        width: 1316px;
        height: 1261px;
        left: 700px;
        top: 120px;
        z-index: -100;
    }

    .bg-tactics-logo {
        position: fixed;
        width: 1200px;
        height: 1200px;
        left: 800px;
        top: 40px;
        opacity: 0.54;
        z-index: -99;
    }

    .bg-left-1 {
        position: fixed;
        width: 800px;
        height: 700px;
        left: -240px;
        top: 300px;
        z-index: -100;
    }

    .bg-left-2 {
        position: fixed;
        width: 1000px;
        height: 500px;
        left: -245.51px;
        top: 700px;
        transform: rotate(8deg);
        z-index: -1;
    }

    .black-header-container {
        position: fixed;
        position: absolute;
        top: 0;
        right: 0;
        z-index: -100;
    }

    .black-header-container img {
        opacity: 0.8;
        z-index: -500;

    }


    .header-tactics {
        font-size: 4rem;
        line-height: 1.2;

        /* Medium devices (tablets, 768px and up) */
        @media (min-width: 768px) {
            font-size: 6rem;
        }

        /* Large devices (desktops, 992px and up) */
        @media (min-width: 992px) {
            font-size: 10rem;
        }
    }

    .subheader-tactics {
        font-weight: 200;
        font-size: 24px;
    }
</style>
