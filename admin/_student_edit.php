<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <?php include('root.php'); ?>
    <?php include('import.php'); ?>

</head>
<body>

    
<?php 
    $stmt = $pdo->query("select * from student where student_id = ".$_REQUEST['student_id']." ");
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    ?>
    <form action="poststudent_edit.php" method="post" class="main">
        <div class="btn btn-hamburger">
            <i class="fas fa-bars"></i>
        </div>
        
        <div class="sidebar">
            <?php include('sidebar.php'); ?>
        </div>
        <div class="dashboard">
            <h2 class="dashboard-title">แก้ไขข้อมูลนักศึกษา</h2>

            <h4 class="title-main">รหัสนักศึกษา</h4>
            <div class="form-control">
                <p>บัญชีผู้ใช้</p>
                <input type="hidden" value="<?php echo $row['student_id'] ; ?>" name="student_id" class="txt-input" placeholder="กรอกบัญชีผู้ใช้">
                <input type="text" value="<?php echo $row['username'] ; ?>" name="username" class="txt-input" placeholder="กรอกบัญชีผู้ใช้">
            </div>



            <h4 class="mt-50 title-main">ข้อมูลส่วนตัว</h4>
            <div class="form-control">
                <p>คำนำหน้า</p>
                <select class="sel sel-input" name="tname" >
                    <option value="<?php echo $row['tname'] ; ?>"><?php echo $row['tname'] ; ?></option>
                    <option value="นาย">นาย</option>
                    <option value="นาง">นาง</option>
                    <option value="นางสาว">นางสาว</option>
                </select>
            </div>
            <div class="form-control-row">
                <div class="form-control-items">
                    <p>ชื่อ</p>
                    <input name="fname" value="<?php echo $row['fname'] ; ?>"  type="text" class="txt-input" placeholder="กรอกชื่อ">
                </div>
                <div class="form-control-items">
                    <p>นามสกุล</p>
                    <input name="lname" value="<?php echo $row['lname'] ; ?>"  type="text" class="txt-input" placeholder="กรอกนามสกุล">
                </div>
            </div>
            <div class="form-control">
                <p>วัน/เดือน/ปี เกิด</p>
                <input type="date" value="<?php echo $row['dateofbirth'] ; ?>" name="dateofbirth" class="txt-input" placeholder="กรอกบัญชีผู้ใช้">
            </div>
            <div class="form-control-row">
                <div class="form-control-items">
                    <p>รหัสนักศึกษา</p>
                    <input name="student_card" value="<?php echo $row['student_card'] ; ?>"  type="number" class="txt-input" placeholder="กรอกรหัสนักศึกษา">
                </div>
                <div class="form-control-items">
                    <p>ห้อง</p>
                    <input name="class" value="<?php echo $row['class'] ; ?>"  type="text" class="txt-input" placeholder="กรอกห้อง">
                </div>
            </div>
            <div class="form-control-row">
                <div class="form-control-items">
                    <p>สาขาวิชา</p>
                    <input name="field" value="<?php echo $row['field'] ; ?>" type="text" class="txt-input" placeholder="กรอกสาขาวิชา">
                </div>
                <div class="form-control-items">
                    <p>คณะ</p>
                    <input name="faculty" value="<?php echo $row['faculty'] ; ?>"  type="text" class="txt-input" placeholder="กรอกคณะ">
                </div>
            </div>
            <div class="form-control-row">
                <div class="form-control-items">
                    <p>อีเมล</p>
                    <input name="email" value="<?php echo $row['email'] ; ?>" type="email" class="txt-input" placeholder="กรอกอีเมล">
                </div>
                <div class="form-control-items">
                    <p>เบอร์โทรศัพท์</p>
                    <input name="tel" value="<?php echo $row['tel'] ; ?>"  type="text" class="txt-input" placeholder="กรอกเบอร์โทรศัพท์">
                </div>
            </div>


            <div class="btn-control mt-50">
                <button class="btn btn-success"><i class="fas fa-check-circle"></i>บันทึก</button>
                <a href="student_manage.php" class="btn btn-danger"><i class="fas fa-times-circle"></i>ยกเลิก</a>
            </div>

        </div>
    </form>
    <?php 
    }
    ?>
</body>
</html>