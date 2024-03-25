<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
@include('admin_layouts.partials._head_auth')

<body class="vertical-layout vertical-menu-modern 1-column   menu-expanded blank-page blank-page"
data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
    
<div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
            @yield('content')
        </div>
</div>
</div>

    @include('admin_layouts.partials._script_auth')

</body>
</html>
