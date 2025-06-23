@extends('layouts.frontend-app')

@section('content')
<div class="container-fluid bg-light message" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12 d-flex flex-column justify-content-center align-items-center ">
                <h1 class="fw-bold display-5">Contact Us</h1>
                <p class="py-2">
                    Reach us through this details or through form been filled
                </p>
            </div>
        </div>
    </div>


    <div class="container">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif


        <div class="row">
            <div class="mb-5 col-md-6 justify-content-start ">

                <strong class="py-2 d-block">Emure campus:</strong>
                <!-- <div class="footer-icon"> -->
                <i class="pb-3 fas fa-map-marker-alt" aria-hidden="true"></i> Obada market, via energy filling station,
                Emure-ile, Owo. <br>
                <i class="pb-3 fa fa-phone-square" aria-hidden="true"></i> 08136089968, 080601805
                <br>
                <!-- </div> -->
                <strong class="py-2 d-block">Uso campus:</strong>
                <!-- <div class="footer-icon"> -->
                <i class="pb-3 fas fa-map-marker-alt" aria-hidden="true"></i> Behind water reservoir, oke-uso, uso, Owo.
                <br>
                <i class="pb-3 fa fa-phone-square" aria-hidden="true"></i> 08136089968, 080601805
                <!-- </div> -->



            </div>

            <div class="col-md-6">
                <form action="{{ route('contact.submit') }}" method="POST">
                    @csrf
                    <div class="form-floating">
                        <input type="text" id="name" name='name' class="form-control "
                            placeholder="put name here">
                        <label for="name" class="form-label">Your name</label>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-floating">
                        <input type="text" id="email" name="email" class="form-control"
                            placeholder="put email here">
                        <label for="email">Your email</label>
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-floating">
                        <input type="text" id="subject" name="subject" class="form-control"
                            placeholder="put subject here">
                        <label for="subject" class="form-label">Your subject</label>
                        @error('subject')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="put message here" name="message" id="message" cols="30"
                            rows="30" style="height: 200px; resize:none"></textarea>
                        <label for="text-area">Your message</label>
                        @error('message')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>

                    <div class="">*All fields are mandatory</div>
                    <button class="mb-3 btn btn-primary" type="submit">Submit</button>
            </div>
        </div>
    </div>




    </form>

</div>

@endsection
<!-- body -->
<!-- form -->
