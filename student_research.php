<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>จัดการบัณฑิตนิพนธ์</title>
    <?php include('root.php'); ?>
    <?php include('import.php'); ?>

  </head>
  <body>
  <?php include('session_student.php'); ?>

  <?php include('student_navbarLogin.php'); ?>

    <section  class="container">
      <div class="txt-header-manage">
        <h3 class="text-header">จัดการบัณฑิตนิพนธ์</h3>
        <?php 
    $stmt = $pdo->query("select * from student where student_id = ".$_REQUEST['student_id']." ");
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
      $research_id = $row['research_id'] ;
      if($row['research_id'] == 0){
  ?>
        <a href="student_researchAdd.php?student_id=<?php echo $_REQUEST['student_id'] ; ?>" class="btn btn-success"><i class="fas fa-plus-square"></i>เพิ่มบัณฑิตนิพนธ์</a>
        <?php 
      }
      else{
        $stmt2 = $pdo->query("select * from research where research_id = ".$row['research_id']." ");
        while($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
        if($row2['status4'] != 2){
  ?>
      <div class="btn-research-control">
        <a style="margin-right: 10px;" href="student_researchFileUpdate.php?student_id=<?php echo $_REQUEST['student_id'] ; ?>" class="btn btn-success"><i class="fas fa-plus-square"></i>เพิ่มไฟล์บัณฑิตนิพนธ์</a>
        <a style="margin-right: 10px;" href="student_researchUpdate.php?student_id=<?php echo $_REQUEST['student_id'] ; ?>" class="btn btn-warning"><i class="fas fa-plus-square"></i>แก้ไขข้อมูลบัณฑิตนิพนธ์</a>
        <?php 
              if($row2['status2'] != 2){
        ?>
        <a style="margin-right: 10px;" id="sureDelete" class="btn btn-danger"><i class="fas fa-info"></i>ลบบัณฑิตนิพนธ์</a>
        <?php 
             }
        ?>
      </div>
 <?php 
        }
        }
      }
    }
  ?>
  <!-- href="poststudent_researchDelete.php?student_id=<?php echo $_REQUEST['student_id'] ; ?>" -->
  
     </div>
     <?php 
     $research_id = 0 ;

    $stmt = $pdo->query("select * from student where student_id = ".$_REQUEST['student_id']." ");
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
      $research_id = $row['research_id'] ;
    }

    if($research_id == 0){
  ?>
     <p style="width: 100%; text-align: center;">ไม่มีบัณฑิตนิพนธ์</p>
<?php 
    }
    else{
  ?>
<div class="table-scroll">
        <table class="table table-research">
          <thead>
              <tr>
                  <th class="w-50">ลำดับ</th>
                  <th class="w-300">ชื่อบัณฑิตนิพนธ์</th>
                  <th class="w-300">นักศึกษา</th>
                  <th>ปีการศึกษา</th>
                  <th class="w-300">สถานะ</th>
              </tr>
          </thead>
          <tbody>
          <?php 
    $stmt = $pdo->query("select * from research where research_id = ".$research_id." ");
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
      $count = 1 ;
      if($row['status1'] != 0){
  ?>
              <tr>
                <td><p class="p-td-center"><?php echo $count ; ?></p></td>
                <td>
          <?php 
                if($row['status1'] == 1){
  ?>

                <a href="researchDetailWait.php?student_id=<?php echo $_REQUEST['student_id'] ; ?>&research_id=<?php echo $research_id; ?>" style="font-size: 1rem; text-decoration: underline; color: #3498db;"><?php echo $row['name_th'] ; ?></a>
                <?php 
              }
              else{
  ?>
                <a href="researchDetail.php?student_id=<?php echo $_REQUEST['student_id'] ; ?>&research_id=<?php echo $research_id; ?>" style="font-size: 1rem; text-decoration: underline; color: #3498db;"><?php echo $row['name_th'] ; ?></a>
<?php 
              }
  ?>
                </td>
                <td>
                  <p><?php echo $row['student_one'] ; ?></p>
                  <p><?php echo $row['student_two'] ; ?></p>
                </td>
                <td><p class="p-td-center"><?php echo $row['year'] ; ?></p></td>
                <td>
                  <?php 
                    if($row['status1'] == 1){
                  ?>
                  <p class="color-danger">
                    <i class="fas fa-circle"></i> รอการอนุมัติหัวข้อบัณฑิตนิพนธ์
                  <?php 
                    }
                    else{
                  ?>
                  <p class="color-success">
                    <i class="fas fa-circle"></i> ผ่านหัวข้อบัณฑิตนิพนธ์
                  <?php 
                    }
                  ?>
                  </p>
                </td>
              </tr>
          <?php 
          $count++;
          }
          if($row['status2'] != 0){
          ?>
    <tr>
                <td><p class="p-td-center"><?php echo $count ; ?></p></td>
                <td>
                <?php 
                if($row['status2'] == 1){
  ?>

                <a href="researchDetailWait.php?student_id=<?php echo $_REQUEST['student_id'] ; ?>&research_id=<?php echo $research_id; ?>" style="font-size: 1rem; text-decoration: underline; color: #3498db;"><?php echo $row['name_th'] ; ?></a>
                <?php 
              }
              else{
  ?>
                <a href="researchDetail.php?student_id=<?php echo $_REQUEST['student_id'] ; ?>&research_id=<?php echo $research_id; ?>" style="font-size: 1rem; text-decoration: underline; color: #3498db;"><?php echo $row['name_th'] ; ?></a>
<?php 
              }
  ?>
                </td>
                <td>
                  <p><?php echo $row['student_one'] ; ?></p>
                  <p><?php echo $row['student_two'] ; ?></p>
                </td>
                <td><p class="p-td-center"><?php echo $row['year'] ; ?></p></td>
                <td>
                  <?php 
                    if($row['status2'] == 1){
                  ?>
                  <p class="color-danger">
                    <i class="fas fa-circle"></i> รอการอนุมัติก้าวหน้าบัณฑิตนิพนธ์
                  <?php 
                    }
                    else{
                  ?>
                  <p class="color-success">
                    <i class="fas fa-circle"></i> ผ่านก้าวหน้าบัณฑิตนิพนธ์
                  <?php 
                    }
                  ?>
                  </p>
                </td>
              </tr>
          <?php 
          $count++;
          }
          if($row['status3'] != 0){
          ?>
    <tr>
                <td><p class="p-td-center"><?php echo $count ; ?></p></td>
                <td>
                <?php 
                if($row['status3'] == 1){
  ?>

                <a href="researchDetailWait.php?student_id=<?php echo $_REQUEST['student_id'] ; ?>&research_id=<?php echo $research_id; ?>" style="font-size: 1rem; text-decoration: underline; color: #3498db;"><?php echo $row['name_th'] ; ?></a>
                <?php 
              }
              else{
  ?>
                <a href="researchDetail.php?student_id=<?php echo $_REQUEST['student_id'] ; ?>&research_id=<?php echo $research_id; ?>" style="font-size: 1rem; text-decoration: underline; color: #3498db;"><?php echo $row['name_th'] ; ?></a>
<?php 
              }
  ?>
                </td>
                <td>
                  <p><?php echo $row['student_one'] ; ?></p>
                  <p><?php echo $row['student_two'] ; ?></p>
                </td>
                <td><p class="p-td-center"><?php echo $row['year'] ; ?></p></td>
                <td>
                  <?php 
                    if($row['status3'] == 1){
                  ?>
                  <p class="color-danger">
                    <i class="fas fa-circle"></i> รอการอนุมัติป้องกันบัณฑิตนิพนธ์
                  <?php 
                    }
                    else{
                  ?>
                  <p class="color-success">
                    <i class="fas fa-circle"></i> ผ่านป้องกันบัณฑิตนิพนธ์
                  <?php 
                    }
                  ?>
                  </p>
                </td>
              </tr>
          <?php 
          $count++;
          }
          if($row['status4'] != 0){
          ?>
    <tr>
                <td><p class="p-td-center"><?php echo $count ; ?></p></td>
                <td>
                <?php 
                if($row['status4'] == 1){
  ?>

                <a href="researchDetailWait.php?student_id=<?php echo $_REQUEST['student_id'] ; ?>&research_id=<?php echo $research_id; ?>" style="font-size: 1rem; text-decoration: underline; color: #3498db;"><?php echo $row['name_th'] ; ?></a>
                <?php 
              }
              else{
  ?>
                <a href="researchDetail.php?student_id=<?php echo $_REQUEST['student_id'] ; ?>&research_id=<?php echo $research_id; ?>" style="font-size: 1rem; text-decoration: underline; color: #3498db;"><?php echo $row['name_th'] ; ?></a>
<?php 
              }
  ?>
                 </td>
                <td>
                  <p><?php echo $row['student_one'] ; ?></p>
                  <p><?php echo $row['student_two'] ; ?></p>
                </td>
                <td><p class="p-td-center"><?php echo $row['year'] ; ?></p></td>
                <td>
                  <?php 
                    if($row['status4'] == 1){
                  ?>
                  <p class="color-danger">
                    <i class="fas fa-circle"></i> รอการอนุมัติบัณฑิตนิพนธ์สมบูรณ์
                  <?php 
                    }
                    else{
                  ?>
                  <p class="color-success">
                    <i class="fas fa-circle"></i> ผ่านบัณฑิตนิพนธ์สมบูรณ์
                  <?php 
                    }
                  ?>
                  </p>
                </td>
              </tr>
          <?php
          $count++;
          }
    }
  ?>
        
          </tbody>
        </table>
    </div>
