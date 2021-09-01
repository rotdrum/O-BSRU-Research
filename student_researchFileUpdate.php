<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>แก้ไขบัณฑิตนิพนธ์</title>
    <?php include('root.php'); ?>
    <?php include('import.php'); ?>

  </head>
  <body>
  <?php include('session_student.php'); ?>

  <?php include('student_navbarLogin.php'); ?>

  <?php 
    $stmt = $pdo->query("select * from student where student_id = ".$_REQUEST['student_id']." ");
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $research_id = $row['research_id'];
    }
  ?>


  <?php 
    $stmt = $pdo->query("select * from research where research_id = ".$research_id." ");
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
  ?>
    <form class="container" action="poststudent_researchFileUpdate.php?research_id=<?php echo $research_id ; ?>&student_id=<?php echo $_REQUEST['student_id'] ; ?>" method="post" enctype="multipart/form-data" >
      <div class="txt-header-manage">
        <h3 class="text-header">เพิ่มไฟล์บัณฑิตนิพนธ์</h3>
      </div>

      <div class="card-column">
        <h4 class="header-manage-research">เกี่ยวกับบัณฑิตนิพนธ์</h4>
        <div class="form-control">
        <input required value="<?php echo $row['name_th'] ; ?>" name="name_th"   type="hidden" class="txt-input" placeholder="กรอกชื่อบัณฑิตนิพนธ์ภาษาไทย">

            <p>ประเภทไฟล์</p>
            <select  name="type_file" class="sel sel-input">
<?php
  if($row['status4'] == 2){ }
  else if($row['status3'] == 2){
?>
                <option value="4">บัณฑิตนิพนธ์ฉบับสมบูรณ์</option>
<?php
  }
  else if($row['status2'] == 2){
?>
                <option value="3">ป้องกันบัณฑิตนิพนธ์</option>

<?php
  }
  else if($row['status1'] == 2){
?>
                <option value="2">ก้าวหน้าบัณฑิตนิพนธ์</option>
<?php
  }
  else{
?>
                <option value="1">หัวข้อบัณฑิตนิพนธ์</option>
<?php
  }
?>
            </select>
        </div>

        <div class="form-upload">
            <label for="file-upload-1">อัพโหลดไฟล์
              <input   name="name_file" type="file" id="file-upload-1" class="file-upload" accept=".pdf" required>
            </label>
            <p id="filename-1" class="filename">อัพโหลดไฟล์บัณฑิตนิพนธ์ (.PDF)</p>
        </div>

        <div class="btn-control">
            <button class="btn btn-info btn-submit">บันทึก</button>
            <a id="btn_cancel" class="btn btn-danger btn-submit">ยกเลิก</a>
        </div>

        

      </div>


    </form>
    <?php 
            }
    ?>
    <?php include('footer.php'); ?>

    <div id="overlay" style="display: none; justify-content: center; align-items: center; z-index: 999; width: 100%; height: 100%; background-color: rgba(0,0,0,0.5); position: fixed; top: 0;">
      <div style="display: flex; justify-content: center; align-items: center; flex-direction: column; width: 500px; height: 300px; background: #fff; border-radius: 20px; padding: 50px;">
        <i class="fas fa-exclamation-triangle" style="font-size: 5rem; color: red; margin-bottom: 20px;"></i>
        <h3>คุณแน่ใจว่าต้องการยกเลิก?</h3>
        <div style="display: flex; width: 100%; justify-content: center; margin-top: 30px;">
          <a href="student_research.php?student_id=<?php echo $_REQUEST['student_id'] ; ?>" class="btn btn-danger" style="margin-right: 20px;"><i class="fas fa-trash-alt"></i> ยืนยัน</a>
          <a id="btn_reject" class="btn" style="background: #f7f7f7; border: 1px solid #e5e5e5; color: #333;">ยกเลิก</a>
        </div>
      </div>
    </div>

    <script>
    $("#personal_sub").blur(() => {
        if($("#personal_main").val() == $("#personal_sub").val()) {
          Swal.fire({
            icon: 'error',
            title: 'อาจารย์ที่ปรึกษาซ้ำกัน',
            text: 'โปรดเลือกอาจารย์ที่ปรึกษาร่วมใหม่'
          })
          $("#personal_sub").val("")
        }
      })

      $("#btn_cancel").click(() => {
        $("#overlay").css("display", "flex");
      });
      $("#overlay").click(() => {
        $("#overlay").css("display", "none");
      });
      $("#btn_reject").click(() => {
        $("#overlay").css("display", "none");
      });
    </script>
   
  </body>
</html>
