<header>
    <style>
        header {
            background-color: #722121;
            padding: 10px 0;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        header ul {
            list-style-type: none;
            margin: 0;
            padding: 0 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            direction: rtl;
        }

        header ul li {
            margin: 0 10px;
        }

        header ul li a, 
        header ul li .dropbtn {
            display: inline-block;
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }

        header ul li a:hover, 
        header ul li .dropbtn:hover {
            background-color: #ddd;
            color: #722121;
        }

        header ul li.logo img {
            height: 50px;
        }

        header ul li.dropdown {
            position: relative;
        }

        header ul li .dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
            overflow: hidden;
            z-index: 20;
        }

        header ul li .dropdown-content a {
            color: #722121;
            padding: 10px 15px;
            display: block;
            text-align: right;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        header ul li .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        header ul li.dropdown:hover .dropdown-content {
            display: block;
        }

        body {
            margin: 0;
            padding: 0;
            padding-top: 70px;
            font-family: Arial, sans-serif;
        }

        @media screen and (max-width: 768px) {
            header ul {
                flex-direction: column;
                align-items: flex-end;
            }

            header ul li {
                margin: 5px 0;
            }
        }
    </style>

    <ul>
        <li class="logo"><img src="thaafter.png" alt="Logo"></li>

     

            <li><a href="Signin.php">تسجيل الدخول</a></li>
            <li><a href="forSignUp.php">انشاء حساب</a></li>
       

        <li><a href="home.php">الصفحة الرئيسية</a></li>
        <li class="dropdown">
            <a href="#sections" class="dropbtn">الاقسام</a>
            <div class="dropdown-content">
                <a href="section.php">قسم الطبخ</a>
                <a href="section.php">قسم الحياكة</a>
                <a href="section.php">قسم الفنون</a>
                <a href="section.php">قسم المكياج</a>
            </div>
        </li>
       
        <li><a href="aboutUs.php">من نحن</a></li>
   
    </ul>
</header>
