@extends('layouts.app')

@section('content')
    <div class="home-container" id="home_section">
        <div class="container-fluid">
            <div>
                <div class="black-header-container">
                    {{-- <img src="{{ asset('img/svg/black-header.svg') }}" class="black-header" alt=""> --}}
                </div>
                <img src="{{ asset('img/svg/logo-circle.svg') }}" class="bg-circle" alt="">
                <img src="{{ asset('img/tactics-logo-trans.png') }}" class="bg-tactics-logo" alt="">
                <img src="{{ asset('img/svg/Rectangle 5.svg') }}" class="bg-left-1" alt="">
                <img src="{{ asset('img/svg/fp-svg2.svg') }}" class="bg-left-2" alt="">
            </div>

            <div class="text-white mb-5 pt-5 pt-5">
                <h1 class="header-tactics lh-1">TACTICS</h1>
                <p class="subheader-tactics col-6 lh-sm fw-lighter">The Ateneo Consortium of Technological Information and
                    Computing Sciences</p>
                <button class="btn btn-dark p-3 px-5">CONTACT US</button>
                <button class="ms-4 btn btn-link text-white text-hide-underline text-underline-hover" onclick="scrollToSection('announcement_section')">Latest News</button>
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
    .black-header-container {
        position: absolute;
        height: 100vh;
        width: 100%;
        top: 0;
        right: 0;
    }

    .home-container {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        width: 100%;
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
