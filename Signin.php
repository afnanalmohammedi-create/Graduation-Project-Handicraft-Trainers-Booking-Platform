<?php
session_start();

$host = 'localhost';
$db = 'thaat';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user_type = $_POST['user_type']; // Capture user type

    if (empty($email) || empty($password) || empty($user_type)) {
        $error = "الرجاء إدخال جميع الحقول.";
    } else {
        if ($user_type == 'main_user') {
            $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
        } elseif ($user_type == 'trainer') {
            $stmt = $conn->prepare("SELECT * FROM trainers WHERE email = ? AND password = ?");
        } elseif ($user_type == 'admin') {
            if ($email === 'admin' && $password === 'admin123') {
                $_SESSION['user_type'] = 'admin';
                header("Location: Admin");
                exit();
            } else {
                $error = "بيانات المدير غير صحيحة.";
            }
        }

        if ($user_type !== 'admin') {
            $stmt->bind_param("ss", $email, $password);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows === 1) {
                $row = $result->fetch_assoc();

                if ($user_type == 'trainer') {
                    if ($row['status'] === 'Pending') {
                        $error = "نعتذر منكم بإنتظار الإعتماد من قبل المدير.";
                    } elseif ($row['status'] === 'Rejected') {
                        $error = "تم الرفض من قبل المدير لمزيد من المعلومات تواصل معنا.";
                    } else {
                        $_SESSION['user_id'] = $row['t_id'];
                        $_SESSION['email'] = $row['email'];
                        $_SESSION['fname'] = $row['fname'];
                        $_SESSION['user_type'] = 'trainer';
                        header("Location: Trainers");
                        exit();
                    }
                } else {
                    $_SESSION['user_id'] = $row['u_id'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['fname'] = $row['fname'];
                    $_SESSION['user_type'] = 'main_user';
                    header("Location: user");
                    exit();
                }
            } else {
                $error = "اسم المستخدم أو كلمة المرور غير صحيحة.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .login-container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px #722121;
            text-align: right;
            width: 300px;
            margin: 100px auto;
        }

        .login-container h2 {
            margin-bottom: 20px;
            text-align: center;
            color: #722121;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input, .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #722121;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: block;
            margin: 20px auto;
        }

        input[type="submit"]:hover {
            background-color: #5b1818;
        }

        .error {
            color: red;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>

<body>
<?php include 'header.php'; ?>

    <div class="login-container">
        <h2>تسجيل الدخول</h2>
        <?php if (!empty($error)) : ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <form action="" method="post">
            <div class="form-group">
                <label for="email">البريد الإلكتروني</label>
                <input type="text" placeholder="Enter Email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">كلمة المرور</label>
                <input type="password" placeholder="Enter password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="user_type">نوع المستخدم</label>
                <select id="user_type" name="user_type" required>
                    <option value="" disabled selected>اختر نوع المستخدم</option>
                    <option value="main_user">مستخدم</option>
                    <option value="trainer">مدرب</option>
                    <option value="admin">مدير</option>
                </select>
            </div>
            <input type="submit" value="تسجيل الدخول">
        </form>
    </div>
</body>

</html>
