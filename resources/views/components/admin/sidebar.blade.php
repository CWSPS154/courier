<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <x-admin.logo/>

    <!-- Sidebar -->
    <div class="sidebar">
        <x-admin.user-panel/>
        {{--        <x-admin.search-form/>--}}
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->

{{--                <x-admin.ui.menu name="Dashboard" route="dashboard" icon="fas fa-home" target="0"--}}
{{--                                 new="0" count="0"/>--}}
                {{--Admin Menus--}}
                @if(auth()->user()->isAdmin())
                    <x-admin.ui.dropdown-menu name="Jobs" icon="fas fa-briefcase"
                                              menus='[{"label":"Active Jobs","route":"job.index","target":"0","new":"0","count":"0"},
                                              {"label":"Completed Jobs","route":"job.completed","target":"0","new":"0","count":"0"},
                                              {"label":"Job Status","route":"job_status.index","target":"0","new":"0","count":"0"}]'/>
                    <x-admin.ui.menu name="Customers" route="customer.index" icon="fas fa-users" target="0"
                                     new="0" count="0"/>
                    <x-admin.ui.menu name="Drivers" route="driver.index" icon="fas fa-truck" target="0"
                                     new="0" count="0"/>
                    <x-admin.ui.menu name="Area" route="area.index" icon="fas fa-location-arrow" target="0"
                                     new="0" count="0"/>
                @elseif(auth()->user()->isCustomer())
                    <x-admin.ui.dropdown-menu name="Jobs" icon="fas fa-briefcase"
                                              menus='[{"label":"Active Jobs","route":"jobs.index","target":"0","new":"0","count":"0"},
                                              {"label":"Completed Jobs","route":"jobs.completed","target":"0","new":"0","count":"0"}]'/>
                    <x-admin.ui.menu name="Address Book" route="address_book.index" icon="fas fa-address-book"
                                     target="0"
                                     new="0" count="0"/>

                @elseif(auth()->user()->isDriver())
                    <x-admin.ui.menu name="Jobs" route="myjob.index" icon="fas fa-briefcase" target="0"
                                     new="0" count="0"/>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
