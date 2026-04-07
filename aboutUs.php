<?php
session_start(); ?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>حولنا</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>


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
            text-align: right; /* Align text to right */
        }
        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }


body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f5f5f5;
    line-height: 1.6;
}



header h1 {
    margin: 0;
}


main {
    margin: 20px;
}

section {
    background: white;
    margin: 10px 0;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

section h2 {
    color: #722121;
}

footer {
    background: #722121;
    color: white;
    text-align: center;
    padding: 1rem;
    bottom: 0;
    width: 100%;
}
*{
	direction:rtl;
}



</style>
<body>
<?php include 'header.php'; ?>

  

    <main>
        <section id="vision">
		<img src="vision.jpg" id="vision" alt="vision" width="100" style=" float:left; margin-right:10px;">
            <h2>رؤيتنا</h2>
            <p>نسعى لتحقيق التميز من خلال تعزيز الابتكار والإبداع في جميع مجالات العمل لدينا، ونطمح لأن نكون الرواد في تقديم الحلول المبتكرة والمستدامة.</p>
        </section>

        <section id="mission">
		<img src="message.jpg" id="message" alt="message" width="100" style=" float:left; margin-right:10px;">
            <h2>رسالتنا</h2>
            <p>نلتزم بتقديم خدمات عالية الجودة تفوق توقعات عملائنا، ونسعى لخلق بيئة عمل محفزة تساهم في تحقيق النمو والتطور المهني والشخصي لكل فرد في فريقنا.</p>
        </section>

        <section id="philosophy">
				<img src="phelos.jpg" id="philo" alt="philo" width="100" style=" float:left; margin-right:10px;">
            <h2>فلسفتنا</h2>
            <p>نؤمن بأن النجاح يتحقق من خلال التعاون والعمل الجماعي، ونلتزم بقيم النزاهة والشفافية في جميع تعاملاتنا، ونسعى دائمًا لتحقيق التوازن بين الاحتياجات الاجتماعية والبيئية والاقتصادية.</p>
        </section>
    </main>


<footer style="display: flex; justify-content: space-between; align-items: center; padding: 10px 0; background-color: #722121; color: #FFFFFF;">
    <div style="flex: 1; ">
        <form>
            <input type="search" placeholder="ابحث هنا..." style="width: 70%; padding: 10px; margin-left:30px; margin-top:-60px;">
        </form>
    </div>
    <div style="flex: 2; text-align: right; margin-right:15px; margin-top:10px; font-size:20px;">
	   تعني ذات ناحية من نواحي الشخصية قادرة على المعرفة</br>
	    الاستنتاجية ويعبر النظام عن ذات الشخص الداخلي الذي</br>
		يتفرد بها ويجسد ذاته ويطورها من خلال إتاحة أقسام متنوعة</br></br>
		جميع الحقوق محفوظة 2024</br></br>
		تواصل معنا لمزيد من المعلومات</br>
        <div>
            <a href="https://www.instagram.com" target="_blank"><img src="insta.png" alt="إنستغرام" width="24"></a>
            <a href="https://www.twitter.com" target="_blank"><img src="twir.png" alt="تويتر" width="24"></a>
            <a href="https://www.facebook.com" target="_blank"><img src="fac.png" alt="فيسبوك" width="24"></a>
        </div>
    </div>
</footer>

</body>
</html>
