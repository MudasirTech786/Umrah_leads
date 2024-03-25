@extends('admin_layouts.master')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/selects/selectize.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/selects/selectize.default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/selectize/selectize.css') }}">
    <script src="https://kit.fontawesome.com/d868f4cf6e.js" crossorigin="anonymous"></script>
@endsection
@section('content')
    <div class="content-header row">
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-content collpase show">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <b><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Fast Lines!</b>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    @endif
                    <div class="card-body">
                        <form class="form form-horizontal" method="POST" action="{{ route('users.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <h4 class="form-section"><i class="la la la-car"></i>Add User</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Profile Picture</label>
                                            <div class="col-md-9">
                                                <input type="file" class="form-control border-primary" name="image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">First Name</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control border-primary"
                                                    placeholder="First Name" name="first_name" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 row">
                                        <label class="col-md-3 label-control" for="userinput1">Last Name</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control border-primary"
                                                placeholder="Last Name" name="last_name" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Email</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control border-primary"
                                                    placeholder="Email" name="email" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 row">
                                        <label class="col-md-3 label-control" for="userinput1">Password</label>
                                        <div class="col-md-9">
                                            <input type="password" class="form-control border-primary" placeholder="Password"
                                                name="password" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">DOB</label>
                                            <div class="col-md-9">
                                                <input type="date" class="form-control border-primary" name="dob"
                                                    >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 row">
                                        <label class="col-md-3 label-control" for="userinput1">Gender</label>
                                        <div class="col-md-9">
                                            <select class="form-control border-primary" name="gender" >
                                                <option selected disabled="">Select Gender</option>
                                                <option value="M">Male</option>
                                                <option value="F">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">ID Card</label>
                                            <div class="col-md-9">
                                                <input type="number" class="form-control border-primary"
                                                    placeholder="Card Number" name="id_card" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 row">
                                        <label class="col-md-3 label-control" for="userinput1">Designation</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control border-primary"
                                                placeholder="Designation" name="designation" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Phone</label>
                                            <div class="col-md-9">
                                                <input type="number" class="form-control border-primary"
                                                    placeholder="Phone" name="phone" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 row">
                                        <label class="col-md-3 label-control" for="userinput1">Address</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control border-primary"
                                                placeholder="Address" name="address" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Role</label>
                                            <div class="col-md-6">
                                                <select name="roles" class="form-control">
                                                    @foreach ($roles as $roleName)
                                                        <option value="{{ $roleName }}">{{ $roleName }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions center">
                                <button type="submit" class="btn btn-primary col-md-3">
                                    <i class="la la-check-square-o"></i> Save
                                </button>
                            </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('app-assets/vendors/js/forms/select/selectize.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app-assets/js/core/libraries/jquery_ui/jquery-ui.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/select/form-selectize.js') }}" type="text/javascript"></script>

    <script type="text/javascript">
        window.setTimeout(function() {
            $(".alert").fadeTo(2000, 0).slideUp(2000, function() {
                $(this).remove();
            });
        }, 2000);
    </script>
    @if (Session::get('success'))
        <script>
            $(document).ready(function() {
                toastr.success('<?php echo Session::get('success'); ?>', 'Fast Lines Says', {
                    timeOut: 2000
                })
            });
        </script>
    @endif
@endsection