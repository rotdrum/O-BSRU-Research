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
  ?>
      <div class="btn-research-control">
        <a style="margin-right: 10px;" id="sureDelete" class="btn btn-danger"><i class="fas fa-info"></i>ลบบัณฑิตนิพนธ์</a>
        <a href="student_researchUpdate.php?student_id=<?php echo $_REQUEST['student_id'] ; ?>" class="btn btn-warning"><i class="fas fa-plus-square"></i>แก้ไขเพิ่มเติมบัณฑิตนิพนธ์</a>
      </div>
 <?php 
      }
    }
  ?>
  <!-- href="poststudent_researchDelete.php?student_id=<?php echo $_REQUEST['student_id'] ; ?>" -->
  
     </div>

      <!-- search & filter -->

      <!--
      <div class="form-control-search">
        <div class="form-control-search-left">
          <div class="form-control-search-left-top">
            <input
              type="search"
              class="txt-search"
              placeholder="ค้นบัณฑิตนิพนธ์ หรือ ชื่อนักศึกษา"
            />
            <i class="fas fa-search txt-i-search"></i>
          </div>
          <div class="form-control-search-left-bottom">
            <select ect class="sel sel-filter">
              <option value="">--- สถานะบัณฑิตนิพนธ์ ---</option>
              <option value="">สถานะ</option>
              <option value="">สถานะ</option>
            </select>
            <select class="sel sel-filter">
              <option value="">--- อาจารย์ที่ปรึกษา ---</option>
              <option value="">อาจารย์ที่ปรึกษาหลัก</option>
              <option value="">อาจารย์ที่ปรึกษาร่วม</option>
            </select>
          </div>
        </div>
        <div class="form-control-search-right">
          <button class="btn btn-search">ค้นหา</button>
        </div>
      </div>
  -->
  
      <!-- table -->
      <div class="table-scroll">
        <table class="table table-research">
            <thead>
              <tr>
                <th>ลำดับ</th>
                <th class="w-300">ชื่อบัณฑิตนิพนธ์</th>
                <th class="w-200">นักศึกษา</th>
                <th>ปีการศึกษา</th>
                <th class="w-150">สถานะ</th>
                <th class="w-100">อัพเดทล่าสุด</th>
                <th class="w-150">รายละเอียด</th>
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
                  <p>
                    <?php echo $row['name_th'] ; ?>
                  </p>
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
                  <p class="color-danger p-td-center">
                    <i class="fas fa-circle"></i> รอการอนุมัติหัวข้อบัณฑิตนิพนธ์
                  <?php 
                    }
                    else{
                  ?>
                  <p class="color-success p-td-center">
                    <i class="fas fa-circle"></i> ผ่านหัวข้อบัณฑิตนิพนธ์
                  <?php 
                    }
                  ?>
                  </p>
                </td>
                <td>
                  <p class="p-td-center"><?php echo $row['update_up'] ; ?></p>
                </td>
                <td>
                  <a target="_blank" href="research/<?php echo $research_id; ?>/<?php echo $row['file1']; ?>" class="btn btn-danger">PDF</a>
                  <a href="researchDetail.php?student_id=<?php echo $_REQUEST['student_id'] ; ?>&research_id=<?php echo $research_id; ?>" class="btn btn-primary">เพิ่มเติม</a>
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
                  <p>
                    <?php echo $row['name_th'] ; ?>
                  </p>
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
                  <p class="color-danger p-td-center">
                    <i class="fas fa-circle"></i> รอการอนุมัติก้าวหน้าบัณฑิตนิพนธ์
                  <?php 
                    }
                    else{
                  ?>
                  <p class="color-success p-td-center">
                    <i class="fas fa-circle"></i> ผ่านก้าวหน้าบัณฑิตนิพนธ์
                  <?php 
                    }
                  ?>
                  </p>
                </td>
                <td>
                  <p class="p-td-center"><?php echo $row['update_up'] ; ?></p>
                </td>
                <td>
                <a target="_blank" href="research/<?php echo $research_id; ?>/<?php echo $row['file2']; ?>" class="btn btn-danger">PDF</a>
                  <a  href="researchDetail.php?student_id=<?php echo $_REQUEST['student_id'] ; ?>&research_id=<?php echo $research_id; ?>" class="btn btn-primary">เพิ่มเติม</a>
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
                  <p>
                    <?php echo $row['name_th'] ; ?>
                  </p>
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
                  <p class="color-danger p-td-center">
                    <i class="fas fa-circle"></i> รอการอนุมัติป้องกันบัณฑิตนิพนธ์
                  <?php 
                    }
                    else{
                  ?>
                  <p class="color-success p-td-center">
                    <i class="fas fa-circle"></i> ผ่านป้องกันบัณฑิตนิพนธ์
                  <?php 
                    }
                  ?>
                  </p>
                </td>
                <td>
                  <p class="p-td-center"><?php echo $row['update_up'] ; ?></p>
                </td>
                <td>
                <a target="_blank" href="research/<?php echo $research_id; ?>/<?php echo $row['file3']; ?>" class="btn btn-danger">PDF</a>
                  <a href="researchDetail.php?student_id=<?php echo $_REQUEST['student_id'] ; ?>&research_id=<?php echo $research_id; ?>" class="btn btn-primary">เพิ่มเติม</a>
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
                  <p>
                    <?php echo $row['name_th'] ; ?>
                  </p>
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
                  <p class="color-danger p-td-center">
                    <i class="fas fa-circle"></i> รอการอนุมัติบัณฑิตนิพนธ์สมบูรณ์
                  <?php 
                    }
                    else{
                  ?>
                  <p class="color-success p-td-center">
                    <i class="fas fa-circle"></i> ผ่านบัณฑิตนิพนธ์สมบูรณ์
                  <?php 
                    }
                  ?>
                  </p>
                </td>
                <td>
                  <p class="p-td-center"><?php echo $row['update_up'] ; ?></p>
                </td>
                <td>
                <a target="_blank" href="research/<?php echo $research_id; ?>/<?php echo $row['file4']; ?>" class="btn btn-danger">PDF</a>
                  <a href="researchDetail.php?student_id=<?php echo $_REQUEST['student_id'] ; ?>&research_id=<?php echo $research_id; ?>" class="btn btn-primary">เพิ่มเติม</a>
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
