<?php include('./session.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูลอาจารย์/บุคลากร</title>

    <?php include('root.php'); ?>
    <?php include('import.php'); ?>

</head>
<body>
<?php include('navbar.php'); ?>

<?php 
    $stmt = $pdo->query("select * from personal where personal_id = ".$_REQUEST['personal_id']." ");
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    ?>


    <form class="main" action="postteacher_edit.php" method="post">
        <div class="btn btn-hamburger">
            <i class="fas fa-bars"></i>
        </div>
        
        <div class="sidebar">
            <?php include('sidebar.php'); ?>
        </div>
        <div class="dashboard">
            <h2 class="dashboard-title">แก้ไขข้อมูลอาจารย์/บุคลากร</h2>

            <h4 class="title-main">บัญชีผู้ใช้</h4>
            <div class="form-control">
                <p>บัญชีผู้ใช้</p>
                <input required name="personal_id" value="<?php echo $row['personal_id'] ; ?>" type="hidden" class="txt-input" placeholder="กรอกบัญชีผู้ใช้">
                <input required name="username" value="<?php echo $row['username'] ; ?>" type="text" class="txt-input" placeholder="กรอกบัญชีผู้ใช้">
            </div>

            <div class="form-control">
                <p>รหัสผ่าน</p>
                <input  name="password" type="password" class="txt-input" placeholder="กรอกรหัสผ่าน">
            </div>




            <h4 class="mt-50 title-main">ข้อมูลส่วนตัว</h4>

            <div class="form-control" >
                <p>คำนำหน้า</p>
                <select required name="tname" class="sel sel-input">
                <option value="<?php echo $row['tname'] ; ?>"><?php echo $row['tname'] ; ?></option>
                <?php 
    $stmt2 = $pdo->query("select * from selection where type_select = 5 ");
    while($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
    ?>
                    <option value="<?php echo $row2['data_select'] ?>"><?php echo $row2['data_select'] ?></option>
                <?php 
    }
    ?>
            </select>
            </div>
            <div class="form-control-row">
                <div class="form-control-items">
                    <p>ชื่อ</p>
                    <input required name="fname"  value="<?php echo $row['fname'] ; ?>"  type="text" class="txt-input" placeholder="กรอกชื่อ">
                </div>
                <div class="form-control-items">
                    <p>นามสกุล</p>
                    <input required name="lname"  value="<?php echo $row['lname'] ; ?>"  type="text" class="txt-input" placeholder="กรอกนามสกุล">
                </div>
            </div>
            <div class="form-control">
                <p>วัน/เดือน/ปี เกิด</p>
                <input type="date" required  value="<?php echo $row['dateofbirth'] ; ?>"  name="dateofbirth" class="txt-input" >
            </div>
            <div class="form-control-row">
                <div class="form-control-items">
                    <p>อีเมล</p>
                    <input required name="email"  value="<?php echo $row['email'] ; ?>"   type="email" class="txt-input" placeholder="กรอกอีเมล">
                </div>
                <div class="form-control-items">
                    <p>เบอร์โทรศัพท์</p>
                    <input required name="tel"   value="<?php echo $row['tel'] ; ?>"  type="text" class="txt-input" placeholder="กรอกเบอร์โทรศัพท์">
                </div>
            </div>


            <div class="btn-control mt-50">
                <button class="btn btn-success"><i class="fas fa-check-circle"></i>บันทึก</button>
                <a href="teacher_manage.php" class="btn btn-danger"><i class="fas fa-times-circle"></i>ยกเลิก</a>
            </div>

        </div>
    </form>
    <?php 
}
    ?>
</body>
</html>