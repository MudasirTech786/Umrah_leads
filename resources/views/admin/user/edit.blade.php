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
                            <b><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Dayim!</b>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    @endif
                    <div class="card-body">
                        <form class="form form-horizontal" method="POST" action="{{ route('users.update', $route->id) }}"
                            enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <div class="form-body">
                                <h4 class="form-section"><i class="la la la-car"></i>Edit User</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Profile Picture</label>
                                            <div
                                                style="display: flex; align-items: center; justify-content: space-between; ">
                                                @if ($route->image != null)
                                                    <img src="{{ asset('uploads/' . $route->image) }} "
                                                        style="width:70px; height:70px; border: 1px solid #ccc; /* Add border */
                                                    border-radius: 5px; margin-left:142px;
                                                    padding: 5px;
                                                    margin-top: 5px;">
                                                @else
                                                    <img src="{{ asset('app-assets/images/profile/profile_picture.jpeg') }} "
                                                        style="width:70px; height:70px; border: 1px solid #ccc; /* Add border */
                                                    border-radius: 5px; margin-left:142px;
                                                    padding: 5px;
                                                    margin-top: 5px;">
                                                @endif
                                                <div class="col-md-9">
                                                    <input type="file" class="form-control border-primary"
                                                        name="image">
                                                </div>
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
                                                    placeholder="First Name" value="{{ $route->first_name }}"
                                                    name="first_name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 row">
                                        <label class="col-md-3 label-control" for="userinput1">Last Name</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control border-primary"
                                                placeholder="Last Name" value="{{ $route->last_name }}" name="last_name">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">DOB</label>
                                            <div class="col-md-9">
                                                <input type="date" value="{{ $route->dob }}"
                                                    class="form-control border-primary" name="dob">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 row">
                                        <label class="col-md-3 label-control" for="userinput1">Gender</label>
                                        <div class="col-md-9">
                                            <select class="form-control border-primary" value="{{ $route->gender }}"
                                                name="gender">
                                                <option selected>Select Gender</option>
                                                <option value="M"selected>Male</option>
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
                                                <input type="number" value="{{ $route->id_card }}"
                                                    class="form-control border-primary" placeholder="Card Number"
                                                    name="id_card">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 row">
                                        <label class="col-md-3 label-control" for="userinput1">Designation</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control border-primary"
                                                placeholder="Designation" value="{{ $route->designation }}"
                                                name="designation">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Phone</label>
                                            <div class="col-md-9">
                                                <input type="number" class="form-control border-primary"
                                                    placeholder="Phone" value="{{ $route->phone }}" name="phone">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 row">
                                        <label class="col-md-3 label-control" for="userinput1">Address</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control border-primary"
                                                placeholder="Address" name="address" value="{{ $route->address }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Email</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control border-primary"
                                                    placeholder="Email" value="{{ $route->email }}" name="email">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 row">
                                        <label class="col-md-3 label-control" for="userinput1">Change Password</label>
                                        <div class="col-md-9">
                                            <input type="password" class="form-control border-primary" value=""
                                                name="password">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput1">Role</label>
                                            <div class="col-md-6">
                                                <select name="roles" class="form-control" style="width: 500px">
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
                                    <i class="la la-check-square-o"></i> Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
