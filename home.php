

<?php
session_start();

	?>




<!DOCTYPE html>

<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الصفحة الرئيسية ذات</title>
    <link rel="icon" href="https://th.bing.com/th?id=OIP._stAgMFw3x2XTmdYuia_pQHaHa&w=250&h=250&c=8&rs=1&qlt=90&o=6&dpr=1.5&pid=3.1&rm=2">
    <style>
        * {
            direction: rtl;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: white;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #722121;
            padding: 10px 0;
            margin-bottom: 20px;
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        li {
            float: right;
        }

        li a, .dropbtn {
            display: inline-block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover, .dropdown:hover .dropbtn {
            background-color: #ddd;
            color: black;
        }

        li.dropdown {
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: right;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

       
		main{
			width:100%;
			height:400px;
			background:white;
			margin-top:-4px;
		}

        main img {
            width: 30%;
            height: 300px;
            float: left;
            margin-top: 30px;
            margin-left: 50px;
        }

        main h2 {
            margin-top: 50px;
            font-size: 35px;
            font-weight: bold;
            font-family: Arial;
            color: #722121;
        }

        main p {
            font-size: 20px;
            font-family: Arial;
            color: #722121;
            margin-top: 60px;
            height: 100px;
        }		
        .sections {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            
        }

        .section {
            background-color: white;
			float:left;
            margin: 10px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 23%;
        }

        .section img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .section h3 {
            color: #722121;
            margin-top: 10px;
        }

        .section p {
            margin-top: 10px;
            color: #555;
        }

		footer{
			width:100%;
			margin-top:100px;
			
		}

    </style>
</head>
<body>
<?php include'header.php'; ?>


<main>
<img id="pic1" src="tha.png" alt="picture">

    <center>
        <h2>اهلاً بكم في نظام ذات</h2>
        <p>
            يعتبر نظام ذات احدى الأنظمة التي صممت لاكتشاف الذات وتطويرها حيث معنا ستتعرف الى ذاتك وماتميل إليه<br>
            من خلال تعلم هوايات جديدة واكتساب مهارات جديدة وسنكون معك يدًا بيد في هذا الطريق ، وستجد مختلف الاقسام<br>
            الترفيهية وافضل المدربين المتخصصين في مجالاتهم الذين سيساعدونك على عيش تجربة ممتعة في مكانك. وجاءت<br>
            خطط ذات تلبيةً لمتطلبات الرؤية الاستراتيجية للمملكة (2030). والتي اشرقت شمسها على تطوير الإبداع وتعزيز<br>
            التعلم الفني، كما أن إعمار المجتمع احدى المحاور التي يقوم عليه نظام ذات من خلال توفير بيئة تعليمية<br>
            ترفيهية وبالتالي تحقيق السعادة والتوازن المجتمعي<br>
        </p>
    </center>
	</main>

    <div class="sections">
        <div class="section">
            <img src="cook.png" alt="قسم الطبخ">
            <h3>قسم الطبخ</h3>
            <p>تعلم فنون الطبخ مع أفضل الطهاة واستمتع بتجربة طهي مميزة.</p>
        </div>
        <div class="section">
            <img src="7eakah.png" alt="قسم الحياكة">
            <h3>قسم الحياكة</h3>
            <p>تعلم فنون الحياكة وصناعة الملابس والإكسسوارات بأيديك.</p>
        </div>
        <div class="section">
            <img src="DR.png" alt="قسم الفنون">
            <h3>قسم الفنون</h3>
            <p>استكشف إبداعك من خلال مختلف الأنشطة الفنية.</p>
        </div>
        <div class="section">
            <img src="Mak.png" alt="قسم المكياج">
            <h3>قسم المكياج</h3>
            <p>تعلم تقنيات المكياج مع خبراء التجميل.</p>
        </div>
		
		
		
        <?php include'footer.php'; ?>
	

</body>
</html>


