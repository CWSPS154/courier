@extends('layouts.admin.admin_layout',['title'=>'Job Status'])
@section('content')

    @push('styles')
        {{-- Custom Style --}}
    @endpush
    <x-admin.ui.datatable :data-table="$dataTable" title="">
        <x-slot name="breadcrumb">
            <x-admin.title-and-breadcrumb title="Job Status"
                                          breadcrumbs='{"Home":"dashboard","Jobs":"","Job Status":""}'/>
        </x-slot>
    </x-admin.ui.datatable>
    @push('scripts')
        {{--Custom JS--}}
    @endpush
    `
@endsection
