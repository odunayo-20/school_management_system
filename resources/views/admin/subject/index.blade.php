@extends('layouts.admin-app')

@section('content')
<livewire:admin.subject.index>

@push('script')
<script>

    window.addEventListener('close-modal', event => {
        $('#createModal').modal('hide');
        $('#editModal').modal('hide');
        $('#deleteModal').modal('hide');
    });
    </script>
@endpush

@endsection
