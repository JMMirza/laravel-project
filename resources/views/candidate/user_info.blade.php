<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Candidate Information</title>
    <style type="text/css">
        body {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        }

        .logo {

            margin-right: 20px;
            width: 120px;
        }

        .qr-code {
            width: 120px;
        }

        .width-full {

            /*width: 216mm;*/
            margin-top: 10px;
            font-size: 12px;
            height: auto;
        }

        .box {
            width: 20px;
            height: 20px;
            border: 1px solid #000000;
            margin-left: -1px;
            text-align: center;
            float: left;
            display: block;
            margin-bottom: 2px;
            line-height: 20px;
        }

        #marks {
            font-size: 12px;
            border-collapse: collapse;
            width: 100%;
        }

        #marks td,
        #marks th {
            border: 1px solid #000000;
            padding: 6px 3px 6px 3px;
            text-align: center;
        }

        .photo {
            width: 15mm;
            border: 1px solid black;
            text-align: left;
            margin: 10px;
        }

        .basic {
            border-collapse: collapse;
            width: 100%;
            font-size: 12px;
        }




        .basic td,
        .basic th {
            border: 1px solid #000000;
            padding: 6px 3px 6px 3px;
            /*width: 25%;*/
        }

        #photo {

            width: 35mm;
            height: 45mm;
            /*border: 1px solid #000000;*/
            position: absolute;
            right: 18mm;
            top: 60mm;
            border-radius: 10px;
        }

        #under-photo {

            width: 35mm;
            height: 20mm;
            border: 1px solid #000000;
            position: absolute;
            right: 18mm;
            top: 110mm;
            border-radius: 10px;
        }

        #fields {

            font-size: 12px;
        }

        #fields td {

            padding-top: 5px;
            padding-bottom: 5px;
        }

        #subjects {

            width: 85%;
            margin-top: 10px;
        }

        #subjects td {

            height: 25px;
            font-size: 12px;
        }

        li {
            font-size: 12px;
        }

        #signature {
            float: right;
            font-size: 12px;

        }

        hr {
            border-top: 1px dashed black;
        }

        .challan-no {
            text-align: right;
        }

        .challan-no p {
            font-size: 12px;
        }

    </style>
</head>

