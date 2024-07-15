<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/brands.min.css">
    <link rel="stylesheet" href="../../css/index2.css">
    <link rel="stylesheet" href="../../css/all.css">
    <title>jadwala.empInfo</title>
</head>

<body>
    <style>
        #empFormContainer .row{
            margin-bottom: 10px;
        }
        #empFormContainer .row  label{
            margin-bottom: 5px;
            font-weight: bold;
            color: #;
        }
    </style>
    <div id="empFormContainer" style="float:right; direction:rtl; margin:30px ">
        <form id="empForm" action="/employee/store" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <label>اسم الموظف الأول</label> <i class="fa-solid fa-asterisk" style="color: #ff000d;"></i>
                    <input type="text" id="First_Name" name="First_Name" class="form-control" required>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <label>اسم الموظف الأوسط</label> <i class="fa-solid fa-asterisk" style="color: #ff000d;"></i>
                    <input type="text" name="Middle_Name" class="form-control" required>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <label>اسم الموظف الأخير</label> <i class="fa-solid fa-asterisk" style="color: #ff000d;"></i>
                    <input type="text" name="Last_Name" class="form-control" required>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <label>البريد الإلكتروني</label> <i class="fa-solid fa-asterisk" style="color: #ff000d;"></i>
                    <input type="email" name="Email" class="form-control" required>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <label>رقم الهاتف</label> <i class="fa-solid fa-asterisk" style="color: #ff000d;"></i>
                    <input type="text" id="Phone" name="Mobile" class="form-control" required>
                </div>
                <div class="col-lg-6"> 
                    <label>رقم الواتس آب</label> <i class="fa-solid fa-asterisk" style="color: #ff000d;"></i>
                    <input type="text" id="Phone" name="Mobile" class="form-control" required>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <label>الراتب</label> <i class="fa-solid fa-asterisk" style="color: #ff000d;"></i>
                    <input type="text" id="Salary" name="Salary" class="form-control" required>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <label>القسم</label> <i class="fa-solid fa-asterisk" style="color: #ff000d;"></i>
                    <input type="text" id="Department" name="Department" class="form-control" required>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <label>الصورة</label>
                    <input type="file" name="image" class="form-control" accept="image/x-png,image/gif,image/jpeg">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <label>كلمة المرور</label> <i class="fa-solid fa-asterisk" style="color: #ff000d;"></i>
                    <input type="password" name="Password" class="form-control" required>
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-success">حفظ</button>
        </form>
    </div>

    <script src="bootstrap-5.3.0-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
