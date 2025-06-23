@extends('layouts.frontend-app')

@section('content')

<!-- services -->

<style>
    .services {
        color: white;
        background-image: url({{ asset('assets/frontend/images/service1.jpg') }});
        background-position: center;
        background-size: cover;
        position: relative;
        z-index: 2;


    }

    .services::after {
        content: "";
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        left: 0;
        background-color: rgba(21, 20, 51, 0.8);
        z-index: -1;
    }

    .services .col {
        justify-content: center;
        border: 1px solid white;

    }
</style>
<div class="services d-flex align-items-center" id="services" style="height: auto;">
    <div class="container">
        <div class="mx-auto text-center col-lg-7">
            <h1 class="text-white display-4"> OUR FACILITIES </h1>
            <p class="my-3 text-white ">
                Students of Ogo Oluwa Group of Schools are exposed to a series of well-articulated practical
                sessions in the course of their study. Teaching is synchronized with practical classes to facilitate
                teaching and learning. We develop students with balanced knowledge. Apart from science laboratories,
                the school has laboratories for language, electronics, introductory technology, computing and
                typewriting. This is unprecedented and unrivalled within and outside the country.
            </p>


        </div>
        <div class="mb-2 row ">
            <div class="mx-auto text-center col col-lg-3 col-md-3 col-sm-3 b-2">
                <div class="mx-auto mt-2 icon">
                    <i class="fa fa-sun" aria-hidden="true"></i>
                </div>
                <br>
                HIGH STANDARDS & VERY AFFORDABLE
            </div>
            <div class="mx-auto text-center col col-lg-3 col-md-3 col-sm-3">
                <div class="mx-auto mt-2 icon">
                    <i class="fas fa-school" aria-hidden="true"></i>
                </div>
                <br>
                CONDUCIVE AND MODERN CLASSROOM
            </div>
            <div class="mx-auto text-center col col-lg-3 col-md-3 col-sm-3">
                <div class="mx-auto mt-2 icon">
                    <i class=" fa fa-lightbulb" aria-hidden="true"></i>
                </div>
                <br>
                ENTERPRENEUR SKILL AQUISITION DEVELOPMENT
            </div>
            <div class="mx-auto text-center col col-lg-3 col-md-3 col-sm-3">
                <div class="mx-auto mt-2 icon">
                    <i class="fa fa-bus" aria-hidden="true"></i>
                </div>
                <br>
                SCHOOL BUS SERVICE
            </div>
        </div>
        <div class="mt-3 mb-3 row text-light">
            <div class="mx-auto text-center col col-lg-3 col-md-3 col-sm-3">
                <div class="mx-auto mt-2 icon">

                    <i class="fa fas fa-money-check-alt" aria-hidden="true"></i>
                </div>
                <br>
                CONVENIENT PAYMENT PLATFORMS
            </div>
            <div class="mx-auto text-center col col-lg-3 col-md-3 col-sm-3">
                <div class="mx-auto mt-2 icon">
                    <i class="fa fa-video-camera" aria-hidden="true"></i>
                </div>
                <br>
                SECURITY (CCTV CAMERAS,ETC)
            </div>
            <div class="mx-auto text-center col col-lg-3 col-md-3 col-sm-3">
                <div class="mx-auto mt-2 icon">
                    <i class="fas fa-thumbs-up" aria-hidden="true"></i>
                </div>
                <br>
                APPROPRIATE TEACHING AIDS
            </div>
            <div class="mx-auto text-center col col-lg-3 col-md-3 col-sm-3">
                <div class="mx-auto mt-2 icon">
                    <i class="far fas fa-university" aria-hidden="true"></i>
                </div>
                <br>
                GREAT ENVIRONMENT & LANDSCAPE
            </div>
        </div>

    </div>
</div>
<!-- services -->

@endsection



