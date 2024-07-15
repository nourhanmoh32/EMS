<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="css/brands.min.css"> -->
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="css/all.css">

    <title>jadwala</title>
    {{-- <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- 1-header -->
    <header id="head">
        <!-- logo -->
        <nav class="navbar navbar-expand-lg sticky-top">
            <div class="container">
                <a class="navbar-brand" href="{{ route('welcome') }}">
                    <img src="photos/logo.png" alt="logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main"
                    aria-controls="main" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                <!-- nav bar -->
                <div class="collapse navbar-collapse" id="main">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link p-2 p-lg-3" aria-current="page" href="#head">التسجيل</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link p-2 p-lg-3" href="#about">عن الموقع</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link p-2 p-lg-3" href="#service">خَداماتُنا</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link p-2 p-lg-3" href="#app">تطبيق الهاتف</a>
                        </li>
                        <li class="nav-item special">
                            <a class="nav-link p-2 p-lg-3" href="#contact">تواصل معنا</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- ---------------------------------------- ---->
    <!-- 2-home -->
    <section id="home">
        <div class="form-box">
            <!-- login ---------- -->
            <div id="log-in" class="login mb-3">
                <h2>تسجيل الدخول</h2>
                <form id="form1" method="POST" action="/login">
                    @csrf
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label"> الكود الخاص بك</label>
                        <input type="text" name="username" class="form-control" id="yourCode"
                            placeholder="أدخل الكود الخاص بك">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">الرقم السري</label>
                        <input type="password" name="password" class="form-control" id="password"
                            placeholder="أدخل الرقم السري">
                    </div>
                    <!-- entering button  -->
                    <button type="submit" id="log">تسجيل الدخول</button>
                </form>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="small-p">
                    <p class="p1">ليس لديك حساب؟</p>
                    <a class="a1" href="#" onclick="register()">تسجيل جديد!</a>
                </div>
            </div>

            <!-- sign up--------- -->
            <div id="sign-up" class="signup-container mb-3">
                <h2>التسجيل </h2>
                <form id="form2">
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label"> الاسم</label>
                        <input type="text" class="form-control" id="yourName" placeholder="الاسم المُعَرف لك">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">الكود الخاص بك</label>
                        <input type="text" class="form-control" id="yourCode" placeholder="أدخل الكود الخاص بك">
                    </div>
                    <!-- entering button  -->
                    <button type="submit" id="sign" onclick="toDash()">تسجيل </button>
                </form>
                <div class="small-p">
                    <p class="p1" href="#">تمتلك حساب؟</p>
                    <a class="a1" href="#" onclick="login()">تسجيل دخول</a>
                </div>
            </div>
        </div>
    </section>
    <!-- ------------------------------------ -->
    <!-- 3- about  -->
    <section id="about">
        <h2>عن الموقع</h2>
        <div class=" row row-cols-1 row-cols-md-2 row-cols-sm-1 g-4">
            <div class="col-7 about-text"> <!-- about text  -->
                <p>موقع [جدولة] يتيح لك التحكم بكل ما يتعلق بموظفينك من مكان واحد ويتمتع بمزايا لا حصر لها..</p>
                <br>
                <ul>
                    <li>
                        <h3>تخزين بيانات الموظفين</h3>من معلومات شخصية إلى مهارات وخبرات ,كل ما يتعلق بموظفينك في مكان
                        واحد.
                    </li>
                    <li>
                        <h3>إدارة الحضور والانصراف</h3>تتبع ساعات العمل بدقة واحتساب الأجازات والغياب بسهولة.
                    </li>
                    <li>
                        <h3>إدارة الطلبات</h3>العلم بطلبات الأجازة والانصراف والتحكم في إمضاءها.
                    </li>
                    <li>
                        <h3>إدارة الرواتب</h3>حساب الرواتب والمكافآت بدقة وكفاءة وضمان وصولها في الوقت المحدد.
                    </li>
                </ul>
            </div>
            <div class="col-5 about-image"> <!-- about image  -->
                <img src="photos/programmer_v_02.png" alt="صوره">
            </div>
        </div>

    </section>
    <!-- --------------------------------------------------------- -->

    <!-- 4- service -->
    <section id="service">
        <div class="container">
            <!-- title -->
            <h2>خَداماتُنا</h2>
            <!-- cards -->
            <!-- first row -->
            <div id="first-row" class="st-row row row-cols-1 row-cols-md-2 row-cols-sm-1 g-4">
                <div class="col">
                    <div class="card">
                        <img src="photos/place-address-found-3d-illustration_610969-39.jpg" class="card-img-top"
                            alt="...">
                        <div class="card-body">
                            <h5 class="card-title">تسجيل الحضور والانصراف </h5>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="photos/businessman-illustration-flat-design_23-2147504754.jpg" class="card-img-top"
                            alt="...">
                        <div class="card-body">
                            <h5 class="card-title">متابعة وإدارة الموظفين</h5>
                        </div>
                    </div>
                </div>
            </div>

            <!-- sec row -->
            <div id="second-row" class="sec-row row row-cols-1 row-cols-md-2  g-4">
                <div class="col">
                    <div class="card">
                        <img src="photos/smartphone-controlling-smart-home_24877-52877.jpg" class="card-img-top"
                            alt="...">
                        <div class="card-body">
                            <h5 class="card-title">تطبيق هاتف لسهولة الاستخدام</h5>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="photos/2539.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">متابعة الأجازات والمرتبات</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- -------------------------------------------- -->

    <!-- 5- app -->
    <section id="app">
        <div class="container">
            <div class="row align-items-start justify-content-evenly">

                <div class="rs col"> <!-- right side -->
                    <h2>حَمل التطبيق الآن!</h2>
                    <div class="app-buttons"> <!--app buttons-->
                        <button type="button" class="btn google">
                            <p class="small-p">GET IT ON </p>
                            <img src="photos/google-play.png" alt="google-play">
                            <p class="big-p">Google Play</p>
                        </button>
                        <button type="button" class="btn iphone" href="app store.com">
                            <p class="small-p">Download on the</p>
                            <img src="photos/apple.png" alt="iphone">
                            <p class="big-p">App store</p>
                        </button>
                    </div>
                </div>
                <div id="screen-img" class="ls col"> <!-- left side-->
                    <img src="photos/screen.png" alt="appphone">
                </div>

            </div>
        </div>
    </section>
    <!-- --------------------------------------------- -->

    <!-- 6- footer  -->
    <section id="contact">
        <hr>
        <div class="contact-icon">
            <a href="https://www.gmail.com"><i class="fa-solid fa-envelope"></i></a>
            <a href="https://www.facebook.com"><i class="fa-brands fa-facebook"></i></a>
            <a href="https://www.linkedin.com"><i class="fa-brands fa-linkedin"></i></a>
            <a href="https://www.twitter.com"><i class="fa-brands fa-twitter"></i></a>
        </div>
        <div class="copyw">
            موقع جدولة لتنظيم إدارتك <span><i class="fa-regular fa-copyright"></i>جميع الحقوق محفوظة </span>2024
        </div>
    </section>
    <!-- --------------------------------------------------------------- -->

    <script src="bootstrap-5.3.0-dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>

</html>
