<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>เข้าสู่ระบบ</title>


    <?php include('import.php'); ?>

  </head>
  <body>
  
  <?php include('navbarNotLogin.php'); ?>

    <div id="overlayDelete" style="display: flex; justify-content: center; align-items: center; z-index: 999; width: 100%; height: 100%; background-color: rgba(0,0,0,0.5); position: fixed; top: 0;">
      <div style="display: flex; justify-content: center; align-items: center; flex-direction: column; width: 500px; height: 300px; background: #fff; border-radius: 20px; padding: 50px;">
        <i class="fas fa-exclamation-triangle" style="font-size: 5rem; color: red; margin-bottom: 20px;"></i>
        <h3>บัญชีผู้ใช้หรือรหัสผ่านไม่ถูกต้อง</h3>
        <p>โปรดตรวจสอบอีกครั้ง</p>
        <div style="display: flex; width: 100%; justify-content: center; margin-top: 30px;">
          <a id="btn-ok" class="btn btn-info">ตกลง</a>
        </div>
      </div>
    </div>


    <form action="postlogin.php" method="post" class="container">

      <div class="card-login">
        <h3>เข้าสู่ระบบ</h3>
        <input type="text" name="username" required class="txt" placeholder="บัญชีผู้ใช้">
        <input type="password"  name="password" required class="txt" placeholder="รหัสผ่าน">
        <a href="forgotPassword.php" class="forgotpass">ลืมรหัสผ่าน?</a>
        <button class="btn btn-primary">เข้าสู่ระบบ</button>
      </div>

    </form>

  <?php include('footer.php'); ?>

  <script>
      $("#overlayDelete").click(() => {
        $("#overlayDelete").css("display", "none");
      });
      $("#btn-ok").click(() => {
        $("#overlayDelete").css("display", "none");
      });
    </script>

  </body>
</html>
