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

  </body>
</html>