<?php 
    }
  ?>
 
    </section>
    <?php include('footer.php'); ?>

    <div id="overlayDelete" style="display: none; justify-content: center; align-items: center; z-index: 999; width: 100%; height: 100%; background-color: rgba(0,0,0,0.5); position: fixed; top: 0;">
      <div style="display: flex; justify-content: center; align-items: center; flex-direction: column; width: 500px; height: 300px; background: #fff; border-radius: 20px; padding: 50px;">
        <i class="fas fa-exclamation-triangle" style="font-size: 5rem; color: red; margin-bottom: 20px;"></i>
        <h1>คุณแน่ใจว่าต้องการจะลบ?</h1>
        <div style="display: flex; width: 100%; justify-content: center; margin-top: 30px;">
          <a class="btn btn-danger" href="poststudent_researchDelete.php?student_id=<?php echo $_REQUEST['student_id'] ; ?>" style="margin-right: 20px;"><i class="fas fa-trash-alt"></i> ลบ</a>
          <a id="cancelRemove" class="btn" style="background: #f7f7f7; border: 1px solid #e5e5e5; color: #333;">ยกเลิก</a>
        </div>
      </div>
    </div>

    <script>
      $("#overlayDelete").click(() => {
        $("#overlayDelete").css("display", "none");
      });
      $("#cancelRemove").click(() => {
        $("#overlayDelete").css("display", "none");
      });
      $("#sureDelete").click(() => {
        $("#overlayDelete").css("display", "flex");
      });
    </script>

  </body>
</html>
