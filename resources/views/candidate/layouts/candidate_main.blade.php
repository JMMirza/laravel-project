<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidate | Candidate Page</title>
    @include('layouts.header_scripts')
    @stack('header_scripts')
</head>
<style>
    #coming_soon {
        /* position: absolute; */
        /* top: auto; */
        /* left: 50%; */
        color: #2F4050;
        font-weight: 600;
    }
</style>

<body class="">
    <div class="loading" style="display:none;">Loading&#8230;</div>
    <div id="wrapper">

        @include('layouts.side_nav')

        <div id="page-wrapper" class="gray-bg">
            <div id="pop_up">
                @include('layouts.top_bar')

                {{-- @if (\Auth::user()->getProfileChecksAttribute())
                    <div class="widget red-bg no-padding">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="p-m">
                                    <!-- <h1 class="m-xs">Note! Please complete your profile</h1> -->
                                    <h3 class="font-bold no-margins">Note! Please complete your profile</h3>
                                    <ul>
                                        @foreach (\Auth::user()->getProfileChecksAttribute() as $single)
                                        <li>{{ $single }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-4">

                            </div>
                        </div>
                    </div>
                @endif --}}

                @yield('header')
                <div class="wrapper wrapper-content">
                    @include('layouts.flash-message')
                    @yield('content')
                </div>
                @include('layouts.footer')
            </div>
        </div>
    </div>
    <div id="modal-div">

    </div>
    @include('layouts.footer_scripts')
    @stack('footer_scripts')
</body>

</html>
