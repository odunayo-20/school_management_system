<!-- body -->

@extends('layouts.frontend-app')

@section('content')
<div class="container-fluid">


    <div class="container">


        <!--Upcoming event CARD -->
        <div class="my-3 row">
            <div class="col-12">

                <h3 class="fw-medium fs-4 d-flex justify-content-center align-items-center ">Upcoming Events</h3>
            </div>
            <div class="col-md-8">
                <div class="row">

                    @if ($latestEvents->isEmpty())
                        <p>No Record</p>
                    @endif
                    @foreach ($latestEvents as $value)
                        <div class="my-2 col-md-6">


                            <div class="p-2 blog-post card" style="max-height: 38rem; max-width:100%">
                                <a href="{{ 'event/view/' . $value->slug }}" class="profile"> <img
                                        src="{{ Storage::url($value->image) }}" alt="event-img" class="img-fluid"
                                        style="height:15rem; width:100%; object-fit:cover; object-position:50% 0%;"></a>

                                <!-- <br> -->
                                <p style="height:20px;padding-bottom: 25px;text-align:justify; " class="clearfix mb-5 ">
                                    <a class="page-link"
                                        href="{{ 'event/view/' . $value->slug }}">{{ Str::limit($value->title, 120, '...') }}
                                    </a>
                                </p>
                                <p class="mt"><a href="{{ 'event/view/' . $value->slug }}"
                                        class="btn btn-sm btn-primary" style="float: right;"> Read More </a></p>
                                <p>
                                    <?php ?>
                                </p>
                            </div>
                        </div>
                    @endforeach
                    <div class="my-3 text-center">{{ $latestEvents->links() }}</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="my-3 card">

                    <div class="card-body">
                        <h5 class="card-title">Past Events</h5>

                        <div class="col-md-12">
                            @if ($pastEvents->isEmpty())
                                <p>No Records</p>
                            @else
                                @foreach ($pastEvents as $value)
                                    <div class="col-lg-12 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                                        <div class="servic-item positio-relative ">
                                            <div class="my-2 row">
                                                <div class="col-md-6">
                                                    <a href="event/view/{{ $value->slug }}">
                                                        <img class="rounded card-img-top img-fluid"
                                                            style="width: 100%; height: 150px; object-fit:cover; object-position:100% 0%"
                                                            src="{{ Storage::url($value->image) }}" alt="past event">
                                                    </a>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="mb-2" style="font-size:12px;"> <a
                                                            class="text-primary fw-medium page-link "
                                                            href="event/view/{{ $value->slug }}">{{ Str::limit($value->title, 100, '...') }}</a>
                                                    </p>
                                                    <p class="mb-2" style="font-size:12px;"> {{ $value->date }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>



        </div>
        <!--Upcoming event CARD -->

    </div>
</div>
@endsection





<!-- body -->
