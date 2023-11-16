<!-- Title -->
<title>@yield("title")</title>

<!-- Favicon -->
<link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico') }}" type="image/x-icon" />

@yield('css')

<link href="{{ URL::asset('assets/css/mainTheme.css') }}" rel="stylesheet"> -->
<link rel="stylesheet" href="{{ asset('assets/css/plugins/toastr.min.css') }}">
<link href="{{ asset('assets/css/plugins/bootstrap.min.css') }}" rel="stylesheet">
<!-- Include DataTables CSS -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/plugins/dataTables.bootstrap4.min.css') }}">

<!--- Style css -->
@if (App::getLocale() == 'en')
    <link href="{{ URL::asset('assets/css/ltr.css') }}" rel="stylesheet">
@else
    <link href="{{ URL::asset('assets/css/rtl.css') }}" rel="stylesheet">
@endif

<!-- - Style css
