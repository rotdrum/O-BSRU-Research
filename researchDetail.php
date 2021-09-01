<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>รายละเอียดบัณฑิตนิพนธ์</title>

    <?php include('root.php'); ?>

    <?php include('import.php'); ?>

  </head>
  <body>
  
  <?php 
        if(isset($_REQUEST['student_id'])){
            include('session_student.php'); 

            include('student_navbarLogin.php'); 
        }
        else if(isset($_REQUEST['personal_id'])){
            include('session_personal.php'); 

            include('teacher_navbarLogin.php'); 
        }
        else{
            include('navbarNotLogin.php'); 
        }
    ?>

<?php 
    $stmt = $pdo->query("select * from research where research_id = ".$_REQUEST['research_id']." ");
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

  ?>
    <section class="container">

        <div class="txt-header-manage">
            <h3 class="text-header">รายละเอียดบัณฑิตนิพนธ์</h3>
        </div>
        

        <div class="card-column">
            <h4 class="header-manage-research">เกี่ยวกับบัณฑิตนิพนธ์</h4>
            <div class="form-control-row">
                <div class="form-control-detail">
                    <h4>ชื่อบัณฑิตนิพนธ์ (ภาษาไทย)</h4>
                    <p><?php echo $row['name_th'] ; ?></p>
                </div>
                <div class="form-control-detail">
                    <h4>ชื่อบัณฑิตนิพนธ์ (ภาษาอังกฤษ)</h4>
                    <p> <?php echo $row['name_eng'] ; ?></p>
                </div>
            </div>
            <div class="form-control-row">
                <div class="form-control-detail">
                    <h4>ประเภทบัณฑิตนิพนธ์</h4>
                    <p><?php echo $row['types'] ; ?></p>
                </div>
                <div class="form-control-detail">
                    <h4>ภาคเรียน</h4>
                    <p><?php echo $row['term'] ; ?></p>
                </div>
            </div>
            <div class="form-control-row">
                
                <div class="form-control-detail">
                    <h4>ปีการศึกษา</h4>
                    <p><?php echo $row['year'] ; ?></p>
                </div>
            </div>
            


            <h4 class="mt-50 header-manage-research">อาจารย์ที่ปรึกษา</h4>
            <div class="form-control-row">
                <div class="form-control-detail">
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
                <div class="form-control-detail">
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

            <h4 class="mt-50 header-manage-research">คณะผู้จัดทำ</h4>
            <div class="form-control-row">
                <div class="form-control-detail">
                    <h4>คณะผู้จัดทำ คนที่ 1</h4>
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
                <div class="form-control-detail">
                    <h4>คณะผู้จัดทำ คนที่ 2</h4>
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

        

                    <?php 
                    if((isset($_REQUEST['student_id'])) || (isset($_REQUEST['personal_id']))){
                        ?>
                         <h4 class="mt-50 header-manage-research">ความคืบหน้าไฟล์</h4>
            <div class="form-control-row">
                <div class="form-control-detail">
                    <h4>ประเภทไฟล์</h4>
                    <?php 
                        if( $row['status1'] == 2 ){ 
                        ?>
                        <div style="display: flex; align-items: center;">
                            <a target="_blank" href="research/<?php echo $row['research_id'] ; ?>/<?php echo $row['file1'] ; ?>" style="margin-right: 10px; color: #3498db; text-decoration: underline;"><i class="fas fa-edit"></i> หัวข้อบัณฑิตนิพนธ์  </a>
                        </div>
                    <?php } ?>
                    <?php if( $row['status2'] == 2 ){ ?>
                        <div style="display: flex; align-items: center;">
                            <a target="_blank" href="research/<?php echo $row['research_id'] ; ?>/<?php echo $row['file2'] ; ?>" style="margin-right: 10px; color: #3498db; text-decoration: underline;"><i class="fas fa-edit"></i> ก้าวหน้าบัณฑิตนิพนธ์  </a>
                        </div>
                    <?php } ?>
                    <?php if( $row['status3'] == 2 ){ ?>
                        <div style="display: flex; align-items: center;">
                            <a target="_blank" href="research/<?php echo $row['research_id'] ; ?>/<?php echo $row['file3'] ; ?>" style="margin-right: 10px; color: #3498db; text-decoration: underline;"><i class="fas fa-edit"></i> ป้องกันบัณฑิตนิพนธ์ </a>
                        </div>
                    <?php } ?>
                    <?php if( $row['status4'] == 2 ){ ?>
                        <div style="display: flex; align-items: center;">
                            <a target="_blank" href="research/<?php echo $row['research_id'] ; ?>/<?php echo $row['file4'] ; ?>" style="margin-right: 10px; color: #1abc9c; text-decoration: underline;"><i class="fas fa-edit"></i> บัณฑิตนิพนธ์ฉบับสมบูรณ์ </a>
                        </div>
                    <?php 
                    }
                    ?>
                      </div>
            </div>
                    <?php 
                } 
                    ?>

                    
              

            <h4 class="mt-50 header-manage-research">บทคัดย่อ</h4>
            <p style="margin-top: 20px;"><?php echo $row['abstract'] ; ?></p>


            <div class="btn-control">
                  <!--
                <a href="index.php" class="btn btn-danger btn-submit">ย้อนกลับ</a>
    -->
                    <?php 
                    if((isset($_REQUEST['student_id'])) || (isset($_REQUEST['personal_id']))){ }
                    else{
                        if( $row['status4'] == 2 ){
                        ?>
                            <a href="research/<?php echo $row['research_id'] ; ?>/<?php echo $row['file4'] ; ?>" target="_blank" class="btn btn-info btn-submit">ดูไฟล์บัณฑิตนิพนธ์</a>
                    <?php 
                        }
                    }
                    ?>
            </div>

        </div>      
      </div>


    </section>
    <?php 
    }
  ?>
  <?php include('footer.php'); ?>

  </body>
</html>
