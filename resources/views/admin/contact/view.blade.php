@extends('layouts.admin-app')

@section('content')

<!-- Main Content start -->
<div class="main-content">
    <!-- section start -->
    <section class="section">
      <div class="section-body">
        <!-- add content start here -->

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>CONTACT</h4>
              </div>
              <div class="card-body">



  <div class="row">


  <div class="py-2 col-md-12 col-sm-12">
      <b> Name:</b>
     <span>
      {{ $contact->name }}
     </span>
      <hr>

  </div>
  <!-- <hr> -->
  <div class="py-4 col-md-12">
      <b>Subject:</b>
      <br>
      <hr>
      {{ $contact->subject }}

  </div>
  <hr>
  <div class="py-4 col-md-12">
  <b>Message:</b>
  <hr>
  <p>
      {{ $contact->message }}
  </p>
  </div>

  <div class="py-4 col-md-12 col-sm-12 text-end text-muted">
      <b>Date:</b>
      {{ $contact->created_at }}

  </div>

  </div>

              </div>

            </div>
          </div>
        </div>

        <!-- add content stop here-->
      </div>

    </section>
    <!-- section stop -->

  </div>
  <!-- Main content stop -->


@endsection
