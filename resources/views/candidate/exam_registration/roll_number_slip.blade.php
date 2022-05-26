<!DOCTYPE html>
<html lang="en">

<head>
    <meta content="text/html; charset=utf-8" http-equiv=Content-Type>
    <title>A4</title>

    <style type="text/css">
        @font-face {
            /*font-family: 'Noto Serif Display', serif;*/
            font-family: 'Jameel-Noori-Nastaleeq-Kasheeda';
            /*font-family: 'Noto Nastaliq Urdu';*/
            {{-- src: url({{ asset('assets/fonts/NotoNastaliqUrdu-Regular.ttf') }}) format("truetype"); --}} {{-- src: url({{ asset('assets/fonts/Jameel-Noori-Nastaleeq-Regular.ttf') }}) format("truetype"); --}} {{-- src: url({{ asset('assets/fonts/NotoSerifDisplay-SemiBold.ttf') }}) format("truetype"); --}} src: url({{ asset('assets/libs/Jameel-Noori-Nastaleeq-Kasheeda.ttf') }}) format("truetype");
            font-weight: normal; // use the matching font-weight here ( 100, 200, 300, 400, etc).
            font-style: normal; // use the matching font-style here
        }

        body {
            /*font-family: 'Jameel Noori Nastaleeq';*/
            /*font-family: 'Noto Serif Display', serif;*/
            /*font-family: 'Jameel Noori Nastaleeq Regular', Sans-Serif;*/
        }

        .urdu-text {
            /*font-family: 'Noto Serif Display', serif;*/
            /*font-family: 'Jameel Noori Nastaleeq Regular', 'Alvi Nastaleeq', 'Pak Nastaleeq', 'Nafees Web Naskh', 'Urdu Naskh Asiatype', Tahoma, 'Lucida Grande', Verdana, Arial, Sans-Serif;*/
            /*font-family: 'Noto Nastaliq Urdu';*/
            /*font-family: 'Jameel Noori Nastaleeq';*/
            /*font-family: 'Jameel-Noori-Nastaleeq-Kasheeda', 'Alvi Nastaleeq', 'Pak Nastaleeq', 'Nafees Web Naskh', 'Urdu Naskh Asiatype';*/
            font: normal 12px/20px Jameel-Noori-Nastaleeq-Kasheeda;
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

            width: 100%;
            height: 100%;
            border: 1px solid black;
            text-align: left;
        }

        #basic {

            border-collapse: collapse;
            width: 100%;
            font-size: 12px;
        }


        #basic td,
        #basic th {
            border: 1px solid #000000;
            padding: 6px 3px 6px 3px;
            /*width: 25%;*/
        }

        #photo {

            width: 35mm;
            height: 45mm;
            border: 1px solid #000000;
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
            font-size: 12px;

        }

    </style>
</head>

<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->

