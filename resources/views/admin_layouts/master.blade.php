<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

@include('admin_layouts.partials._head_admin')

<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
  
   @include('admin_layouts.partials._fixed_top')
   
   @include('admin_layouts.partials._sidebar')
   
   <div class="app-content content">
        <div class="content-wrapper">
            @yield('content')
        </div>
    </div> 
   
   @include('admin_layouts.partials._footer')
   
   @include('admin_layouts.partials._script_admin')

</body>
</html>