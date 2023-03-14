<!-- Sidebar user panel (optional) -->
<div class="user-panel mt-3 pb-3 mb-3 d-flex">
{{--    <div class="image">--}}
{{--        <img src="{{ asset('/admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">--}}
{{--    </div>--}}
    <div class="info">
        @if(auth()->user()->isAdmin() || auth()->user()->isDriver())
        <a href="#" class="d-block">{{ auth()->user()->name ?? '' }}</a>
        @else
            <a href="#" class="d-block text-wrap">{{ auth()->user()->customer->company_name ?? '' }}</a>
        @endif
    </div>
</div>
