<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إنشاء حساب</title>
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
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        font-size: 16px; 
        cursor: pointer; 
        transition: background-color 0.3s ease; 
        }

        button:hover {
            background-color: #922921;
        }
        .radio-group {
        display: flex;
        align-items: center;
        gap: 10px; /* مساحة بين العناصر */
        margin-bottom: 15px; /* مسافة أسفل المجموعة */
    }

    .radio-group label {
        margin: 0;
        display: flex;
        align-items: center;
        gap: 5px; /* مساحة صغيرة بين الزر والنص */
        cursor: pointer; /* تغيير مؤشر الفأرة عند التمرير */
    }
    </style>
</head>

<body>
    <?php include 'header.php'; ?>

    <div class="container">
        <h2>إنشاء حساب مدرب</h2>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $host = "localhost";
            $username = "root";
            $password = "";
            $dbname = "thaat";

            $conn = new mysqli($host, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("<p style='color: red;'>Connection failed: " . $conn->connect_error . "</p>");
            }

            // Get form data
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $cpassword = $_POST['cpassword'];
            $department = $_POST['Department'];
            $gender = $_POST['gender'];
            $bday = $_POST['bday'];
            $phone = $_POST['phone'];
            $city = $_POST['city'];
            $experience = $_POST['experience'];
            $bio = $_POST['bio'];
            $certificates = $_FILES['certificates']['name'];

            if ($password !== $cpassword) {
                echo "<p style='color: red;'>Error: Passwords do not match!</p>";
            } else {
                // Handle file upload
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["certificates"]["name"]);
                if (!is_dir($target_dir)) {
                    mkdir($target_dir, 0777, true);
                }

                if (!move_uploaded_file($_FILES["certificates"]["tmp_name"], $target_file)) {
                    echo "<p style='color: red;'>Error: File upload failed!</p>";
                } else {
                    // Hash the password
                  

                    // Insert into trainers table
                    $sql = "INSERT INTO trainers (t_id, fname, lname, email, password, Department, gender, bday, phone, city, experience, certificates, status)
                            VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'Pending')";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("sssssssssss", $fname, $lname, $email, $password, $department, $gender, $bday, $phone, $city, $experience, $certificates);

                    if ($stmt->execute()) {
                        $t_id = $conn->insert_id;

                        // Insert into trainer_profile table
                        $sql_profile = "INSERT INTO trainer_profile (id, fname, lname, bio, city) VALUES (?, ?, ?, ?, ?)";
                        $stmt_profile = $conn->prepare($sql_profile);
                        $stmt_profile->bind_param("issss", $t_id, $fname, $lname, $bio, $city);

                        if ($stmt_profile->execute()) {
                            // Insert into certificates table
                            $sql_certificates = "INSERT INTO certificates (certificates, t_id) VALUES (?, ?)";
                            $stmt_certificates = $conn->prepare($sql_certificates);
                            $stmt_certificates->bind_param("si", $certificates, $t_id);

                            if ($stmt_certificates->execute()) {
                                // Insert into experience table
                                $sql_experience = "INSERT INTO experience (t_id, experience) VALUES (?, ?)";
                                $stmt_experience = $conn->prepare($sql_experience);
                                $stmt_experience->bind_param("is", $t_id, $experience);

                                if ($stmt_experience->execute()) {
                                    echo "<p style='color: green;'>Account created successfully and all data saved!</p>";
                                } else {
                                    echo "<p style='color: red;'>Error: Unable to insert experience data.</p>";
                                }

                                $stmt_experience->close();
                            } else {
                                echo "<p style='color: red;'>Error: Unable to insert certificate data.</p>";
                            }

                            $stmt_certificates->close();
                        } else {
                            echo "<p style='color: red;'>Error: Unable to insert profile data.</p>";
                        }

                        $stmt_profile->close();
                    } else {
                        echo "<p style='color: red;'>Error: Unable to create account.</p>";
                    }

                    $stmt->close();
                }
            }

            $conn->close();
        }
        ?>

        <form action="" method="post" enctype="multipart/form-data">
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
            
            <label for="Department">القسم</label>
            <select id="Department" name="Department" required>
                <option value="المكياج">المكياج</option>
                <option value="الطبخ">الطبخ</option>
                <option value="الحياكة">الحياكة</option>
                <option value="الفنون">الفنون</option>
            </select>

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

            <label for="experience">الخبرات</label>
            <input type="text" id="experience" name="experience" required>

            <label for="bio">نبذة</label>
            <textarea id="bio" name="bio" rows="4" required></textarea>

            <label for="certificates">الشهادات</label>
            <input type="file" id="certificates" name="certificates" required>

            <button type="submit">إنشاء حساب</button>
        </form>
    </div>
</body>

</html>
