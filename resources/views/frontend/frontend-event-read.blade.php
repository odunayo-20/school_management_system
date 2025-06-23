@extends('layouts.frontend-app')

@section('content')
<div class="container-fluid">
    <div class="container">
        <div class="row">
            {{-- Main Event Details --}}
            <div class="col-md-12">
                <div class="card mt-3 mb-3">
                    {{-- Event Header --}}
                    <div class="card-header text-center bg-primary text-white" style="background-color: rgb(59, 15, 129) !important; height: 50px;">
                        <h3 class="mb-0 d-flex align-items-center justify-content-center h-100">EVENTS</h3>
                    </div>

                    {{-- Event Content --}}
                    <div class="card-body">
                        {{-- Event Meta Information --}}
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="event-meta px-4" style="font-size: small;">
                                    <strong>
                                        Date: {{ $event->date }} |
                                        Time: {{ \Carbon\Carbon::parse($event->time)->format('h:i A') }}
                                    </strong>
                                </div>
                            </div>
                        </div>

                        {{-- Event Title --}}
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <h4 class="event-title px-2" style="color: rgb(59, 15, 129); font-weight: bold;">
                                    {{ $event->title }}
                                </h4>
                            </div>
                        </div>

                        {{-- Event Image --}}
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="event-image px-3"
                                     style="height: 400px; width: 100%; background-color: #f0f0f0; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                                    <img src="{{ Storage::url($event->image) }}"
                                         alt="{{ $event->title }}"
                                         class="img-fluid rounded"
                                         style="max-height: 100%; max-width: 100%; object-fit: contain;">
                                </div>
                            </div>
                        </div>



                        {{-- Event Description --}}
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="event-description px-3" style="font-size: 14px; text-align: justify;">
                                    {!! $event->content !!}
                                </div>
                            </div>
                        </div>

                        {{-- Event Location --}}
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="event-location px-3" style="font-size: 13px;">
                                    <span class="fw-bold">Location:</span> {{ $event->location }}
                                </div>
                            </div>
                        </div>

                        {{-- Event Timestamp --}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="event-timestamp px-3">
                                    <small class="text-muted float-end">
                                        Time posted: {{ $event->created_at->format('j F, Y, h:i A') }}
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Other Events Section --}}
            @if ($events->isNotEmpty())
                <div class="col-md-12">
                    {{-- Section Header --}}
                    <div class="other-events-header mt-3 mb-3">
                        <h5 class="p-3 border-top border-bottom border-5"
                            style="border-color: rgb(59, 15, 129) !important;">
                            <i class="fa fa-newspaper me-2" aria-hidden="true"></i>OTHER EVENTS
                        </h5>
                    </div>

                    {{-- Events Grid --}}
                    <div class="row">
                        @foreach ($events as $otherEvent)
                            <div class="col-md-4 mb-4">
                                <div class="card h-100 event-card">
                                    {{-- Event Image --}}
                                    <a href="{{ $otherEvent->slug }}" class="text-decoration-none">
                                        <img src="{{ Storage::url($otherEvent->image) }}"
                                             alt="{{ $otherEvent->title }}"
                                             class="card-img-top"
                                             style="height: 15rem; object-fit: cover; object-position: 50% 0%;">
                                    </a>

                                    {{-- Card Body --}}
                                    <div class="card-body d-flex flex-column">
                                        {{-- Event Meta --}}
                                        <div class="event-meta-small mb-2">
                                            <div class="d-flex justify-content-between">
                                                <small class="text-primary">
                                                    <i class="fa fa-calendar me-1"></i>{{ $otherEvent->date }}
                                                </small>
                                                <small class="text-primary">
                                                    <i class="fa fa-clock me-1"></i>{{ \Carbon\Carbon::parse($otherEvent->time)->format('h:i A') }}
                                                </small>
                                            </div>
                                        </div>

                                        {{-- Event Title --}}
                                        <h6 class="card-title text-center mb-3">
                                            <a href="{{ $otherEvent->slug }}"
                                               class="text-decoration-underline text-dark">
                                                {{ Str::limit($otherEvent->title, 100, '...') }}
                                            </a>
                                        </h6>

                                        {{-- Card Footer --}}
                                        <div class="mt-auto d-flex justify-content-between align-items-center">
                                            <small class="text-muted">
                                                Posted: {{ $otherEvent->created_at->format('M j, Y') }}
                                            </small>
                                            <a href="{{ $otherEvent->slug }}"
                                               class="btn btn-primary btn-sm">
                                                Read More
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

@push('styles')
<style>
    .bg-primary {
        background-color: rgb(59, 15, 129) !important;
    }

    .event-card {
        transition: transform 0.2s ease-in-out;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .event-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.15);
    }

    .event-title {
        line-height: 1.4;
    }

    .event-description {
        line-height: 1.6;
    }

    .border-5 {
        border-width: 5px !important;
    }
</style>
@endpush
@endsection
