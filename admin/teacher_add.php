<?php include('./session.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มข้อมูลอาจารย์/บุคลากร</title>

    <?php include('root.php'); ?>

    <?php include('import.php'); ?>

</head>
<body>
<?php include('navbar.php'); ?>

    

    <form class="main" action="postteacher_add.php" method="post" >
        <div class="btn btn-hamburger">
            <i class="fas fa-bars"></i>
        </div>
        
        <div class="sidebar">
            <?php include('sidebar.php'); ?>
        </div>
        <div class="dashboard">
            <h2 class="dashboard-title">เพิ่มข้อมูลอาจารย์/บุคลากร</h2>

            <h4 class="title-main">บัญชีผู้ใช้</h4>
            <div class="form-control">
                <p>บัญชีผู้ใช้</p>
                <input id="teacher_username" required name="username" type="text" class="txt-input" placeholder="กรอกบัญชีผู้ใช้">
            </div>
            <div class="form-control">
                <p>รหัสผ่าน</p>
                <input required name="password" type="password" class="txt-input" placeholder="กรอกรหัสผ่าน">
            </div>

            <h4 class="mt-50 title-main">ข้อมูลส่วนตัว</h4>
            <div class="form-control">
                <p>คำนำหน้า</p>
                <select  required name="tname" class="sel sel-input">
                    <option value="">--- เลือก ---</option>
                    <?php 
    $stmt = $pdo->query("select * from selection where type_select = 5 ");
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    ?>
                    <option value="<?php echo $row['data_select'] ?>"><?php echo $row['data_select'] ?></option>
                <?php 
    }
    ?>
                </select>
            </div>
            <div class="form-control-row">
                <div class="form-control-items">
                    <p>ชื่อ</p>
                    <input required name="fname" type="text" class="txt-input" placeholder="กรอกชื่อ">
                </div>
                <div class="form-control-items">
                    <p>นามสกุล</p>
                    <input required name="lname" type="text" class="txt-input" placeholder="กรอกนามสกุล">
                </div>
            </div>
            <div class="form-control">
                <p>เดือน/วัน/ปี เกิด</p>
                <input type="date" required name="dateofbirth" class="txt-input" >
            </div>
            <div class="form-control-row">
                <div class="form-control-items">
                    <p>อีเมล</p>
                    <input required name="email" type="email" class="txt-input" placeholder="กรอกอีเมล">
                </div>
                <div class="form-control-items">
                    <p>เบอร์โทรศัพท์</p>
                    <input id="tel" required name="tel" type="text" class="txt-input" placeholder="กรอกเบอร์โทรศัพท์">
                    <input required name="create_up" type="hidden" class="txt-input" value="<?php echo date("M j, Y"); ?>">
                </div>
            </div>


            <div class="btn-control mt-50">
                <button class="btn btn-success"><i class="fas fa-check-circle"></i>บันทึก</button>
                <a href="teacher_manage.php" class="btn btn-danger"><i class="fas fa-times-circle"></i>ยกเลิก</a>
            </div>

        </div>
    </form>

    <script>
        $("#tel").mask("999-999-9999")

        $("#teacher_username").blur(() => {
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "./../api/admin/get_teacher.php",
                data: {},
                success: function(res) {
                    console.log("good", res)
                    for(var i=0; i<res.result.length; i++) {
                        if(res.result[i].username == $("#teacher_username").val()) {
                            Swal.fire({
                                icon: 'error',
                                title: 'บัญชีผู้ใช้ซ้ำ',
                                text: 'โปรดเปลี่ยนบัญชีผู้ใช้ใหม่'
                            })
                            $("#teacher_username").val("")
                            $("#teacher_username").focus()
                        }
                    }
                }, error: function(err) {
                    console.log("bad", err)
                }
            })
        })
    </script>
</body>
</html>