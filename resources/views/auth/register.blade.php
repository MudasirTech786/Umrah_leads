@extends('admin_layouts.app')
@section('content')
<div class="px-3 px-md-0 mt-5 pt-3">
         <div class="mt-3">
            <div class="p-3 bg-white border_radius">
               @if (count($errors) > 0)
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Fast Lines!</b>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>
               @endif
               <h4 class="text-center py-3">Register Account</h4>

               <ul class="nav nav-tabs d-flex text-center border-0 my-4">
                  <li class="nav-item" style="flex:1">
                     <a class="nav-link active" data-toggle="tab" href="#home">
                        <h6 class="mb-0">User</h6>
                     </a>
                  </li>
                  <li class="nav-item" style="flex:1">
                     <a class="nav-link" data-toggle="tab" href="#menu1">
                        <h6 class="mb-0">Company</h6>
                     </a>
                  </li>
               </ul>
 
               <!-- Tab panes -->
               <div class="tab-content">
                  <div class="tab-pane container p-0 active" id="home">
                     <form method="POST" action="{{ route('register') }}">
                        @csrf 
                     <div class="form-group">
                        <label for="usernameemail" style="font-size: 13px;font-weight: 500" class="w-100">
                           Name
                           <span class="float-right"><i class="fa fa-info-circle"></i> </span></label>
                        <input id="usernameemail" type="text" data-placement="top" data-toggle="tooltip"
                           name="first_name" class="form-control p-2" placeholder="Enter Name">
                     </div>
                     <div class="form-group">
                        <label for="usernameemail" style="font-size: 13px;font-weight: 500" class="w-100">
                           Email
                           <span class="float-right"><i class="fa fa-info-circle"></i> </span></label>
                        <input id="usernameemail" type="email" data-placement="top" data-toggle="tooltip"
                           title="Enter username / email" name="email" class="form-control p-2" placeholder="Enter email">
                     </div>
                     <div class="form-group">
                        <label for="password" style="font-size: 13px;font-weight: 500" class="w-100">Password <span
                              class="float-right"><i class="fa fa-info-circle"></i> </span></label></label>
                        <input type="password" class="form-control p-2" data-placement="top" data-toggle="tooltip"
                           title="Enter password" name="password" placeholder="Enter password" id="password">
                     </div>
                     <div class="form-group">
                        <label for="cPassword" style="font-size: 13px;font-weight: 500" class="w-100">Re-type
                           Password<span class="float-right"><i class="fa fa-info-circle"></i> </span></label></label>
                        <input data-placement="top" data-toggle="tooltip" title="Enter re-type password" type="password" name="password_confirmation" 
                           class="form-control p-2" placeholder="Enter re-type password" id="cPassword">
                     </div>

                     <div class="my-3">
                        <div class="col-md-6 p-0 mx-auto">
                           <a href="" class="w-100">
                              <button type ="submit" class="btn btn-primary w-100">Register</button>
                           </a>
                        </div>
                     </div>
                  </form>
                  </div>
                  <div class="tab-pane container p-0 fade" id="menu1">
                     <form method="POST" action="">
                        @csrf
                     <div class="form-group">
                        <label for="usernameemail" style="font-size: 13px;font-weight: 500" class="w-100">
                           Name
                           <span class="float-right"><i class="fa fa-info-circle"></i> </span></label>
                        <input id="usernameemail" name="name" type="text" data-placement="top" data-toggle="tooltip"
                           title="Enter Name" class="form-control p-2" placeholder="Enter Name" required>
                     </div>
                     <div class="form-group">
                        <label for="usernameemail" style="font-size: 13px;font-weight: 500" class="w-100">Username /
                           Email
                           <span class="float-right"><i class="fa fa-info-circle"></i> </span></label>
                        <input id="usernameemail" name="email" type="email" data-placement="top" data-toggle="tooltip"
                           title="email" class="form-control p-2" placeholder="Enter Email" required>
                     </div>
                     <div class="form-group">
                        <label for="password" style="font-size: 13px;font-weight: 500" class="w-100">Password <span
                              class="float-right"><i class="fa fa-info-circle"></i> </span></label></label>
                        <input type="password" class="form-control p-2" data-placement="top" data-toggle="tooltip"
                           title="Enter password" name="password" placeholder="Enter password" id="password" required>
                     </div>
                     <div class="form-group">
                        <label for="cPassword" style="font-size: 13px;font-weight: 500" class="w-100">Re-type
                           Password<span class="float-right"><i class="fa fa-info-circle"></i> </span></label></label>
                        <input data-placement="top" data-toggle="tooltip" title="Enter re-type password" type="password"
                           class="form-control p-2" name="password_confirmation" placeholder="Enter re-type password" id="cPassword">
                     </div>

                     <div class="my-3">
                        <div class="col-md-6 p-0 mx-auto">
                           <a href="" class="w-100">
                              <button class="btn btn-primary w-100">Register</button>
                           </a>
                        </div>
                     </div>
                     </form>
                  </div>
               </div>


               <div class="text-center">
                  <small class="text-muted"> if you have an account. <a href="{{ route('login') }}"><b>Sign in</b></a></small>
               </div>

            </div>
         </div>
      </div>
@endsection
@section('script')
<script>
   $(document).ready(function () {
      $('[data-toggle="tooltip"]').tooltip();
   });
</script>
<script type="text/javascript">
      window.setTimeout(function() {
          $(".alert").fadeTo(2000, 0).slideUp(2000, function(){
              $(this).remove(); 
          });
      }, 2000);
</script>
@endsection