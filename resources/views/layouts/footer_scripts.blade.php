<!-- Mainly scripts -->
<script src="{{ asset('assets/js/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
<script src="{{ asset('assets/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

<!-- Custom and plugin javascript -->
<script src="{{ asset('assets/js/inspinia.js') }}"></script>
<script src="{{ asset('assets/js/plugins/pace/pace.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/sweetalert/sweetalert.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/dataTables/datatables.min.js') }}"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
<script src="{{ asset('assets/js/plugins/dataTables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/datapicker/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('assets/js/plugins/iCheck/icheck.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/toastr/toastr.min.js') }}"></script>
<script src="{{ asset('assets/js/flatpickr/flatpickr.js') }}"></script>

<!-- blueimp gallery -->
<script src="{{ asset('assets/js/plugins/blueimp/jquery.blueimp-gallery.min.js') }}"></script>
<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>
<script>
    $(":input").inputmask();
</script>
<script>
    function hideLoading() {
        $('.loading').hide();
    }

    function showLoading() {
        $('.loading').show();
    }

    $(document).ready(function() {
        $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
            $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
        })

        $('.client-checkbox').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });

        var mem = $('.datepicker').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true,
            startDate: new Date(),
            format: "dd/mm/yyyy",
        });

        $(document).on('click', '.delete-record', function(e) {
            e.preventDefault();

            var url = $(this).attr('href');
            var table = $(this).data('table');

            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: true
            }, function() {

                $.ajax({

                    url: url,
                    type: "DELETE",
                    // data : filters,
                    headers: {
                        'X-CSRF-Token': '{{ csrf_token() }}',
                    },
                    cache: false,
                    success: function(data) {
                        swal("Deleted!", "Your imaginary file has been deleted.",
                            "success");
                        $('#' + table).DataTable().ajax.reload(null, false);
                    },
                    error: function() {

                    },
                    beforeSend: function() {

                    },
                    complete: function() {

                    }
                });
            });
        });

        var current = window.location.href;
        // console.log(current);
        $('#side-menu li a').each(function() {
            // if the current path is like this link, make it active
            if ($(this).attr('href').indexOf(current) !== -1) {
                // console.log($(this).attr('href').indexOf(current), "hello");
                $(this).closest('li').addClass('active');
            }
        })

        // $("#side-menu").on('click', 'li', function() {
        //     // remove classname 'active' from all li who already has classname 'active'
        //     $("#side-menu li.active").removeClass("active");
        //     // adding classname 'active' to current click li 
        //     $(this).addClass("active");
        // });

        $(document).on('change', '.file_name', function(e) {
            var span = $(this).data('span');
            var fileName = e.target.files[0].name;
            console.log("change", span)
            $('#' + span).text('The file "' + fileName + '" has been selected.');
        });

        $(document).on('click', '#next_page', function(e) {
            e.preventDefault();
            var url = $(this).data('url');
            console.log("clicked", url)
        })

        // $(".load_select").select2({
        //     // theme: 'bootstrap4',
        //     placeholder: "Please select",
        //     allowClear: true
        // });

        $(".select-2").select2({
            // theme: 'bootstrap4',
            placeholder: "Please select",
            allowClear: true
        });
    });

    $(document).on('change', '.load_select', function(e) {


        var target = $(this).data('target');
        var url = $(this).data('url');

        console.log(target, url);

        $.ajax({

            url: url + '?id=' + $(this).val(),
            type: "GET",
            cache: false,
            success: function(data) {

                var options = '<option selected disabled> Select an Option</option>';

                if (data) {
                    $.each(data, function(index, value) {
                        options += '<option value="' + value.id + '">' + value.name +
                            '</option>';
                    });
                }
                $('select[name="' + target + '"]').html(options).attr('disabled', false);
            },
            error: function() {

            },
            beforeSend: function() {
                showLoading();
            },
            complete: function() {
                hideLoading();
            }
        });
    });

    $(document).on('change', '.load_select_city', function(e) {


        var target = $(this).data('target');
        var url = $(this).data('url');

        console.log(target, url);

        $.ajax({

            url: url + '?id=' + $(this).val(),
            type: "GET",
            cache: false,
            success: function(data) {

                var options = '';

                if (data) {
                    $.each(data, function(index, value) {
                        options +=
                            `<option value="${value.name}">${value.name} </option>`;
                    });
                }
                $('select[name="' + target + '"]').html(options).attr('disabled', false);
            },
            error: function() {

            },
            beforeSend: function() {
                showLoading();
            },
            complete: function() {
                hideLoading();
            }
        });
    });

    $(document).on('click', '.show-modal', function(e) {

        var target = $(this).data('target');
        var url = $(this).data('url');
        console.log('show modal', target, url);
        $.ajax({

            url: url,
            type: "GET",
            headers: {
                'X-CSRF-Token': '{{ csrf_token() }}',
            },
            cache: false,
            success: function(data) {
                $('#modal-div').html(data);
                $(target).modal('show');
            },
            error: function() {

            },
            beforeSend: function() {

            },
            complete: function() {

            }
        });
    });
</script>
