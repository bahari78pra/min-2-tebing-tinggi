<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta id="token" name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <title>MIN 2 Kota Tebing Tinggi || Administrator</title>
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/vendor.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('themify-icons/themify-icons.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('imgs/logo-kemenag.png') }}">

    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />

    {{-- CKEditor --}}
    {{-- <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
  <script src="{{ asset('ckeditor/samples/js/sample.js') }}"></script>
  <link rel="stylesheet" href="{{ asset('ckeditor/samples/css/samples.css') }}">
  <link rel="stylesheet" href="{{ asset('ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css') }}"> --}}
    <link href="{{ asset('plugins/summernote/summernote.css') }}" rel="stylesheet" />
    {{-- <script src="https://cdn.tiny.cloud/1/8hgzietxn678ovujp63f1woelnb4etpjtrv07hsf4s7wqpkx/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> --}}
    {{-- Sweet Alert --}}
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>


    {{-- TinyMce --}}
    {{-- <script src="https://cloud.tinymce.com/5/tinymce.min.js"></script> --}}
    {{-- <script>tinymce.init({ selector:'textarea' });</script> --}}
</head>

<body class="app" style="background:url({{ asset('images/spikes.png') }})">
    <div>
        <div class="sidebar">
            <div class="sidebar-inner">
                <div class="sidebar-logo">
                    <div class="peers ai-c fxw-nw">
                        <div class="peer peer-greed"><a class="sidebar-link td-n" href="{{ route('admin./') }}">
                                <div class="peers ai-c fxw-nw">
                                    <div class="peer">
                                        <div class="logo">
                                            <img src="{{ asset('imgs/logo-kemenag.png') }}"
                                                style='max-width:70px;margin-top:5px;padding:10px;'>
                                        </div>
                                    </div>
                                    <div class="peer">
                                        <h5 class="lh-1 mB-0 logo-text" style="color: #000;">Menu Utama</h5>
                                    </div>
                                </div>
                            </a></div>
                        <div class="peer">
                            <div class="mobile-toggle sidebar-toggle"><a href="" class="td-n"><i
                                        class="ti-arrow-circle-left"></i></a></div>
                        </div>
                    </div>
                </div>
                @include('partials.admin.nav');
            </div>
        </div>
        <div class="page-container">
            <div class="header navbar">
                <div class="header-container">
                    <div class="top-title"><i>Administrator</i> | MIN 2 Tebing Tinggi</div>
                    <ul class="nav-right">
                        <li class="dropdown">
                            <div
                                style="position: absolute;top: 22px;right: 50px;text-align: right;width: 300px;font-weight: 400;">
                            </div>
                            <a href="" class="dropdown-toggle no-after peers fxw-nw ai-c lh-1"
                                data-toggle="dropdown">
                                <i class="ti-user" style="margin-right: 10px;"></i>
                                <div class="peer">
                                    <span class="fsz-sm c-grey-900">
                                        {{--                       {{ auth()->user()->name}} --}}
                                    </span>
                                </div>
                            </a>
                            <ul class="dropdown-menu fsz-sm">
                                <li>
                                    <a href="{{ route('admin.change-password') }}"
                                        class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                                        <i class="ti-user mR-10"></i>
                                        <span>Ganti Password</span>
                                    </a>
                                    <a href="{{ route('login') }}"
                                        onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                                        class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                                        <i class="ti-power-off mR-10"></i>
                                        <span>Keluar</span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <main class="main-content bgc-grey-100">
                <div id="mainContent">
                    <div class='container-fluid'>
                        @yield('content')
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('js/vendor.js') }}"></script>
    <script src="{{ asset('plugins/popper/popper.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('plugins/summernote/summernote.js') }}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".select2").select2({
                placeholder: "Pilih",
                allowClear: true
            });

            $('#detail').summernote({
                height: 600
            });
        });
    </script>

    <script>
        initSample();
    </script>

    @yield('footer-scripts')
</body>

</html>
