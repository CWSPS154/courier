@extends('layouts.admin.admin_layout',['title'=>'Job Listing'])
@section('content')

    @push('styles')
        {{-- Custom Style --}}
    @endpush
    <x-admin.ui.datatable :data-table="$dataTable" title="Job Listing">
        <x-slot name="breadcrumb">
            <x-admin.title-and-breadcrumb title="Job"
                                          breadcrumbs='{"Home":"dashboard","Job":""}'/>
        </x-slot>
    </x-admin.ui.datatable>
    @push('scripts')
        <script>
            $(document).ready(function() {
                setInterval(function() {
                    location.reload();
                }, 60000);
            });
        </script>
    @endpush
    `
@endsection
