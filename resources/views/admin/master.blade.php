<!DOCTYPE html>
<html lang="en">

@include('admin.head')

<body>

<div class="wrapper">

    <!--=================================
     preloader -->

    <div id="pre-loader">
        <img src="{{ URL::asset('assets/images/pre-loader/loader-01.svg') }}" alt="">
    </div>

    <!--=================================
     preloader -->

    @include('admin.header')

    <!--=================================
     Main content -->

    <div class="container-fluid">
        <div class="row">

        @include('admin.main-sidebar')



            <!--=================================
           wrapper -->

            <div class="content-wrapper">
                @yield('page-header')

                @yield('content')
                <!--=================================
                 wrapper -->

                <!--=================================
                 footer -->

               @include('admin.footer')

            </div><!-- main content wrapper end-->
        </div>
    </div>
</div>

<!--=================================
 footer -->



<!--=================================
 jquery -->

@include('admin.script')

</body>
</html>
