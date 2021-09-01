<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดตารางสอบ</title>

    <?php include('root.php'); ?>
    <?php include('import.php'); ?>

</head>
<body>
<?php include('navbar.php'); ?>

    
<?php 
    $stmt = $pdo->query("select * from research where research_id = ".$_REQUEST['research_id']."  ");
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
?>
    <form class="main" action="postexamDetail.php" method="post">
        <div class="btn btn-hamburger">
            <i class="fas fa-bars"></i>
        </div>
        
        <div class="sidebar">
            <?php include('sidebar.php'); ?>
        </div>
        <div class="dashboard">
            <h2 class="dashboard-title">จัดตารางสอบ</h2>

            <h4 class="title-main">ข้อมูลผู้สอบ</h4>
            <div class="form-control">
                <p>หัวข้อบัณฑิตนิพนธ์</p>
                <input type="text" value="<?php echo $row['name_th'] ; ?>" disabled="disabled" class="txt-input" placeholder="กรอกหัวข้อบัณฑิตนิพนธ์">
            </div>
            <div class="form-control">
                <p>ภาคเรียน</p>
                <select class="sel sel-input" disabled="disabled">
                    <option value="<?php echo $row['term'] ; ?>"><?php echo $row['term'] ; ?></option>
                </select>
            </div>
            <div class="form-control">
                <p>ปีการศึกษา</p>
                <select class="sel sel-input" disabled="disabled">
                    <option value="<?php echo $row['year'] ; ?>"><?php echo $row['year'] ; ?></option>
                </select>
            </div>

            <h4 class="mt-50 title-main">อาจารย์ที่ปรึกษา</h4>
            <div class="form-control">
                <p>อาจารย์ที่ปรึกษาหลัก</p>
    <?php 
    $stmt2 = $pdo->query("select * from personal where personal_id = ".$row['personal_main']." ");
    while($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
    ?>
                <input type="text" value="<?php echo $row2['tname'] ?><?php echo $row2['fname'] ?> <?php echo $row2['lname'] ?>" class="txt-input" disabled="disabled" placeholder="กรอกอาจารย์ที่ปรึกษาหลัก">
     <?php 
    }
    ?>
            </div>
            <div class="form-control">
                <p>อาจารย์ที่ปรึกษาร่วม</p>
                <?php 
    $stmt2 = $pdo->query("select * from personal where personal_id = ".$row['personal_sup']." ");
    while($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
    ?>
                <input type="text" value="<?php echo $row2['tname'] ?><?php echo $row2['fname'] ?> <?php echo $row2['lname'] ?>" class="txt-input" disabled="disabled" placeholder="กรอกอาจารย์ที่ปรึกษาร่วม">
                <?php 
    }
    ?>
            </div>

            <h4 class="mt-50 title-main">คณะผู้จัดทำ</h4>
            <div class="form-control">
                <p>ผู้จัดทำคนที่ 1</p>
                <input type="text" value="<?php echo $row['student_one'] ; ?>" class="txt-input" disabled="disabled" placeholder="กรอกผู้จัดทำคนที่ 1">
            </div>
            <div class="form-control">
                <p>ผู้จัดทำคนที่ 2</p>
                <input type="text" value="<?php echo $row['student_two'] ; ?>" class="txt-input" disabled="disabled"  placeholder="กรอกผู้จัดทำคนที่ 2">
            </div>

            <h4 class="mt-50 title-main">คณะกรรมการสอบ</h4>
            <div class="form-control">
                <p>ประธาน</p>
                <select name="personal1"  required class="sel sel-input" >
                <option value="">--- เลือก ---</option>
                <?php 
    $stmt2 = $pdo->query("select * from personal ");
    while($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
    ?>
                    <option value="<?php echo $row2['personal_id'] ?>"><?php echo $row2['tname'] ?><?php echo $row2['fname'] ?> <?php echo $row2['lname'] ?></option>
                <?php 
    }
    ?>
                </select>
            </div>
            <div class="form-control">
                <p>กรรมการ</p>
                <select name="personal2"  required class="sel sel-input" >
                <option value="">--- เลือก ---</option>
                <?php 
    $stmt2 = $pdo->query("select * from personal ");
    while($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
    ?>
                    <option value="<?php echo $row2['personal_id'] ?>"><?php echo $row2['tname'] ?><?php echo $row2['fname'] ?> <?php echo $row2['lname'] ?></option>
                <?php 
    }
    ?>
                </select>
            </div>
            <div class="form-control">
                <p>เลขานุการ</p>
                <select name="personal3"  required class="sel sel-input" >
                <option value="">--- เลือก ---</option>
                <?php 
    $stmt2 = $pdo->query("select * from personal ");
    while($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
    ?>
                    <option value="<?php echo $row2['personal_id'] ?>"><?php echo $row2['tname'] ?><?php echo $row2['fname'] ?> <?php echo $row2['lname'] ?></option>
                <?php 
    }
    ?>
                </select>
            </div>


            <h4 class="mt-50 title-main">รายละเอียดการสอบ</h4>
            <div class="form-control">
                <p>วันการจัดสอบ</p>
                <input  required type="date" name="date_exam" class="txt-input" >
            </div>
            <div class="form-control">
                <p>เวลาการจัดสอบ</p>
                <input required type="time" class="txt-input"  name="time_exam" >
                <input required type="hidden" value="<?php echo $_REQUEST['research_id'] ?>" class="txt-input"  name="research_id" >
                <input required type="hidden" value="<?php echo $_REQUEST['status_file'] ?>" class="txt-input"  name="status_file" >
                <input required type="hidden" value="<?php echo date("M j, Y"); ?>" class="txt-input"  name="create_up" >
            </div>
            <div class="form-control">
                <p>ห้องสอบ</p>
                <select required name="class" class="sel sel-input">
                    <option value="">--- เลือก ---</option>
                    <option value="411">411</option>
                    <option value="413">413</option>
                    <option value="522">522</option>
                    <option value="542">542</option>
                    <option value="543">543</option>
                    <option value="544">544</option>
                    <option value="545">545</option>
                </select>
            </div>
            

            <div class="btn-control mt-50">
                <button class="btn btn-success"><i class="fas fa-check-circle"></i>บันทึก</button>
            </div>

        </div>
    </form>
    <?php 
   }
?>
</body>
</html>