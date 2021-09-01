<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>อาจารย์ - จัดการบัณฑิตนิพนธ์</title>
    <?php include('root.php'); ?>
    <?php include('import.php'); ?>

  </head>
  <body>
  <?php include('teacher_navbarLogin.php'); ?>

    <section class="container">
    <div class="txt-header-manage">
        <h3 class="text-header">จัดการบัณฑิตนิพนธ์ (บัณฑิตนิพนธ์ในที่ปรึกษา)</h3>
        <div class="report-header">
          <a href="teacher_researchMyself.php?personal_id=<?php echo $_REQUEST['personal_id']; ?>" class="rp-select">ค้นหาบัณฑิตนิพนธ์</a>
          <a href="teacher_researchApproveMyself.php?personal_id=<?php echo $_REQUEST['personal_id']; ?>" class="rp-select rp-active">บัณฑิตนิพนธ์รออนุมัติ</a>
        </div>
      </div>
      <!-- <h3 class="text-header">จัดการบัณฑิตนิพนธ์ (บัณฑิตนิพนธ์ในที่ปรึกษา)</h3> -->

      <!-- search & filter -->
      <div class="form-control-search">
        <div class="form-control-search-left">
          <div class="form-control-search-left-top">
            <input
            id="myInput" onkeyup="myFunction()"
              type="search"
              class="txt-search"
              placeholder="ค้นบัณฑิตนิพนธ์ หรือ ชื่อนักศึกษา"
            />
            <i class="fas fa-search txt-i-search"></i>
          </div>
          <!--
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
-->
        </div>
        <div class="form-control-search-right">
          <button class="btn btn-search">ค้นหา</button>
        </div>
      </div>

      <?php 
     $research_id = 0 ;
     $stmt = $pdo->query("select * from research where personal_main = ".$_REQUEST['personal_id']."     ");
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
      if(($row['status1']==1) || ($row['status2']==1) || ($row['status3']==1) || ($row['status4']==1)  ){
        $research_id = $row['research_id'] ;
      }
    }

    if($research_id == 0){
  ?>
     <p style="width: 100%; text-align: center;">ไม่มีบัณฑิตนิพนธ์</p>
<?php 
    }
    else{
  ?>
      <!-- table -->
      <div class="table-scroll">
        <table class="table table-research" id="myTable">
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
    $count  = 1 ;
    $stmt = $pdo->query("select * from research where personal_main = ".$_REQUEST['personal_id']."     ");
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
      if(($row['status1']==1) || ($row['status2']==1) || ($row['status3']==1) || ($row['status4']==1)  ){
        ?>
                <tr>
                        <td>
                            <p class="p-td-center"><?php echo $count ; ?></p>
                        </td>
                        <td>
                      <a href="researchDetailApprove.php?personal_id=<?php echo $_REQUEST['personal_id'] ; ?>&research_id=<?php echo $row['research_id'] ; ?>" style="color: #3498db; text-decoration: underline;"><?php echo $row['name_th'] ; ?></a>
                        </td>
                        <td>
                            <p><?php echo $row['student_one'] ; ?></p>
                            <p><?php echo $row['student_two'] ; ?></p>
                        </td>
                        <td>
                            <p class="p-td-center"><?php echo $row['year'] ; ?></p>
                        </td>
                        <td>
                        <?php 
                            if($row['status4'] == 1){
                        ?>
                            <p class="p-td-center color-danger">
                                <i class="fas fa-circle"></i> รออนุมัติบัณฑิตนิพนธ์สมบูรณ์
                            </p>
                        <?php 
                            }
                            else if ($row['status3'] == 1){
                        ?>
                            <p class="p-td-center color-danger">
                                <i class="fas fa-circle"></i> รออนุมัติป้องกันบัณฑิตนิพนธ์
                            </p>
                        <?php 
                            }
                            else if ($row['status2'] == 1){
                        ?>
                            <p class="p-td-center color-danger">
                                <i class="fas fa-circle"></i> รออนุมัติก้าวหน้าบัณฑิตนิพนธ์
                            </p>
                        <?php 
                            }
                            else if ($row['status1'] == 1){
                        ?>
                            <p class="p-td-center color-danger">
                                <i class="fas fa-circle"></i> รออนุมัติหัวข้อบัณฑิตนิพนธ์
                            </p>
                        <?php 
                            }
                        ?>
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

      </div>
    </section>

    <?php include('footer.php'); ?>
  </body>
  <script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td1 = tr[i].getElementsByTagName("td")[1];
    td2 = tr[i].getElementsByTagName("td")[2];
    if (td1 || td2) {
      txtValue1 = td1.textContent || td1.innerText;
      txtValue2 = td2.textContent || td2.innerText;
      if ((txtValue1.toUpperCase().indexOf(filter) > -1) || (txtValue2.toUpperCase().indexOf(filter) > -1)) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
 
  }
}
</script>
</html>
