@extends('admin_layouts.auth')
@section('content')
      <div class="content-body">
        <section class="flexbox-container">
          <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-10 box-shadow-2 p-0">
              <div class="card border-grey border-lighten-3 m-0">
                <div class="card-header border-0">
                @if (count($errors) > 0)
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Dayim</b>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                  <div class="card-title text-center">
                    <div class="p-1">
                      <h3>Dayim</h3>
                    </div>
                  </div>
                  <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                    <span>Login with Dayim</span>
                  </h6>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <form class="form-horizontal form-simple" method="POST" action="{{ route('login') }}" novalidate>
                      @csrf
                      <fieldset class="form-group position-relative has-icon-left mb-10">
                        <input type="text" name="email" class="form-control form-control-lg input-lg" id="user-name" placeholder="Your Email"
                        required>
                        <div class="form-control-position">
                          <i class="ft-user"></i>
                        </div>
                      </fieldset>
                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="password" name="password" class="form-control form-control-lg input-lg" id="user-password"
                        placeholder="Enter Password" required>
                        <div class="form-control-position">
                          <i class="la la-key"></i>
                        </div>
                      </fieldset>
                      <div class="form-group row">
                        <div class="col-md-6 col-12 text-center text-md-left">
                          <fieldset>
                            <!-- <input type="checkbox" id="remember-me" class="chk-remember"> -->
                            <!-- <label for="remember-me"> Remember Me</label> -->
                          </fieldset>
                        </div>
                        <!-- <div class="col-md-6 col-12 text-center text-md-right"><a href="recover-password.html" class="card-link">Forgot Password?</a></div> -->
                      </div>
                      <button type="submit" class="btn btn-info btn-lg btn-block"><i class="ft-unlock"></i> Login</button>
                    </form>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="">
                    <!-- <p class="float-sm-left text-center m-0"><a href="recover-password.html" class="card-link">Recover password</a></p> -->
                    <!-- <p class="float-sm-right text-center m-0">New to Dayim? <a href="register-simple.html" class="card-link">Sign Up</a></p> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>

@section('script')
<script type="text/javascript">
      window.setTimeout(function() {
          $(".alert").fadeTo(2000, 0).slideUp(2000, function(){
              $(this).remove(); 
          });
      }, 2000);
</script>
@endsection
@endsection