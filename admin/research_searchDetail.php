<?php include('./session.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายละเอียดบัณฑิตนิพนธ์</title>

    <?php include('root.php'); ?>

    <?php include('import.php'); ?>

</head>
<body>
<?php include('navbar.php'); ?>

<?php 
    $stmt = $pdo->query("select * from research where research_id = ".$_REQUEST['research_id']."  ");
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
?>
    <section class="main">
        <div class="btn btn-hamburger">
            <i class="fas fa-bars"></i>
        </div>
        
        <div class="sidebar">
            <?php include('sidebar.php'); ?>
        </div>
        <div class="dashboard">
            <h2 class="dashboard-title">รายละเอียดบัณฑิตนิพนธ์</h2>

            <h4 class="title-main">เกี่ยวกับบัณฑิตนิพนธ์</h4>
            <div class="approve-control">
                <div class="approve-control-items">
                    <h4>ชื่อบัณฑิตนิพนธ์ (ภาษาไทย)</h4>
                    <p><?php echo $row['name_th'] ; ?></p>
                </div>
                <div class="approve-control-items">
                    <h4>ชื่อบัณฑิตนิพนธ์ (ภาษาอังกฤษ)</h4>
                    <p><?php echo $row['name_eng'] ; ?></p>
                </div>
            </div>

            <div class="approve-control">
                <div class="approve-control-items">
                    <h4>ประเภทบัณฑิตนิพนธ์</h4>
                    <p><?php echo $row['types'] ; ?></p>
                </div>
                <div class="approve-control-items">
                    <h4>ภาคเรียน</h4>
                    <p><?php echo $row['term'] ; ?></p>
                </div>
            </div>

            <div class="approve-control">
                <div class="approve-control-items">
                    <h4>ปีการศึกษา</h4>
                    <p><?php echo $row['year'] ; ?></p>
                </div>
            </div>



            <h4 class="title-main mt-50">อาจารย์ที่ปรึกษา</h4>
            <div class="approve-control">
                <div class="approve-control-items">
                    <h4>อาจารย์ที่ปรึกษาหลัก</h4>
                    <?php 
    $stmt2 = $pdo->query("select * from personal where personal_id = ".$row['personal_main']." ");
    while($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
    ?>
                    <p><?php echo $row2['tname'] ?><?php echo $row2['fname'] ?> <?php echo $row2['lname'] ?></p>
                    <?php 
            }
    ?>
                </div>
                <div class="approve-control-items">
                    <h4>อาจารย์ที่ปรึกษาร่วม</h4>
                    <?php 
    $stmt2 = $pdo->query("select * from personal where personal_id = ".$row['personal_sup']." ");
    while($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
    ?>
                    <p><?php echo $row2['tname'] ?><?php echo $row2['fname'] ?> <?php echo $row2['lname'] ?></p>
                    <?php 
            }
    ?>
                </div>
            </div>




            <h4 class="title-main mt-50">คณะผู้จัดทำ</h4>
            <div class="approve-control">
                <div class="approve-control-items">
                    <h4>คณะผู้จัดทำคนที่ 1</h4>
    <?php 
    $flag = 0 ;
    $stmt2 = $pdo->query("select * from student ");
    while($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
        if($flag == 0){
        $fullname = $row2['tname'].$row2['fname']." ".$row2['lname'] ;
        if ($fullname == $row['student_one']){
    ?>
            <p>รหัส นศ. <?php echo $row2['student_card'] ; ?></p>
    <?php 
            $flag = 1 ;
        }
        }
    }
    ?>
                    <p><?php echo $row['student_one'] ; ?></p>
                </div>
                <div class="approve-control-items">
                    <h4>คณะผู้จัดทำคนที่ 2</h4>
    <?php 
          if($row['student_two']==""){
    ?>
            <p>-</p>
<?php 
    }
    ?>
                    
                    <?php 
    $flag = 0 ;
    $stmt2 = $pdo->query("select * from student ");
    while($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
        if($flag == 0){
        $fullname = $row2['tname'].$row2['fname']." ".$row2['lname'] ;
        if ($fullname == $row['student_two']){
    ?>
            <p>รหัส นศ. <?php echo $row2['student_card'] ; ?></p>
    <?php 
            $flag = 1 ;
        }
        }
    }
    ?>
                    <p><?php echo $row['student_two'] ; ?></p>
                </div>
            </div>


            <h4 class="title-main mt-50">ความคืบหน้าไฟล์</h4>
            <div class="approve-control">
                <div class="approve-control-items">
                    <h4>ความคืบหน้าไฟล์</h4>
                    <?php 
                        if( $row['status1'] == 2 ){ 
                        ?>
                        <a target="_blank" style="color: #3498db;" href="../research/<?php echo $row['research_id'] ; ?>/<?php echo $row['file1'] ; ?>"><i class="fas fa-edit"></i> หัวข้อบัณฑิตนิพนธ์</a><br>
                    <?php } ?>
                    <?php if( $row['status2'] == 2 ){ ?>
                        <a target="_blank" style="color: #3498db;" href="../research/<?php echo $row['research_id'] ; ?>/<?php echo $row['file2'] ; ?>"><i class="fas fa-edit"></i> ก้าวหน้าบัณฑิตนิพนธ์</a><br>
                    <?php } ?>
                    <?php if( $row['status3'] == 2 ){ ?>
                        <a target="_blank" style="color: #3498db;" href="../research/<?php echo $row['research_id'] ; ?>/<?php echo $row['file3'] ; ?>"><i class="fas fa-edit"></i> ป้องกันบัณฑิตนิพนธ์</a><br>
                    <?php } ?>
                    <?php if( $row['status4'] == 2 ){ ?>
                        <a target="_blank" style="color: #3498db;" href="../research/<?php echo $row['research_id'] ; ?>/<?php echo $row['file4'] ; ?>"><i class="fas fa-edit"></i> บัณฑิตนิพนธ์ฉบับสมบูรณ์</a>
                    <?php 
                    }
                    ?>
                </div>
            </div>

            
            <h4 class="title-main mt-50">บทคัดย่อ</h4>
            <p><?php echo $row['abstract'] ; ?></p>


            <div class="btn-control mt-50">
                <a href="research_search.php" class="btn btn-danger"><i class="fas fa-fast-backward"></i>ย้อนกลับ</a>
              <!--
                <a href="#" class="btn btn-info"><i class="fas fa-book"></i>ตรวจสอบบัณฑิตนิพนธ์</a>
                -->
            </div>

        </div>
    </section>
    <?php 
}
?>
</body>
</html>