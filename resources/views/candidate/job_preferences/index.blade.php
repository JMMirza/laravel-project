@extends('candidate.layouts.candidate_main')

@section('header')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Job Preferences</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Job Preferences</strong>
                </li>
            </ol>
        </div>
        <div class="col-sm-8">
            <div class="title-action">
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-md-12">
                <div class="ibox float-e-margins">
                    @if ($age > 20 && count($user_education) > 0 && $user->district_id != null && $user->taluka_id != null && $user->union_council != null && $user->profile_picture != null)
                        <div class="alert alert-danger">
                            Note: You can only add 3 Preferences.
                        </div>
                        <div class="ibox-content">
                            @if (isset($job_preference))
                                @include('candidate.job_preferences.edit')
                            @else
                                @if (isset($limit) && $limit < 0)
                                    @include('candidate.job_preferences.create')
                                @endif
                            @endif
                            <div id="warningDivShow" class="alert alert-danger" style="display: none">

                                You have to add 3 Preferences!
                            </div>
                            <table id="preferences-data-table"
                                class="table table-bordered table-striped align-middle table-nowrap mb-0"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Order</th>
                                        <th>District</th>
                                        <th>Taluka</th>
                                        <th>Village</th>
                                        <th>Union Council</th>
                                        <th>School Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>

                            <div class="col-sm-12 text-right">
                                <a href="{{ route('review-job-application') }}" class="btn btn-success btn-sm">
                                    Save & Go to Review Job Application</a>
                            </div>
                        </div>
                    @else
                        <div class="alert alert-danger">
                            You have to complete your information first.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@push('header_scripts')
@endpush


@push('footer_scripts')
    <script type="text/javascript">
        $(document).ready(function() {

            $('#preferences-data-table').DataTable({
                processing: true,
                serverSide: true,
                searching: false,
                responsive: true,
                bLengthChange: false,
                paging: false,
                ajax: "{{ route('job-preferences.index') }}",
                columns: [{
                        data: 'pref_order',
                        name: 'pref_order',
                        width: "2%"
                    },
                    {
                        data: 'district.name',
                        name: 'district.name',
                        width: "15%"
                    },
                    {
                        data: 'taluka.name',
                        name: 'taluka.name',
                        width: "15%"
                    },
                    {
                        data: 'village.name',
                        name: 'village.name',
                        width: "15%"
                    },
                    {
                        data: 'union_council.name',
                        name: 'union_council.name',
                        width: "15%"
                    },
                    {
                        data: 'school.name',
                        name: 'school.name',
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        width: "2%",
                        sClass: "text-center"
                    },
                ]
            });
        });
    </script>
@endpush
