<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>انشاء حساب</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding-top: 50px;
            height: 100vh;
            direction: rtl;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            margin-top: 20px;
            margin-left: 5%;
            box-shadow: 0 0 10px #722121;
            border-radius: 10px;
            max-width: 500px;
            width: 100%;
            text-align: right;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #722121;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            color: #333;
        }

        input,
        select,
        textarea,
        button {
            width: 90%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            text-align: right;
        }

        button {
            background-color: #722121;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #722121;
        }
        .submit-btn {
        background-color: #722121; 
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        font-size: 16px; 
        cursor: pointer; 
        transition: background-color 0.3s ease; 
    }

    .submit-btn:hover {
        background-color: #922921; 
    }
    .radio-group {
        display: flex;
        align-items: center;
        gap: 10px; 
        margin-bottom: 15px; 
    }

    .radio-group label {
        margin: 0;
        display: flex;
        align-items: center;
        gap: 5px;
        cursor: pointer;
    }
    </style>
</head>

<body>
<?php include 'header.php'; ?>

    <div class="container">
        <h2>انشاء حساب مستفيد</h2>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $servername = "localhost";
            $username = "root"; 
            $password = ""; 
            $dbname = "thaat"; 

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $fname = $conn->real_escape_string($_POST['fname']);
            $lname = $conn->real_escape_string($_POST['lname']);
            $email = $conn->real_escape_string($_POST['email']);
            $password = $conn->real_escape_string($_POST['password']);
            $gender = $conn->real_escape_string($_POST['gender']);
            $bday = $conn->real_escape_string($_POST['bday']);
            $phone = $conn->real_escape_string($_POST['phone']);
            $city = $conn->real_escape_string($_POST['city']);
            $neighborhood = $conn->real_escape_string($_POST['neighborhood']);

            $sql = "INSERT INTO users (fname, lname, email, password, gender, bday, phone, city, neigborhood,Count) 
                    VALUES ('$fname', '$lname', '$email', '$password', '$gender', '$bday', '$phone', '$city', '$neighborhood',0)";

            if ($conn->query($sql) === TRUE) {
                echo "<p style='color: green;'>تم إنشاء الحساب بنجاح!</p>";
            } else {
                echo "<p style='color: red;'>خطأ: " . $conn->error . "</p>";
            }

            $conn->close();
        }
        ?>

        <form action="" method="post">
            <label for="fname">الاسم الأول</label>
            <input type="text" id="fname" name="fname" required>

            <label for="lname">اسم العائلة</label>
            <input type="text" id="lname" name="lname" required>

            <label for="email">البريد الإلكتروني</label>
            <input type="email" id="email" name="email" required>

            <label for="password">كلمة المرور</label>
            <input type="password" id="password" name="password" required>

            <label for="cpassword">تأكيد كلمة المرور</label>
            <input type="password" id="cpassword" name="cpassword" required>

            <label>الجنس</label>
<div class="radio-group">
    <label><input type="radio" id="gender" name="gender" value="male" required> ذكر</label>
    <label><input type="radio" id="gender" name="gender" value="female"> أنثى</label>
</div>


            <label for="bday">تاريخ الميلاد</label>
            <input type="date" id="bday" name="bday" required>

            <label for="phone">رقم الهاتف</label>
            <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" required>

            <label for="city">المدينة</label>
            <select id="city" name="city" required>
                <option value="الرياض">الرياض</option>
                <option value="جدة">جدة</option>
                <option value="المدينة المنورة">المدينة المنورة</option>
                <option value="مكة المكرمة">مكة المكرمة</option>
                <option value="تبوك">تبوك</option>
                <option value="حفر الباطن">حفر الباطن</option>
            </select>

            <label for="neighborhood">الحي</label>
            <input type="text" id="neighborhood" name="neighborhood" required>

            <input type="submit" value="إنشاء حساب" class="submit-btn">
        </form>
    </div>
</body>

</html>
