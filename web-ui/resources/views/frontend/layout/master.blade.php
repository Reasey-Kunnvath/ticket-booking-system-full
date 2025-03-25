<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Events - @yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- SweetAlert -->


    <!-- Favicon -->
    <link href={{asset("frontend/assets/img/favicon.ico")}} rel="icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href={{asset("frontend/assets/lib/animate/animate.min.css")}} rel="stylesheet">
    <link href={{asset("frontend/assets/lib/owlcarousel/assets/owl.carousel.min.css")}} rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href={{asset("frontend/assets/css/bootstrap.min.css")}} rel="stylesheet">

    <link rel="stylesheet" type="text/css" href={{asset("frontend/assets/css/font-awesome.css")}} />

    <link rel="stylesheet" type="text/css" href={{asset("frontend/assets/css/owl-carousel.css")}} />

    <link rel="stylesheet" href={{asset("frontend/assets/css/tooplate-artxibition.css")}} />

    <!-- Template Stylesheet -->
    <link href={{asset("frontend/assets/css/style.css")}} rel="stylesheet">

</head>

<body>
    <div class="container-fluid bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        @include('frontend.layout.header')

        @yield('content')

        @include('frontend.layout.footer')

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src={{asset("frontend/assets/lib/wow/wow.min.js")}}></script>
    <script src={{asset("frontend/assets/lib/easing/easing.min.js")}}></script>
    <script src={{asset("frontend/assets/lib/waypoints/waypoints.min.js")}}></script>
    <script src={{asset("frontend/assets/lib/owlcarousel/owl.carousel.min.js")}}></script>

    <!-- Template Javascript -->
    <script src={{asset("frontend/assets/js/main.js")}}></script>
</body>

</html>
