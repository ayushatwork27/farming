@extends('user.userlayout.master')

@section('content')
 


        <!-- BEGIN CONTAINER -->
        <div class="page-container">
           <!-- Begin Sidebar  -->
            @include('user.userlayout.leftsidebar')
            <!-- End Sidebar  -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <!-- BEGIN THEME PANEL -->
                  {{--   @include('user.userlayout.themepanel') --}}
                    <!-- END THEME PANEL -->
                    @yield('container')
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            <!-- BEGIN QUICK Right SIDEBAR -->
            {{-- @include('user.userlayout.rightsidebar') --}}
            <!-- END QUICK Right SIDEBAR -->
        </div>
        <!-- END CONTAINER -->

@endsection