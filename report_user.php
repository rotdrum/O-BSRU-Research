<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายงาน</title>
    <?php include('root.php'); ?>

    <?php include('import.php'); ?>
 
</head>
<body>

<?php include('teacher_navbarLogin.php'); ?>

<section class="container">
      <div class="txt-header-manage">
        <h3 class="text-header">รายงานผู้ใช้ระบบ</h3>
        <div class="report-header">
        <a href="report_research.php?personal_id=<?php echo $_REQUEST['personal_id'] ; ?>" class="rp-select">บัณฑิตนิพนธ์</a>
          <a href="report_teacher.php?personal_id=<?php echo $_REQUEST['personal_id'] ; ?>" class="rp-select">ภาระอาจารย์ที่ปรึกษา</a>
          <a href="report_exam.php?personal_id=<?php echo $_REQUEST['personal_id'] ; ?>" class="rp-select">งานการจัดสอบ</a>
          <a href="report_user.php?personal_id=<?php echo $_REQUEST['personal_id'] ; ?>" class="rp-select  rp-active">ผู้ใช้ระบบ</a>
        </div>
      </div>

      <div class="report-filter">
        <div class="report-filter-control">
          <p>ประเภทผู้ใช้งาน</p>
          <select id="act" class="sel sel-report-filter">
            <option value="">--- เลือก ---</option>
            <option value="all">ทั้งหมด</option>
            <option value="personal">อาจารย์</option>
            <option value="student">นักศึกษา</option>
          </select>
        </div>

        <div class="report-filter-control report-filter-control-special ">
          <div class="report-m"></div>
          <a onclick="window.print()" class="btn btn-warning"><i class="fas fa-print"></i>พิมพ์เอกสาร</a>
        </div>
      </div>

      <h1 class="title-print">รายงานผู้ใช้ระบบ</h1>

      <!-- table -->
      <div class="table-scroll">
        <table class="table table-research" id="personal_table">
            <thead>
              <tr>
                <th class="w-50">ลำดับ</th>
                <th >ชื่อ-สกุล</th>
                <th class="w-200">โทรศัพท์</th>
                <th class="w-200">สถานะ</th>
              </tr>
            </thead>
            <tbody>
            <?php 
              $count = 1 ;
                        $stmt = $pdo->query("select * from personal  ");
                        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                        ?>
              <tr>
                <td><p class="p-td-center"><?php echo $count ; ?></p></td>
                <td><p><?php echo $row['tname'] ; ?><?php echo $row['fname'] ; ?> <?php echo $row['lname'] ; ?></p></td>
                <td><p class="p-td-center"><?php echo $row['tel'] ; ?></p></td>
                <td><p class="p-td-center">อาจารย์</p></td>
              </tr>
              <?php 
              $count++;
            }
              ?>
            </tbody>
          </table>
      </div>
<br>
      <div class="table-scroll">
        <table class="table table-research" id="student_table">
            <thead>
              <tr>
                <th class="w-50">ลำดับ</th>
                <th >ชื่อ-สกุล</th>
                <th class="w-200">โทรศัพท์</th>
                <th class="w-200">สถานะ</th>
              </tr>
            </thead>
            <tbody>
            <?php 
              $count = 1 ;
                        $stmt = $pdo->query("select * from student  ");
                        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                        ?>
              <tr>
                <td><p class="p-td-center"><?php echo $count ; ?></p></td>
                <td><p><?php echo $row['tname'] ; ?><?php echo $row['fname'] ; ?> <?php echo $row['lname'] ; ?></p></td>
                <td><p class="p-td-center"><?php echo $row['tel'] ; ?></p></td>
                <td><p class="p-td-center">นักศึกษา</p></td>
              </tr>
              <?php 
              $count++;
            }
              ?>
            </tbody>
          </table>
      </div>
    </section>
    <?php include('footer.php'); ?>

<script>


  $("#act").change(function() {
    if($("#act").val() == "all") {
      console.log("all")
      $("#student_table").show();
      $("#personal_table").show();
    }
    if($("#act").val() == "personal") {
      console.log("personal")

      $("#student_table").hide();
      $("#personal_table").show();
    }
    if($("#act").val() == "student") {
      console.log("student")

      $("#student_table").show();
      $("#personal_table").hide();
    }
  });


  

</script>
</body>
</html>