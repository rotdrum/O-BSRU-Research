<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>แก้ไขข้อมูลส่วนตัว</title>
    <?php include('root.php'); ?>
    <?php include('import.php'); ?>

  </head>
  <body>
  <?php include('session_student.php'); ?>

  <?php include('student_navbarLogin.php'); ?>

  <?php 
    $stmt = $pdo->query("select * from student where student_id = ".$_REQUEST['student_id']."  ");
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
?>
    <form action="poststudent_profile.php" method="post" class="container">
    <div class="txt-header-manage">
        <h3 class="text-header">แก้ไขข้อมูลส่วนตัว</h3>
      </div>

      <div class="card-column">
        <h4 class="header-manage-research">บัญชีผู้ใช้</h4>
        <div class="form-control">
            <p>บัญชีผู้ใช้</p>
            <input type="hidden" name="student_id" value="<?php echo $row['student_id'] ; ?>" class="txt-input" placeholder="กรอกบัญชีผู้ใช้">
            <input type="text" name="username" value="<?php echo $row['username'] ; ?>"  class="txt-input" placeholder="กรอกบัญชีผู้ใช้">
        </div>

        <div class="form-control">
            <p>รหัสผ่าน</p>
            <input type="password" name="password"  class="txt-input" placeholder="กรอกรหัสผ่าน">
        </div>

        <h4 class="mt-50 header-manage-research">ข้อมูลส่วนตัว</h4>
        <div class="form-control">
            <p>คำนำหน้า</p>
            <select name="tname"  class="sel sel-input">
                <option value="<?php echo $row['tname'] ; ?>"><?php echo $row['tname'] ; ?></option>
                <option value="">นาย</option>
                <option value="">นางสาว</option>
                <option value="">นาง</option>
            </select>
        </div>
        <div class="form-control">
            <p>ชื่อ</p>
            <input value="<?php echo $row['fname'] ; ?>"  name="fname"  type="text" class="txt-input" placeholder="กรอกชื่อ">
        </div>
        <div class="form-control">
            <p>สกุล</p>
            <input value="<?php echo $row['lname'] ; ?>"  name="lname"   type="text" class="txt-input" placeholder="กรอกสกุล">
        </div>

        <div class="form-control">
            <p>อีเมล</p>
            <input value="<?php echo $row['email'] ; ?>"  name="email"  type="text" class="txt-input" placeholder="กรอกอีเมล">
        </div>

        <div class="form-control">
            <p>เบอร์โทร</p>
            <input value="<?php echo $row['tel'] ; ?>"  name="tel"  type="text" class="txt-input" placeholder="กรอกอีเมล">
        </div>

        <div class="btn-control">
            <button class="btn btn-info btn-submit">บันทึก</button>
            <a href="student_research.php" class="btn btn-danger btn-submit">ยกเลิก</a>
        </div>

        

      </div>


    </form>
    <?php 
    }
?>
    <?php include('footer.php'); ?>
   
  </body>
</html>
