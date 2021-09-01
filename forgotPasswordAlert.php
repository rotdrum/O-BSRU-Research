<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ลืมรหัสผ่าน</title>

    <?php include('root.php'); ?>
    <?php include('import.php'); ?>

  </head>
  <body>
  
  <?php include('navbarNotLogin.php'); ?>

  <div id="overlayDelete" style="display: flex; justify-content: center; align-items: center; z-index: 999; width: 100%; height: 100%; background-color: rgba(0,0,0,0.5); position: fixed; top: 0;">
      <div style="display: flex; justify-content: center; align-items: center; flex-direction: column; width: 500px; height: 300px; background: #fff; border-radius: 20px; padding: 50px;">
        <i class="fas fa-exclamation-triangle" style="font-size: 5rem; color: red; margin-bottom: 20px;"></i>
        <h3>ข้อมูลไม่ถูกต้อง</h3>
        <p>โปรดตรวจสอบบัญชีผู้ใช้และวันเดือนปีเกิดอีกครั้ง</p>
        <div style="display: flex; width: 100%; justify-content: center; margin-top: 30px;">
          <a id="btn-ok" class="btn btn-info">ตกลง</a>
        </div>
      </div>
    </div>


    <section class="container">

      <form action="postforgotPassword.php" method="post" class="card-login">
        <h3>ลืมรหัสผ่าน</h3>

        <div class="form-login">
          <label>บัญชีผู้ใช้</label>
          <input type="text" required name="username" class="txt" placeholder="บัญชีผู้ใช้">
        </div>

        <div class="form-login">
          <label>เดือน/วัน/ปีเกิด</label>
          <input type="date" required name="dateofbirth" class="txt">
        </div>
        
        <button href="forgotPasswordSend.php" class="btn btn-primary">ยืนยัน</button>

      </form>


    </section>

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
