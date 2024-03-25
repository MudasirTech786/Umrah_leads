@extends('admin_layouts.master')


@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/sweetalert.css') }}">
    <script src="{{ asset('app-assets/js/core/libraries/jquery.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#link_table').DataTable({
                "aoColumnDefs": [{
                    "bSortable": false,
                    "aTargets": [0, 2]
                }],
                "bProcessing": true,
                "bServerSide": true,
                "aaSorting": [
                    [0, "desc"]
                ],
                "sPaginationType": "full_numbers",
                "sAjaxSource": "{{ url('/get_leads') }}",
                "aLengthMenu": [
                    [10, 50, 100, 500],
                    [10, 50, 100, 500]
                ]
            });
        });

        function deleteLead(id) {
            swal({
                    title: "Are you sure？",
                    text: "Do you want to delete this Lead",
                    icon: "warning",
                    buttons: {
                        cancel: {
                            text: "No , Cancel please！",
                            value: null,
                            visible: true,
                            className: "",
                            closeModal: false,
                        },
                        confirm: {
                            text: "Yes、Delete！",
                            value: true,
                            visible: true,
                            className: "",
                            closeModal: false
                        }
                    }
                })
                .then((isConfirm) => {
                    if (isConfirm) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            method: "DELETE",
                            url: '{{ route('leads.destroy', ['lead' => ':id']) }}'.replace(':id', id),
                            success: function(result) {
                                console.log(result)
                                if (result.status == "success") {
                                    $("#row_" + id).hide();
                                    swal("Success！", "Package has been deleted", "success");
                                }
                            }
                        })

                    } else {
                        swal("Error", "You are safe", "error");
                    }
                });

        }
    </script>
@endsection
@section('content')
    <div class="content-body">
        <section id="configuration">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="la la-cars"></i>
                            <h4 class="card-title">Route</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">
                                <p class="card-text"></p>
                                <table class="table table-striped table-bordered zero-configuration data-table"
                                    id="link_table">
                                    <thead>
                                        <tr>
                                            <th style="width:110px">Name</th>
                                            <th style="width:70px">Email</th>
                                            <th style="width:70px">Message</th>
                                            <th style="width:70px">Phone</th>
                                            <th style="width:70px">Country</th>
                                            <th style="width:70px">City</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
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


@section('script')
    <script type="text/javascript">
        window.setTimeout(function() {
            $(".alert").fadeTo(2000, 0).slideUp(2000, function() {
                $(this).remove();
            });
        }, 2000);
        $('.specialOffer').on('click', () => {
            $('.special_offer_parent').append(add_special_offer);
            if ($(".special_offer").length == 3) {
                $('.specialOffer').fadeOut(1)
            }
        });

        function remove_special_offer(e) {
            if ($(".special_offer").length == 3) {
                $('.specialOffer').fadeIn(1)
            }
            let targetvalue = e.target;
            $(targetvalue).parent().parent().remove();
        }
        $('.transportBtn').on('click', () => {
            $('.transport_parent').append(add_transport);
            if ($(".new_transport").length == 3) {
                $('.transportBtn').fadeOut(1)
            }
        });

        function remove_transport(e) {
            if ($(".new_transport").length == 3) {
                $('.transportBtn').fadeIn(1)
            }
            let targetvalue = e.target;
            $(targetvalue).parent().parent().remove();
        }
    </script>
@endsection
