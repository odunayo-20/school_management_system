
<!-- Main Content start -->
<div class="main-content">
    @include('livewire.admin.assign-staff.assign-staff-modal')

    <!-- section start -->
    <section class="section">
        <div class="section-body">
            <!-- add content start here -->

            <div class="row">
                <div class="col-12 my-2">
                    <a href="#" class="btn btn-primary"
                        style="float: right;" data-bs-toggle="modal" data-bs-target="#createModal">Add Assign Staff</a>
                </div>
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="col-12">


                    <div class="card">
                        <div class="card-header">

                            <h4>Assign Staff Record Table</h4>

                            <div class="card-header-form">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <div class="input-group">
                                            <input wire:model.live='search' type="search" class="form-control"
                                                placeholder="Search">
                                            <div class="input-group-btn">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
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
                    </div>
                    <!-- <div class="card-body p-0"> -->

                    <!-- query to check for staff count stop -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card mb-0">
                                <div class="card-body">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#">All <span
                                                    class="badge badge-white"></span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Publish <span
                                                    class="badge badge-primary"></span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Draft <span
                                                    class="badge badge-primary"></span></a>
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
                                    <th>Class</th>
                                    <th>Staff Name</th>
                                    <th>Staff Email</th>
                                    <th>Staff Phone</th>
                                    <th>Status</th>
                                    <th>Date Created</th>
                                    <th>Action</th>
                                </tr>

                                @foreach ($AssignStaffs as $value)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $value->class->name }}</td>
                                        <td>{{ $value->staff->firstname }} {{ $value->staff->lastname }}</td>
                                        <td>{{ $value->staff->email }}</td>
                                        <td>{{ $value->staff->phone }}</td>
                                        <td><button
                                                class="btn btn-sm btn-dange {{ $value->status == '1' ? '0' : 'btn-success' }} {{ $value->status == '0' ? '1' : 'btn-danger' }}"
                                                wire:click="updateStatus({{ $value->id }}, '{{ $value->status == '0' ? '1' : '0' }}')">
                                                @if ($value->status == '0')
                                                    {{ 'Active' }}
                                                @else
                                                    {{ 'Inactive' }}
                                                @endif
                                            </button></td>
                                        <td>{{ $value->created_at }}</td>

                                        <td>
                                            <a href="#" wire:click='editAssignStaff({{ $value->id }})' class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
                                                <i class='fa fa-pen'></i></a>
                                            <a href="#"  wire:click='deleteAssignStaff({{ $value->id }})' class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal"><i
                                                class="fa fa-trash"></i></a>
                                        </td>


                                    </tr>
                                @endforeach

                            </table>
                            {{ $AssignStaffs->links() }}

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

@section('scripts')
<script>

    window.addEventListener('close-modal', event => {
        $('#deleteModal').modal('hide');
    });
    </script>
@endsection
