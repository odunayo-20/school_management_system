

    <!-- Create brand -->

    <div wire:ignore.self class="modal fade" style="z-index: 1060" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Add Assign Staff</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="storeAssignStaff">

                        <div class="form-group row mb-4">
                            <label class="col-form-label col-6 col-md-12">Class</label>
                            <div class="col-sm-12 col-md-12">

                                <select wire:model='class' class="form-control">
                                    <option value="">--Select Class--</option>
                                    @foreach ($classes as $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                    @endforeach
                                </select>
                                @error('class')
                                    <span class='text-danger'> {{ $message }}</span>
                                @enderror

                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label col-md-12">Subject</label>
                            <div class="col-sm-12 col-md-12">
                                <select wire:model='staff' class="form-control">
                                    <option value="">--Select Staff--</option>
                                    @foreach ($staffs as $value)
                                        <option value="{{ $value->id }}">{{ $value->firstname }} {{ $value->lastname }}</option>
                                    @endforeach
                                </select>
                                @error('staff')
                                    <span class='text-danger'> {{ $message }}</span>
                                @enderror

                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="" class="checkbox-label">Status</label>
                            <input type="checkbox" wire:model.defer="status" class="form-check-input"> <br>Checked=Hidden, Un-Checked=Visible

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Update brand -->

    <div wire:ignore.self class="modal fade" style="z-index: 1060" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Assign Staff</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div wire:loading>

                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>loading....
                </div>

                <div wire:loading.remove>

                <div class="modal-body">
                        <form wire:submit.prevent="updateAssignStaff">

                            <div class="form-group row mb-4">
                                <label class="col-form-label col-6 col-md-12">Class</label>
                                <div class="col-sm-12 col-md-12">

                                    <select wire:model='class' class="form-control">
                                        <option value="">--Select Class--</option>
                                        @foreach ($classes as $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('class')
                                        <span class='text-danger'> {{ $message }}</span>
                                    @enderror

                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label col-6 col-md-12 col-lg-3">Staff</label>
                                <div class="col-sm-12 col-md-12">
                                    <select wire:model='staff' class="form-control">
                                        <option value="">--Select Staff--</option>
                                        @foreach ($staffs as $value)
                                            <option value="{{ $value->id }}">{{ $value->firstname }} {{ $value->lastname }}</option>
                                        @endforeach
                                    </select>
                                    @error('staff')
                                        <span class='text-danger'> {{ $message }}</span>
                                    @enderror

                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="" class="checkbox-label">Status</label>
                                <input type="checkbox" wire:model.defer="status" class="form-check-input"> <br>Checked=Hidden, Un-Checked=Visible

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- delete Modal --}}
    <div wire:ignore.self class="modal fade" id="deleteModal" style="z-index: 1060" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Assign Subject</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Livewire Loading Spinner -->
                <div wire:loading wire:target="destroyAssignSubject" class="d-flex justify-content-center my-3">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>

                <!-- Modal Body -->
                <form wire:submit.prevent='destroyAssignStaff'>
                    <div wire:loading.remove wire:target="destroyAssignSubject">
                        <div class="modal-body">
                            <h6>Are you sure you want to delete this data?</h6>
                        </div>

                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Yes, Delete</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
