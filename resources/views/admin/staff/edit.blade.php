@extends('layouts.admin-app')

@section('content')
@livewire('admin.staff.edit', ['staff' => $staff])
@endsection
