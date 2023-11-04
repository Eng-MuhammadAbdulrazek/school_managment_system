<!-- Title -->
<title>@yield("title")</title>

<!-- Favicon -->
<link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico') }}" type="image/x-icon" />

<!-- Font -->
<link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">
@yield('css')

<!-- - Style css
<link href="{{ URL::asset('assets/css/ltr.css') }}" rel="stylesheet"> -->

<!--- Style css -->
@if (App::getLocale() == 'en')
    <link href="{{ URL::asset('assets/css/ltr.css') }}" rel="stylesheet">
@else
    <link href="{{ URL::asset('assets/css/rtl.css') }}" rel="stylesheet">
@endif
<style>
    /* Style the dropdown button */
.dropbtn {
  background-color: #282a39;
  color: white;
  padding: 12px;
  font-size: 14px;
  border: none;
  cursor: pointer;
}

/* Style the dropdown content (hidden by default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
  z-index: 1;
}

/* Style the list items */
.dropdown-content li {
  display: flex;
  align-items: center;
  padding: 12px 16px;
  text-decoration: none;
  list-style: none;
}
.dropdown-content li:hover{
 color: royalblue;
}

/* Style list item images */
.dropdown-content li img {
  width: 20px;
  height: auto;
  margin-right: 8px;
}

/* Show the dropdown content when the button is hovered over */
.dropdown:hover .dropdown-content {
  display: block;
}

</style>