<body class="A4">

    <!-- Each sheet element should have the class "sheet" -->
    <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
    <section class="sheet padding-10mm watermark">

        <table style="width: 100%;">
            <tr>
                <td style="width: 15%" rowspan="4">
                    @if ($data->user->profile_picture)
                        <img class="logo" alt="profile picture"
                            src="uploads/candidates_images/{{ $data->user->profile_picture }}">
                    @else
                        <img class="logo" src="assets/img/avatar.jpg" alt="no picture">
                    @endif

                </td>
                <td style="width: 85%;">
                    <p style="margin: 2px;">
                        {{-- {{ $data->timeslot->exam_calander->exam->exam_title }} --}}
                        <small>ROLL NUMBER SLIP </small>
                    </p>
                    <p style="font-size: 13px;">
                        <br>
                        Name: {{ $data->user->name }}
                    </p>
                    <p style="font-size: 13px;">
                        <br>
                        SO/DO/WO: {{ $data->user->father_name }}
                    </p>

                    {{-- <p style="font-size: 12px;">
                        <strong>{{ $data->timeslot->exam_calander->exam_center->address }}</strong>
                    </p> --}}
                </td>
                {{-- <td style="width: 15%" rowspan="4">
                <!-- <img class="qr-code" src="assets/img/qrcode.jpg"> -->
                {!! QrCode::size(120)->generate($data->reg_number) !!}
            </td> --}}
            </tr>
            <tr>
                <td>
                </td>
            </tr>
        </table>

        <br>
        <p style="font-size: 14px; text-align:center">
            Dear Applicant, it is to inform you that Recruitment Test for PST (BPS-14), School
            <strong>Education Literacy Department, Government of Sindh</strong> is scheduled as under:
        </p>
        <table id="basic">
            <tr>
                <th align="center" style="width: 130px">Applied For</th>
                <th align="center" style="width: 150px">Test Date</th>
                <th align="center" style="width: 150px">Reporting Time</th>
                {{-- <th align="center" style="width: 200px">Venue</th> --}}
            </tr>
            <tr>
                <td align="center">{{ $data->job_announcement->job_title }}</td>
                <td align="center">{{ $data->job_announcement->job_valid_till }}</td>
                <td align="center">{{ $data->job_announcement->created_at }}</td>
            </tr>

        </table>
        <p style="font-size: 14px; text-align:center">
            Test Venue: <strong>Education Literacy Department, Government of Sindh</strong>
        </p>

        <p style="font-size: 12px; ">
            <strong>Note:</strong> <br />
        </p>
        <ol class="list-group list-group-numbered">
            <li>You are required to bring the admit card slip along with original National Identity Card CNIC
                (Mandatory).
            </li>
            <li>Mobile phones/calculators or any other electronic device is not allowed.</li>
            <li>No candidate will be allowed to appear in the test after test starts.</li>
            <li>No candidate may leave the exam hall in the first half an hour after start of the test & before half an
                hour of the end of the test.</li>
            <li>Please take print out of the application form from the website & bring it with you.</li>
            <li>Please bring one set of photocopies of following documents;
                <ol class="list-group list-group-numbered">
                    <li>Educational documents</li>
                    <li>Experience certificates</li>
                </ol>
            </li>
            <li>Wearing mask is mandatory as per COVID-19 SOPs. No any candidate will be allowed in the test center
                without mask.</li>
        </ol>
        {{-- <p style="font-size: 12px;" id="" class="text-right urdu-text" dir="rtl"> --}}
        {{-- <strong>ضروری هدایات:</strong> --}}
        {{-- </p> --}}
        {{-- <ul dir="rtl" class="urdu-text"> --}}
        {{-- <li>اصلی قومی شناختی کارڈ اور ایڈمٹ کارڈ/ سلپ لانا لازمی ہے۔</li> --}}
        {{-- <li>موبائل فون،پرس،کیلکولیٹر اور دیگر الیکٹرانک اشیاء ٹیسٹ سینٹر میں لانے کی اجازت نهیں هـ ے </li> --}}
        {{-- <li>ٹیسٹ شروع هونے کے بعد کسی بھی امیدوار کو ٹیسٹ سینٹر میں داخلے کی اجازت نهیں هے</li> --}}
        {{-- <li>کسی بھی امیدوار کو ٹیسٹ شروع هونے سے آدھا گھنٹه پهلے اور ٹیسٹ ختم هونے سے آدھا گھنٹہ پهلے امتحانی مرکز --}}
        {{-- چھورنے کی اجازت نهیں هوگی --}}
        {{-- </li> --}}
        {{-- <li>ماسک پهنا لازمی هے، کسی بھی امیدوار کو ماسک کے بنا ٹیسٹ سینٹر میں داخل نهیں هونے دیا جاهے گا</li> --}}
        {{-- </ul> --}}
        <p style="text-align:center; font-size:12px;margin-top:35px;">
            <strong>You are advised to appear for the test as per above given schedule.</strong>
        </p>

        <p style="text-align:center; font-size:12px;">
            <strong>Examination Officer <br />Teach for Change-SEF Examination
                Department</strong>
        </p>

    </section>

</body>

</html>
