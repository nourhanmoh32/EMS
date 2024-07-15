<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="index2.css">
    <link rel="stylesheet" href="css/all.css">

    <title>jadwala.empInfo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .card-img-top {
            width: 100%;
            height: 250px; 
            object-fit: cover;
        }
        
        .card-body {
            font-size: 18px; 
        }

        
    </style>
</head>

<body>
    @php
        $user = session('user');
    @endphp
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
        <!-- 2- bayanat -->
        <div class="bayanat">
            <button id="addDivButton" onclick="addNewEmployeeCard()">إضافة موظف</button>

            <header id="container">
                <div class="row ">
                    @foreach($users as $user)
                        <div class="col-lg-4 mb-4">
                            <div class="card">
                                <img src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('photos/person new.png') }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $user->firstname }} {{ $user->middlename }} {{ $user->lastname }}</h5>
                                    <p class="card-text">
                                        @php
                                            $email = isset($employeeMeta[$user->id]) ? $employeeMeta[$user->id]->where('meta_field', 'email')->first()->meta_value ?? 'N/A' : 'N/A';
                                            $phone = isset($employeeMeta[$user->id]) ? $employeeMeta[$user->id]->where('meta_field', 'phone')->first()->meta_value ?? 'N/A' : 'N/A';
                                            $department = isset($employeeMeta[$user->id]) ? $employeeMeta[$user->id]->where('meta_field', 'department_name')->first()->meta_value ?? 'N/A' : 'N/A';
                                            $salary = isset($employeeMeta[$user->id]) ? $employeeMeta[$user->id]->where('meta_field', 'salary')->first()->meta_value ?? 'N/A' : 'N/A';
                                        @endphp
                                        <strong>البريد الإلكتروني:</strong> {{ $email }}<br>
                                        <strong>رقم الهاتف:</strong> {{ $phone }}<br>
                                        <strong>القسم:</strong> {{ $department }}<br>
                                        <strong>الراتب:</strong> {{ $salary }}<br>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </header>
        </div>

    </div>
    <!-- ------------------------------------- -->

    <script src="bootstrap-5.3.0-dist/js/bootstrap.bundle.min.js"></script>
    <script src="script2.js"></script>
    <script>
        function addNewEmployeeCard() {
            window.location.href = "/emp_info";
        }

        document.getElementById("addDivButton").addEventListener("click", addNewEmployeeCard);
    </script>
</body>

</html>

