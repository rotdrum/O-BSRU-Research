<?php include('./session.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดการระบบ</title>
    <?php include('root.php'); ?>

    <?php include('import.php'); ?>

</head>
<body>
<?php include('navbar.php'); ?>

    
    <form action="postmore_edit.php" method="post" class="main">
        <div class="btn btn-hamburger">
            <i class="fas fa-bars"></i>
        </div>
        
        <div class="sidebar">
            <?php include('sidebar.php'); ?>
        </div>
        <div class="dashboard">
            <h2 class="dashboard-title">แก้ไข
            <?php 
                if($_REQUEST['type_select'] == 1){
                    echo "ประเภทบัณฑิตนิพนธ์";
                }
                else if($_REQUEST['type_select'] == 2){
                    echo "คณะ";
                }
                else if($_REQUEST['type_select'] == 3){
                    echo "สาขาวิชา";
                }
                else if($_REQUEST['type_select'] == 4){
                    echo "ห้องสอบ";
                }
                else if($_REQUEST['type_select'] == 5){
                    echo "คำนำหน้า";
                }
            ?>


            </h2>

            <?php 
    $stmt = $pdo->query("select * from selection where selection_id = ".$_REQUEST['selection_id']." ");
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            ?>
            <div class="form-control">
                <p>
                <?php 
                if($_REQUEST['type_select'] == 1){
                    echo "ประเภทบัณฑิตนิพนธ์";
                }
                else if($_REQUEST['type_select'] == 2){
                    echo "คณะ";
                }
                else if($_REQUEST['type_select'] == 3){
                    echo "สาขาวิชา";
                }
                else if($_REQUEST['type_select'] == 4){
                    echo "ห้องสอบ";
                }
                else if($_REQUEST['type_select'] == 5){
                    echo "คำนำหน้า";
                }
                ?>
                </p>
                <input required type="hidden" name="selection_id" value="<?php echo $_REQUEST['selection_id']; ?>">
                <input required type="text" name="data_select" class="txt-input" value="<?php echo $row['data_select']; ?>">
                <input required type="hidden" name="type_select" value="<?php echo $_REQUEST['type_select']; ?>">
            </div>
            <?php 
    }
            ?>

            <div class="btn-control mt-50">
                <button class="btn btn-success"><i class="fas fa-check-circle"></i>บันทึก</button>
                <?php 
                    if($_REQUEST['type_select'] == 1){
                ?>
                        <a href="more_type.php" class="btn btn-danger"><i class="fas fa-times"></i>ยกเลิก</a>
                <?php  }
                    else if($_REQUEST['type_select'] == 2){
                ?>
                        <a href="more_faculty.php" class="btn btn-danger"><i class="fas fa-times"></i>ยกเลิก</a>
                <?php  }
                    else if($_REQUEST['type_select'] == 3){
                ?>
                        <a href="more_department.php" class="btn btn-danger"><i class="fas fa-times"></i>ยกเลิก</a>
                <?php  }
                    else if($_REQUEST['type_select'] == 4){
                ?>    
                        <a href="more_room.php" class="btn btn-danger"><i class="fas fa-times"></i>ยกเลิก</a>
                <?php  }
                    else if($_REQUEST['type_select'] == 5){
                ?>
                        <a href="more_tname_personal.php" class="btn btn-danger"><i class="fas fa-times"></i>ยกเลิก</a>
                <?php  }
                ?>
            </div>

        </div>
    </form>
    
</body>
</html>