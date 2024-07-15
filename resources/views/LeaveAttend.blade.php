<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="index3.css">

    {{-- <link href="{{ asset('font-awesome.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>جدول الحضور والانصراف</title>

</head>

<body>
    <div class="wrapper d-flex">
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
                    <span>تسجيل خروج</span>
                    <span><i class="fa-solid fa-right-from-bracket fa-rotate-180"></i></span>
                </a>
            </div>
        </aside>

        <section class="attendance">
            <table class="attendance-table">
                <thead>
                    <tr>
                        <th></th>
                        <th>الاسم</th>
                        <th>القسم</th>
                        <th>التاريخ</th>
                        <th>زمن الحضور</th>
                        <th>زمن الانصراف</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($attendances as $attendance)
                        <tr>
                            <td>{{ $attendance['id'] }}</td>
                            <td>{{ $attendance['name'] }}</td>
                            <td>{{ $attendance['department'] }}</td>
                            <td>{{ $attendance['date'] }}</td>
                            <td>{{ $attendance['attendance_time'] }}</td>
                            <td>{{ $attendance['departure_time'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </div>

    <script src="bootstrap-5.3.0-dist/js/bootstrap.bundle.min.js"></script>
    <script src="script3.js"></script>
</body>

</html>
