<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ตั้งรหัสผ่านใหม่</title>

    <?php include('root.php'); ?>
    <?php include('import.php'); ?>

  </head>
  <body>
  
  <?php 
  if(isset($_REQUEST['student_id'])){
    include('student_navbarLogin.php'); 
  }
  else if(isset($_REQUEST['personal_id'])){
    include('teacher_navbarLogin.php'); 
  }
  ?>

<div id="overlayDelete" style="display: flex; justify-content: center; align-items: center; z-index: 999; width: 100%; height: 100%; background-color: rgba(0,0,0,0.5); position: fixed; top: 0;">
      <div style="display: flex; justify-content: center; align-items: center; flex-direction: column; width: 500px; height: 300px; background: #fff; border-radius: 20px; padding: 50px;">
        <i class="fas fa-exclamation-triangle" style="font-size: 5rem; color: red; margin-bottom: 20px;"></i>
        <h3>รหัสผ่านไม่ตรงกัน</h3>
        <p>โปรดกรอกรหัสผ่านให้ตรงกันอีกครั้ง</p>
        <div style="display: flex; width: 100%; justify-content: center; margin-top: 30px;">
          <a id="btn-ok" class="btn btn-info">ตกลง</a>
        </div>
      </div>
    </div>


  <?php 
  if(isset($_REQUEST['student_id'])){
    $stmt = $pdo->query("select * from student where student_id = ".$_REQUEST['student_id']." ");
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
  ?>
    <form action="postchagepassword.php" method="post" class="container">
      <div class="card-login">
        <h3>ตั้งรหัสผ่านใหม่</h3>
        <input type="hidden" value="student" name="autu" required class="txt" placeholder="บัญชีผู้ใช้">
        <input type="hidden" value="<?php echo $row['student_id'] ?>" name="student_id" required class="txt" placeholder="บัญชีผู้ใช้">
        <input type="text" value="<?php echo $row['username'] ?>" name="username" required class="txt" placeholder="บัญชีผู้ใช้">
        <input type="password"  id="passA"   name="password" required class="txt" placeholder="รหัสผ่าน">
        <input type="password"  id="passB"  name="password_a" required class="txt" placeholder="รหัสผ่านอีกครั้ง">
        <a href="login.php" class="forgotpass" >ข้อมูลนี่ไม่ใช่ฉัน?</a>
        <button  onclick="return jsfunction()"  class="btn btn-primary">บันทึก</button>
      </div>
<!-- Test Kuy rai -->
    </form>
    <?php 
    }
  }
  ?>

<?php 
  if(isset($_REQUEST['personal_id'])){
    $stmt = $pdo->query("select * from personal where personal_id = ".$_REQUEST['personal_id']." ");
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
  ?>
    <form action="postchagepassword.php" method="post" class="container">
      <div class="card-login">
        <h3>ตั้งรหัสผ่านใหม่</h3>
        <input type="hidden" value="personal" name="autu" required class="txt" placeholder="บัญชีผู้ใช้">
        <input type="hidden" value="<?php echo $row['personal_id'] ?>" name="personal_id" required class="txt" placeholder="บัญชีผู้ใช้">
        <input type="text" value="<?php echo $row['username'] ?>" name="username" required class="txt" placeholder="บัญชีผู้ใช้">
        <input type="password" id="passA"  name="password" required class="txt" placeholder="รหัสผ่าน">
        <input type="password"  id="passB"  name="password_a" required class="txt" placeholder="รหัสผ่านอีกครั้ง">
        <a href="login.php" class="forgotpass" >ข้อมูลนี่ไม่ใช่ฉัน?</a>
        <button onclick="return jsfunction()"  class="btn btn-primary">บันทึก</button>
      </div>
    </form>
    <?php 
    }
  }
  ?>

  <?php include('footer.php'); ?>
  <script>
  $("#overlayDelete").hide();


function jsfunction() {
  var pass = true;
  
  if($("#passA").val() == "") {
    Swal.fire({
      icon: 'error',
      title: 'โปรดกรอกรหัสผ่าน',
    });
    pass = false;

  }
  else if($("#passB").val() == "") {
    Swal.fire({
      icon: 'error',
      title: 'โปรดยืนยันรหัสผ่าน',
    });
    pass = false;

  }
  else if($("#passA").val() != $("#passB").val()) {
    Swal.fire({
      icon: 'error',
      title: 'โปรดตรวจสอบรหัสผ่านอีกครั้ง',
      text: 'รหัสผ่านของท่านไม่ตรงกัน',
    });
    pass = false;

  }

  return pass;

}


      $("#overlayDelete").click(() => {
        $("#overlayDelete").css("display", "none");
      });
      $("#btn-ok").click(() => {
        $("#overlayDelete").css("display", "none");
      });

  </script>

  </body>
</html>
