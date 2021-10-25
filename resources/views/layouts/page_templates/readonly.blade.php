<div class="wrapper">

    @include('layouts.navbars.readonly')

    <div class="main-panel">
        @include('layouts.navbars.navs.readonly')
        @yield('content')
        @include('layouts.footer')
    </div>
</div>