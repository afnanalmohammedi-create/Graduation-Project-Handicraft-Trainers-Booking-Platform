<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
/* styles.css */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f5f5f5;
    text-align: center;
}

header {
    background-color: #722121;
    color: white;
    padding: 1rem;
}

main {
    margin: 20px;
}

.signup-container {
    display: flex;
    justify-content: center;
    gap: 20px;
    flex-wrap: wrap;
}

.signup-box {
    background: white;
    padding: 20px;
    margin: 10px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    width: 200px;
    transition: transform 0.3s;
}

.signup-box:hover {
    transform: scale(1.05);
}

.signup-box img {
    width: 100px;
    height: 100px;
}

.signup-box h2 {
    color: #722121;
    margin-top: 10px;
}

footer {
	margin-top:	100px;
}
</style>
<body>
<?php include 'header.php'; ?>

    <main>
        <div class="signup-container">
            <div class="signup-box">
                <a href="saignupTrainers.php">
                    <img src="icon.jpeg" alt="Trainer Sign Up">
                    <h2>إنشاء حساب مدرب</h2>
                </a>
            </div>
            <div class="signup-box">
                <a href="signup.php">
                    <img src="icon.jpeg" alt="User Sign Up">
                    <h2>انشاء حساب مستفيد</h2>
                </a>
            </div>
        </div>
    </main>
    
<footer style="display: flex; justify-content: space-between; align-items: center; padding: 10px 0; background-color: #722121; color: #FFFFFF;">
    <div style="flex: 1; directon:rtl;">
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
