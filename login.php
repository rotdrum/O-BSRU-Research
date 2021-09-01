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


    <!-- <form action="postlogin.php" method="post" class="container">

      <div class="card-login">
        <h3>เข้าสู่ระบบ</h3>
        <input type="text" name="username" required class="txt" placeholder="บัญชีผู้ใช้">
        <input type="password"  name="password" required class="txt" placeholder="รหัสผ่าน">
        <a href="forgotPassword.php" class="forgotpass">ลืมรหัสผ่าน?</a>
        <button class="btn btn-primary">เข้าสู่ระบบ</button>
      </div>

    </form> -->

    <form class="container">

      <div class="card-login">
        <h3>เข้าสู่ระบบ</h3>
        <input id="username" type="text" name="username" required class="txt" placeholder="รหัสนักศึกษา หรือ บัญชีผู้ใช้">
        <input id="password" type="password"  name="password" required class="txt" placeholder="รหัสผ่าน">
        <a href="forgotPassword.php" class="forgotpass">ลืมรหัสผ่าน?</a>
        <!-- <div onclick="submit()"  class="btn btn-primary">เข้าสู่ระบบ</div> -->
        <div id="submit" class="btn btn-primary">เข้าสู่ระบบ</div>
      </div>

    </form>

  <?php include('footer.php'); ?>

  <script>
    $("#password").keypress(function(event){
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if(keycode == '13'){
          submit()
        }
    });

    $("#submit").click(() => {
      console.log("sub")
      $.ajax({
        type: "POST",
        dataType: "JSON",
        url: "api/login/post_login.php?key=bansomdesh&token=research",
        data: {
          username: $("#username").val(),
          password: $("#password").val()
        }, success: function(response) {
          console.log("Autu Success", response);
          if(response != null) {
            // sessionStorage.setItem("autu", response.result[0].autu);
            // sessionStorage.setItem("student_id", response.result[0].student_id);
            // sessionStorage.setItem("status", response.result[0].status);
            // sessionStorage.setItem("flag", response.result[0].flag);

            if(response.result[0].status == 9) {
              location.href = `chagepassword.php?${response.result[0].autu}=${response.result[0].student_id}`;
            }
            else if(response.result[0].status == 1) {
              location.href = `index.php?${response.result[0].autu}=${response.result[0].student_id}`;
            }
          }
          else {
            console.log("autu fail");
            Swal.fire({
              icon: 'error',
              title: 'บัญชีผู้ใช้หรือรหัสผ่านไม่ถูกต้อง',
              text: 'โปรดตรวจสอบอีกครั้ง'
            });
          }

          if(response.result[0].login_state == "fail") {
            Swal.fire({
              icon: 'error',
              title: 'บัญชีผู้ใช้หรือรหัสผ่านไม่ถูกต้อง',
              text: 'โปรดตรวจสอบอีกครั้ง'
            });
          }
        }, error: function(err) {
          console.log("err", err);
          Swal.fire({
              icon: 'error',
              title: 'บัญชีผู้ใช้หรือรหัสผ่านไม่ถูกต้อง',
              text: 'โปรดตรวจสอบอีกครั้ง'
            });
        }
      });
    })

    function submit() {
      console.log("sub")
      $.ajax({
        type: "POST",
        dataType: "JSON",
        url: "api/login/post_login.php?key=bansomdesh&token=research",
        data: {
          username: $("#username").val(),
          password: $("#password").val()
        }, success: function(response) {
          console.log("Autu Success", response);
          if(response != null) {
            // sessionStorage.setItem("autu", response.result[0].autu);
            // sessionStorage.setItem("student_id", response.result[0].student_id);
            // sessionStorage.setItem("status", response.result[0].status);
            // sessionStorage.setItem("flag", response.result[0].flag);

            if(response.result[0].status == 9) {
              location.href = `chagepassword.php?${response.result[0].autu}=${response.result[0].student_id}`;
            }
            else if(response.result[0].status == 1) {
              location.href = `index.php?${response.result[0].autu}=${response.result[0].student_id}`;
            }
          }
          else {
            console.log("autu fail");
            Swal.fire({
              icon: 'error',
              title: 'บัญชีผู้ใช้หรือรหัสผ่านไม่ถูกต้อง',
              text: 'โปรดตรวจสอบอีกครั้ง'
            });
          }

          if(response.result[0].login_state == "fail") {
            Swal.fire({
              icon: 'error',
              title: 'บัญชีผู้ใช้หรือรหัสผ่านไม่ถูกต้อง',
              text: 'โปรดตรวจสอบอีกครั้ง'
            });
          }
        }, error: function(err) {
          console.log("err", err);
          Swal.fire({
              icon: 'error',
              title: 'บัญชีผู้ใช้หรือรหัสผ่านไม่ถูกต้อง',
              text: 'โปรดตรวจสอบอีกครั้ง'
            });
        }
      });
    }
  </script>

  </body>
</html>
