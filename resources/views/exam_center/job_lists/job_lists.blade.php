@extends('exam_center.layouts.exam_center_main')

@section('header')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>List of Jobs</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="">Home</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>List of Jobs</strong>
                </li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    @include('exam_center.job_lists.edit_job')
@endsection
@push('footer_scripts')
    <script>
        $(document).ready(function() {
            $("#job_valid_till").flatpickr({
                altInput: true,
                dateFormat: "Y-m-d",
                altFormat: "F j, Y",
            });

            $('.js-example-basic-single').select2({
                placeholder: "Select city",
                allowClear: true,
                search: true,
                selectAll: true,
                tags: true,
                tokenSeparators: [',', ' ']
            });
        })
    </script>
    <script src="{{ asset('assets/js/plugins/summernote/summernote-bs4.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 200
            });
        });
    </script>
    <script>
        $(document).ready(function() {

            // init datatable.
            var jobList = $('#job-list').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                autoWidth: false,
                scrollX: true,
                searching: false,
                paging: false,
                pageLength: 50,
                "order": [
                    [0, "desc"]
                ],
                ajax: {
                    url: "{{ route('job-lists.index') }}",
                    data: function(d) {
                        d.country_id = $('#country_id').val();
                        d.state_id = $('#state_id').val();
                        d.city_id = $('#city_id').val();
                        // d.exam_center_id = $('#exam_center_id').val();
                        d.search_term = $('#search_term').val();
                    }
                },
                columns: [{
                        data: 'job_title',
                        name: 'job_title'
                    },
                    {
                        data: 'job_education',
                        name: 'job_education'
                    }, //candidate cnic number
                    {
                        data: 'job_max_age',
                        name: 'job_max_age'
                    }, //candidate exam title
                    {
                        data: 'job_selection_criteria',
                        name: 'job_selection_criteria'
                    }, //candidate exam registration numner
                    {
                        data: 'job_email',
                        name: 'job_email'
                    }, // candidate arriavel
                    {
                        data: 'job_postal_address',
                        name: 'job_postal_address'
                    }, // candidate arriavel
                    {
                        data: 'city_names',
                        name: 'city_names'
                    }, // candidate arriavel
                    {
                        data: 'job_valid_till',
                        name: 'job_valid_till'
                    }, // candidate arriavel
                    {
                        data: 'job_applications.length',
                        name: 'job_applications.length'
                    }, // candidate arriavel
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        serachable: false,
                        sClass: 'text-center'
                    },
                ]
            });

            $(document).on('change', '#country_id, #state_id, #city_id', function(e) {
                console.log('searching...');
                jobList.ajax.reload(null, false);
            });

            $(document).on('keyup', '#search_term', function(e) {
                console.log('searching...');
                jobList.ajax.reload(null, false);
            });
        });
    </script>
@endpush
