@extends('admin.adminlayout.master')

@section('content')
 


        <!-- BEGIN CONTAINER -->
        <div class="page-container">
           <!-- Begin Sidebar  -->
            @include('admin.adminlayout.leftsidebar')
            <!-- End Sidebar  -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <!-- BEGIN THEME PANEL -->
                  {{--   @include('admin.adminlayout.themepanel') --}}
                    <!-- END THEME PANEL -->
                    @yield('container')
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            <!-- BEGIN QUICK Right SIDEBAR -->
            {{-- @include('admin.adminlayout.rightsidebar') --}}
            <!-- END QUICK Right SIDEBAR -->
        </div>
        <!-- END CONTAINER -->

@endsection