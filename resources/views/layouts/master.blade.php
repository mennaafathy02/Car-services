@include('layouts.head')
@include('layouts.top-bar')
@include('layouts.navbar')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">@yield('titlePage')</h1>
                </div>
                <div class="col-sm-6 filteration">
                    @yield("filter")
                </div>
            </div>
        </div>
    </div>
    @yield('page-header')
    <section class="content">
        <div class="container-fluid">
            @include('flash::message')
            @yield('content')
        </div>
    </section>
</div>
</div>
</div>
</div>
@include('layouts.footer')
@yield('footer_scripts')
</body>
</html>
