<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ลืมรหัสผ่าน</title>

    <?php include('import.php'); ?>

  </head>
  <body>
  
  <?php include('navbarNotLogin.php'); ?>


    <section class="container">

      <div class="card-login">
        <h3>เปลี่ยนรหัสผ่านใหม่</h3>
        <input type="password" class="txt" placeholder="รหัสผ่านใหม่">
        <input type="password" class="txt" placeholder="ยืนยันรหัสผ่านใหม่">
        <a href="forgotPasswordSend.php" class="btn btn-primary">ยืนยันการเปลี่ยนรหัสผ่าน</a>

      </div>


    </section>

  <?php include('footer.php'); ?>

  </body>
</html>
