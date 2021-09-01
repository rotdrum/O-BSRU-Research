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

    

    <section class="main">
        <div class="btn btn-hamburger">
            <i class="fas fa-bars"></i>
        </div>
        
        <div class="sidebar">
            <?php include('sidebar.php'); ?>
        </div>
        <div class="dashboard">
            <h2 class="dashboard-title">จัดตารางสอบ</h2>
    <!-- search & filter -->
    <div class="form-control-search">
                <div class="form-control-search-left">
                    <div class="form-control-search-left-top">
                        <input id="myInput" onkeyup="myFunction()"  type="search" class="txt-search" placeholder="ค้นหาชื่อบัณฑิตนิพนธ์ นักศึกษา " />
                        <i class="fas fa-search txt-i-search"></i>
                    </div>
                </div>
                </div>
             <!-- table -->
        <div class="table-scroll">
            <table class="table table-research" id="myTable">
                <thead>
                    <tr>
                        <th>ลำดับ</th>
                        <th class="w-300">ชื่อบัณฑิตนิพนธ์</th>
                        <th class="w-200">นักศึกษา</th>
                        <th>ปีการศึกษา</th>
                        <th class="w-150">สถานะ บพ.</th>
                        <th class="w-150">สถานะ</th>
                        <th class="w-100">อัพเดทล่าสุด</th>
                        <th class="w-200">รายละเอียด</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
    $count = 1 ;
    $stmt = $pdo->query("select * from research ORDER BY create_up ASC  ");
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        if(($row['status1']==2) || ($row['status2']==2) || ($row['status3']==2) || ($row['status4']==2)  ){
            ?>
                    <tr>
                        <td>
                            <p class="p-td-center"><?php echo $count ; ?></p>
                        </td>
                        <td>
                            <p>
                            <?php echo $row['name_th'] ; ?>
                            </p>
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
                            if($row['status4'] == 2){
                        ?>
                            <p class="color-success p-td-center">
                                <i class="fas fa-circle"></i> ผ่านบัณฑิตนิพนธ์สมบูรณ์
                            </p>
                        <?php 
                            }
                            else if ($row['status3'] == 2){
                        ?>
                            <p class="color-success p-td-center">
                                <i class="fas fa-circle"></i> ผ่านป้องกันบัณฑิตนิพนธ์
                            </p>
                        <?php 
                            }
                            else if ($row['status2'] == 2){
                        ?>
                            <p class="color-success p-td-center">
                                <i class="fas fa-circle"></i> ผ่านก้าวหน้าบัณฑิตนิพนธ์
                            </p>
                        <?php 
                            }
                            else if ($row['status1'] == 2){
                        ?>
                            <p class="color-success p-td-center">
                                <i class="fas fa-circle"></i> ผ่านหัวข้อบัณฑิตนิพนธ์
                            </p>
                        <?php 
                            }
                        ?>
                        </td>
                        <td>
                        <?php 
                        $status = 9 ;
                        $stmt2 = $pdo->query("select * from exam  where research_id = ".$row['research_id']."  ");
                        while($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
                            $status = $row2['status_exam'] ;
                        }
                        ?>
                        <?php 
                        if($status == 0){
                            ?>
                            <p class="p-td-center color-success">จัดตารางสอบแล้ว</p>
                            <?php 
                        }
                        else if($status <= 3){
                            ?>
                            <p class="p-td-center color-warning">สอบเรียบร้อยแล้ว</p>
                            <?php 
                        }
                        else{
                            ?>
                            <p class="p-td-center color-danger">ยังไม่จัดตารางสอบ</p>
                        <?php 
                        }
                        ?>
                        </td>
                        <td>
                            <p class="p-td-center"><?php echo $row['update_up'] ; ?></p>
                        </td>
                        <td>
                        <?php 
                            if($row['status4'] == 2){
                        ?>
                            <a href="examDetail.php?research_id=<?php echo $row['research_id'] ; ?>&status_file=4" class="btn btn-success">จัดตารางสอบ</a>
                        <?php 
                            }
                            else if ($row['status3'] == 2){
                        ?>
                            <a href="examDetail.php?research_id=<?php echo $row['research_id'] ; ?>&status_file=3" class="btn btn-success">จัดตารางสอบ</a>
                          
                        <?php 
                            }
                            else if ($row['status2'] == 2){
                        ?>
                            <a href="examDetail.php?research_id=<?php echo $row['research_id'] ; ?>&status_file=2" class="btn btn-success">จัดตารางสอบ</a>
                     
                        <?php 
                            }
                            else if ($row['status1'] == 2){
                        ?>
                            <a href="examDetail.php?research_id=<?php echo $row['research_id'] ; ?>&status_file=1" class="btn btn-success">จัดตารางสอบ</a>
                        
                        <?php 
                            }
                        ?>
                        </td>
                    </tr>
                    <?php 
                    $count++ ;
        }
    }
    ?>
                </tbody>
            </table>
        </div>

        </div>
    </section>
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