<body class="A4">
    <table style="width: 100%;">
        <tr>
            <td>
                <hr />
            </td>
        </tr>
        <tr>
            <td>
                <table style="width: 100%;">
                    <tr>
                        <td style="text-align: left">
                            <img class="logo" src="assets/img/pdlc_logo.jpg" alt="no picture">
                        </td>
                        <td style="text-align: center">
                            <p style="margin: 2px;">
                                <br>
                                <strong>Teach For Change - Batch II </strong>
                            </p>
                            <p style="margin: 2px;">
                                <br>
                                Sindh Education Foundation
                            </p>
                        </td>
                        <td style="text-align: right">
                            <img class="logo" src="assets/img/pdlc.png" alt="no picture">
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <hr />
            </td>
        </tr>
        <tr>
            <td style="width: 100%;">
                <table class="basic" style="width: 40%">
                    <tr>
                        <th>Application ID</th>
                        <td>{{ $data->id }}</td>
                    </tr>
                    <tr>
                        <th>Application Date</th>
                        <td>{{ $data->created_at->format('d M,Y') }}</td>
                    </tr>
                    <tr>
                        <th>Applied For</th>
                        <td>Teaching Support Associate</td>
                    </tr>
                </table>
            <th style="text-align:right">

                @if ($data->user->profile_picture)
                    <img class="logo" alt="profile picture"
                        src="uploads/candidates_images/{{ $data->user->profile_picture }}">
                @else
                    <img class="logo" src="assets/img/avatar.jpg" alt="no picture">
                @endif

            </th>
            </td>
        </tr>
        <tr>
            <td>
                <hr />
            </td>
        </tr>
        <tr>
            <td>
                <table class="basic" id="personal_info">
                    <tr>
                        <th style="width: 30%">Applicant Name</th>
                        <td>{{ ucfirst($data->user->name) }}</td>
                        <th style="width: 30%">SO / DO / WO </th>
                        <td>{{ ucfirst($data->user->father_name) }}</td>
                    </tr>
                    <tr>
                        <th style="width: 30%">Gender</th>
                        <td>{{ ucfirst($data->user->gender) }}</td>
                        <th style="width: 30%">Religion</th>
                        <td>{{ $data->user->religion }}</td>
                    </tr>
                    <tr>
                        <th style="width: 30%">CNIC NO</th>
                        <td>{{ $data->user->cnic_number }}</td>
                        <th style="width: 30%">Email</th>
                        <td>{{ $data->user->email }}</td>

                    </tr>

                    <tr>
                        <th style="width: 30%">Marital Status</th>
                        <td>{{ ucfirst($data->user->maritial_status) }}</td>
                        <th style="width: 30%">Date Of Birth</th>
                        <td>{{ $data->user->dob }}</td>
                    </tr>
                    <tr>
                        <th style="width: 30%">Domicile District</th>
                        <td>{{ $data->user->place_of_birth }}</td>
                        <th style="width: 30%">Taluka</th>
                        <td>{{ $data->user->place_of_birth }}</td>
                    </tr>
                    <tr>
                        <th style="width: 30%">Postal Address</th>
                        <td colspan="3">{{ $data->user->current_address }}</td>
                    </tr>
                    <tr>
                        <th style="width: 30%">Permanent Address</th>
                        <td colspan="3">{{ $data->user->permanent_address }}</td>
                    </tr>

                </table>
            </td>
        </tr>
        <tr>
            <td>
                <hr />
            </td>
        </tr>
        <tr>
            <td>
                <table>
                    <tr>
                        <td>
                            <h3>School Preferences List</h3>
                        </td>
                    </tr>
                </table>
                <table class="basic">
                    <tr>
                        <th style="width: 10%">School Code</th>
                        <th style="width: 15%">District</th>
                        <th style="width: 15%">Taluka</th>
                        <th style="width: 15%">Village</th>
                        <th style="width: 15%">Union Council</th>
                        <th style="width: 35%">School</th>
                    </tr>
                    @if (count($candidate_prefrences) > 0)
                        @foreach ($candidate_prefrences as $prefrences)
                            <tr>
                                <td align="center">{{ $prefrences->school->school_code }}</td>
                                <td align="center">{{ ucfirst($prefrences->district->name) }}</td>
                                <td align="center">{{ $prefrences->taluka->name }}</td>
                                <td align="center">{{ $prefrences->village->name }}</td>
                                <td align="center">{{ $prefrences->union_council->name }}</td>
                                <td align="center">{{ $prefrences->school->name }}</td>

                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan='5' align="center"> No Record Found!</td>

                        </tr>
                    @endif
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <hr />
            </td>
        </tr>
        <tr>
            <td>
                <table>
                    <tr>
                        <td>
                            <h3>Educational Qualification</h3>
                        </td>
                    </tr>
                </table>
                <table class="basic">
                    <tr>
                        <th rowspan="2" style="width: 30%">Degree</th>
                        <th rowspan="2" style="width: 30%">Institute</th>
                        <th rowspan="2" style="width: 30%">Roll No</th>
                        <th colspan="2" style="width: 30%">Marks</th>
                        <th rowspan="2" style="width: 30%">%</th>
                        <th colspan="2" style="width: 30%">Year</th>
                    </tr>
                    <tr>
                        <th style="width: 30%">Total</th>
                        <th style="width: 30%">Obtained</th>
                        <th style="width: 30%">Addmission</th>
                        <th style="width: 30%">Passing</th>
                    </tr>
                    @if (count($education) > 0)
                        @foreach ($education as $edu)
                            <tr>
                                <td align="center">{{ ucfirst($edu->academic_achievement) }}</td>
                                <td align="center">{{ ucfirst($edu->institute_name) }}</td>
                                <td align="center">{{ $edu->roll_number }}</td>
                                <td align="center">{{ $edu->total_marks }}</td>
                                <td align="center">{{ $edu->obtain_marks }}</td>
                                <td align="center">{{ round(($edu->obtain_marks / $edu->total_marks) * 100) }}%</td>
                                <td align="center">{{ $edu->year_of_admission }}</td>
                                <td align="center">{{ $edu->passing_year }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan='8' align="center"> No Record Found!</td>

                        </tr>
                    @endif
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <hr />
            </td>
        </tr>

        <tr>
            <td>
                <table>
                    <tr>
                        <td>
                            <h3>Diploma/Certificate</h3>
                        </td>
                    </tr>
                </table>
                <table class="basic">
                    <tr>
                        <th rowspan="2" style="width: 30%">Certification/Diploma</th>
                        <th rowspan="2" style="width: 30%">Institute</th>
                        <th rowspan="2" style="width: 30%">Duration</th>
                        <th colspan="2" style="width: 30%">Date</th>
                    </tr>
                    <tr>
                        <th style="width: 30%">Start</th>
                        <th style="width: 30%">End</th>
                    </tr>
                    @if (count($certificate) > 0)
                        @foreach ($certificate as $cert)
                            <tr>
                                <td align="center">{{ ucfirst($cert->name) }}</td>
                                <td align="center">{{ ucfirst($cert->institute_name) }}</td>
                                <td align="center">{{ $cert->duration }}</td>
                                <td align="center">{{ $cert->start_date }}</td>
                                <td align="center">{{ $cert->end_date }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan='5' align="center"> No Record Found!</td>

                        </tr>
                    @endif
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <hr />
            </td>
        </tr>
        <tr>
            <td>
                <table>
                    <tr>
                        <td>
                            <h3>Work Experience</h3>
                        </td>
                    </tr>
                </table>
                <table class="basic">
                    <tr>
                        <th rowspan="2" style="width: 30%">Orgnaization</th>
                        <th rowspan="2" style="width: 30%">Designation</th>
                        <th colspan="2">Date </th>
                        {{-- <th></th> --}}
                    </tr>
                    <tr>
                        <th style="width: 30%">Joining Date</th>
                        <th style="width: 30%">Ending Date</th>
                    </tr>
                    @if (count($experience) > 0)
                        @foreach ($experience as $exp)
                            <tr>
                                <td align="center">{{ ucfirst($exp->organization_name) }}</td>
                                <td align="center">{{ ucfirst($exp->designation) }}</td>
                                <td align="center">{{ $exp->date_from }}</td>
                                @if ($exp->present)
                                    <td align="center">Present</td>
                                @else
                                    <td align="center">{{ $exp->date_to }}</td>
                                @endif
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan='4' align="center"> No Record Found!</td>
                        </tr>
                    @endif
                </table>
            </td>
        </tr>
    </table>
    <p style="font-size: 12px;">
        <strong>Declaration:</strong> <br />

    <ul>

        <li>I have read and understood the programme eligibility requirement.</li>
        <li>I declare that all the information in the application is true, complete and accurate.</li>
        <li>I understand that the Premier DLC reserves the right to refuse/cancel/declare null and void my application
            or
            appointment in case of suppression of fact, misrepresent of fact misleading/false or fraudulent information
        </li>
    </ul>
    </p>

    <p style="font-size: 12px; text-align:right">
        <strong>Applicant Signature: _______________________________</strong> <br />
    </p>
    <p style="font-size: 12px;">
        <strong>Note:</strong> <br />
    <ul>

        <li>Only short-listed candidate will be contacted.</li>
        <li>Signed printed application form should be sent at the following address
            <ul style="list-style: none">
                <li><strong>Premier DLC</strong></li>
                <li>Teach For Change </li>
                <li>Jinnah Cooperative Housing Society</li>
                <li>H.No 43, Block 7/8</li>
                <li>Off Tipu Sultan Road </li>
                <li>Karachi</li>
            </ul>
        </li>
    </ul>
    </p>
</body>

</html>
