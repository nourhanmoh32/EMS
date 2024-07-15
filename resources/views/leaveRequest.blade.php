<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>طلب انصراف</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/brands.min.css">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="style5.css">
    {{-- <link href="{{ asset('font-awesome.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .card {
            max-width: 75%;
            margin: 10px auto;
        }

        .hol-img img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>

<body>
    <!-- 1- sidebar -->
    <div class="wrapper d-flex">
        <!-- 1- sidebar -->
        <aside id="sidebar">
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    {{ Auth::user()->username }}
                    <i class="fa-solid fa-bars"></i>
                </button>
                <div class="sidebar-logo">
                    <img src="photos/logo.png" alt="logo">
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="{{ route('dashboard') }}" class="sidebar-link">
                        <span>بيانات الموظفين</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('LeaveAttend') }}" class="sidebar-link">
                        <span>الحضور والانصراف</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('holidayRequest') }}" class="sidebar-link">
                        <span>طلبات الأجازة</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('leaveRequest') }}" class="sidebar-link">
                        <span>طلبات الانصراف</span>
                    </a>
                </li>
            </ul>

            <div class="sidebar-footer">
                <a href="{{ route('logout') }}" class="sidebar-link">
                    <span>تسجيل خروج </span>
                    <span><i class="fa-solid fa-right-from-bracket fa-rotate-180"></i></span>
                </a>
            </div>
        </aside>
        <!-- 2- departure -->
        <div class="all-cards w-75 p-3">
            @foreach ($leaveRequests as $request)
                <div class="card w-75 p-3" id="request-card-{{ $request->id }}">
                    <div class="hol-img">
                        <img src="photos/person.jpg" class="card-img-top" alt="person">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">طلب انصراف من "{{ $request->employee_name }}"</h5>
                        <div class="hol-text">
                            <div class="label">زمن الانصراف:</div>
                            <div class="date-div">{{ explode('.', $request->Departure_time)[0] }}</div>
                            <div class="label">السبب:</div>
                            <div class="reason-div">{{ $request->reason }}</div>
                        </div>
                        <div class="hol-buttons">
                            <form action="{{ route('approveLeave', ['id' => $request->id]) }}" method="POST">
                                @csrf
                                @method('POST')
                                <button type="submit" class="button">قبول الطلب</button>
                            </form>
                            <form action="{{ route('rejectLeave', ['id' => $request->id]) }}" method="POST">
                                @csrf
                                @method('POST')
                                <button type="submit" class="button-cancel">رفض الطلب</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="script5.js"></script>
    <script src="bootstrap-5.3.0-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
