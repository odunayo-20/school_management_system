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
                            <h4>ADD SUBJECT</h4>
                        </div>
                        <div class="card-body">


                            <form wire:submit='store'>
                                @if (session('status'))
                                    <div class='alert alert-info'>{{ session('status') }}</div>
                                @endif
                                <div class="mb-4 form-group row">
                                    <label class="col-form-label text-md-right col-6 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <input name='name' type="text" class="form-control"
                                            placeholder="subject name">
                                        @error('name')
                                            <span class='text-danger'> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="mb-4 form-group row">
                                    <div class="col-sm-12 col-md-7">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>


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

