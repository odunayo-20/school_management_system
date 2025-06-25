<div>
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

                                <h4>News Record Table</h4>

                                <div class="card-header-form">
                                    <div class="row g-3 align-items-center">
                                        <div class="col-auto">
                                            <div class="input-group">
                                                <input wire:model.live='search' type="search" class="form-control"
                                                    placeholder="Search">
                                                <div class="input-group-btn">
                                                    <button class="btn btn-primary"><i
                                                            class="fas fa-search"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <select wire:model.live='pagination' class="form-select ">
                                                <option value="5">5</option>
                                                <option value="10">10</option>
                                                <option value="20">20</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- <div class="p-0 card-body"> -->

                            <!-- query to check for staff count stop -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-0 card">
                                        <div class="card-body">
                                            <ul class="nav nav-pills">
                                                <li class="nav-item">
                                                    <a class="nav-link active" href="#">All <span
                                                            class="badge badge-white">
                                                            {{ count($newsCount) }}
                                                        </span></a>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="card-body">

                                <div class="table-responsive">
                                    <table id="mainTable" class="table table-striped">
                                        <tr>
                                            <th>S/N</th>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Action</th>
                                        </tr>

                                        @foreach ($news as $new)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ Str::limit($new->title, 50, '.....') }}</td>
                                                <td><img class="img-fluid rounded-circle "
                                                        style='height:50px; width:50px'
                                                        src="{{ Storage::url($new->image) }}" alt=""
                                                        srcset=""></td>

                                                <td>{{ $new->date }}</td>
                                                <td>{{ $new->time }}</td>
                                                <td>
                                                    <a href="{{ url('staff/news/view/' . $new->slug) }}"
                                                        class="btn btn-sm btn-warning"><i class="fa fa-eye"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach


                                    </table>

                                    {{ $news->links() }}


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
</div>
@section('scripts')
    <script>
        window.addEventListener('close-modal', event => {
            $('#deleteModal').modal('hide');
        });
    </script>
@endsection
