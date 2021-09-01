
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>เข้าสู่ระบบ</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../css/style.css" />

    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
        integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
        crossorigin="anonymous" />

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"
    integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="../js/script.js"></script>

  </head>
  <body>


    <form action="postadmin_login.php" method="post" class="login-admin">
      <div class="login-admin-left-30" >
        <!-- <div class="logo-login-admin">
          <img src="./../img/logo-main.png" >
        </div> -->
        <h2 style="color: #b30392">ระบบสารสนเทศเพื่อการบริหารจัดการบัณฑิตนิพนธ์</h2>
        <p>มหาวิทยาลัยราชภัฏบ้านสมเด็จเจ้าพระยา</p>
      </div>
      <div class="login-admin-50">
        <div class="card-admin-login">
          <input name="password" type="password" placeholder="Code" class="txt-admin-login" required>
          <button class="btn-admin-login">เข้าสู่ระบบ</button>
          <a href="./../index.php" class="donthavepassword">ยังไม่มีรหัสผ่าน ?</a>
        </div>
      </div>


      <!-- <form class="card-login" action="postadmin_login.php" method="post">
        <h3>ผู้ดูแลระบบ</h3>
        <input type="password" name="password" class="txt" required placeholder="Passcode">
        <button class="btn btn-primary">เข้าสู่ระบบ</button>
      </form> -->


    </form>
  </body>

</html>
