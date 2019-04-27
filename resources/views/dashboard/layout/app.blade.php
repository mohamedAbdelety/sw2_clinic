@include('dashboard.layout.header')


@include('dashboard.layout.nav')





    <section class="content">
        @include('dashboard.layout.message')
        @yield('content')
    </section>




@include('dashboard.layout.fotter')
