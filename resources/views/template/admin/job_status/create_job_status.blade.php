@extends('layouts.admin.admin_layout',['title'=>'Create Job Status'])
@section('content')

    @push('styles')
        {{-- Custom Style --}}
    @endpush

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <x-admin.title-and-breadcrumb title="Create Job Status"
                                      breadcrumbs='{"Home":"dashboard","Jobs":"","Job Status":"job_status.index","Create Job Status":""}'/>
        <!-- /.content-header -->

        <x-admin.ui.card-form title="Job Status Details" form-route="job_status.store" form-id="create_job_status">
            <x-slot name="input">
                <x-admin.ui.input label="Status" type="text" name="status" id="status" add-class=""
                                  placeholder="Enter Status" required/>
                <x-admin.ui.input label="Identifier" type="text" name="identifier" id="identifier" add-class=""
                                  placeholder="Enter Identifier" required>
                    <x-slot name="hint">Please use small letters and separate two word with underscore(-). eg:order_placed</x-slot>
                </x-admin.ui.input>
            </x-slot>
            <x-slot name="button">
                <x-admin.ui.button type="submit" btn-name="Submit" name="job_status_submit" id="job_status_submit"/>
            </x-slot>
        </x-admin.ui.card-form>
        <!-- /.content -->
    @push('scripts')
        {{-- Custom JS --}}
    @endpush

@endsection
