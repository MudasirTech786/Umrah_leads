@extends('admin_layouts.master')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/sweetalert.css') }}">
    <script src="{{ asset('app-assets/js/core/libraries/jquery.min.js') }}"></script>
    <script>
        // $(document).ready(function() {
        //     $('#link_table').DataTable({
        //         "aoColumnDefs": [{
        //             "bSortable": false,
        //             "aTargets": [0, 4]
        //         }],
        //         "bProcessing": true,
        //         "bServerSide": true,
        //         "aaSorting": [
        //             [0, "desc"]
        //         ],
        //         "sPaginationType": "full_numbers",
        //         "sAjaxSource": "{{ url('get_users') }}",
        //         "aLengthMenu": [
        //             [10, 50, 100, 500],
        //             [10, 50, 100, 500]
        //         ]
        //     });
        // });
    </script>
@endsection
@section('content')
    <div class="content-body">

        <section id="configuration">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Show Role</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                                </ul>
                            </div>
                            <div class="heading-elements">
                                <div class="pull-right">
                                    <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-content collapse show">

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Name:</strong>
                                        {{ $role->name }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Permissions:</strong>
                                        @if (!empty($rolePermissions))
                                            @foreach ($rolePermissions as $v)
                                                <label class="label label-success">{{ $v->name }},</label>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    <script src="{{ asset('app-assets/vendors/js/extensions/sweetalert.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 2000);
    </script>
    @if (Session::get('success'))
        <script>
            $(document).ready(function() {
                toastr.success('<?php echo Session::get('success'); ?>', 'Zindawork Says', {
                    timeOut: 2000
                })
            });
        </script>
    @endif
@endsection