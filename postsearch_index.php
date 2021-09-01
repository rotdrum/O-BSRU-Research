<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>บัณฑิตนิพนธ์</title>

    <?php include('root.php'); ?>
    <?php include('import.php'); ?>
</head>

<body>
    <?php 
        if(isset($_REQUEST['student_id'])){
            include('student_navbarLogin.php'); 
        }
        else if(isset($_REQUEST['personal_id'])){
            include('teacher_navbarLogin.php'); 
        }
        else{
            include('navbarNotLogin.php'); 
        }
    ?>

    <section class="container">
        <h3 class="text-header">ค้นหาบัณฑิตนิพนธ์</h3>
        <!-- search & filter -->
        <?php 
                        if(isset($_REQUEST['student_id'])){
                    ?>
        <form action="postsearch_index.php?student_id=<?php echo $_REQUEST['student_id'] ; ?>" method="post" class="form-control-search">

                    <?php 
                        }
                        else if(isset($_REQUEST['personal_id'])){
                    ?>
        <form action="postsearch_index.php?personal_id=<?php echo $_REQUEST['personal_id'] ; ?>" method="post" class="form-control-search">

                    <?php 
                        }
                        else{
                    ?>
        <form action="postsearch_index.php" method="post" class="form-control-search">

                    <?php 
                        }
                    ?>
            <div class="form-control-search-left">
                <div class="form-control-search-left-top">
                    <input type="search" id="myInput" onkeyup="myFunction()"  class="txt-search" placeholder="ค้นหาจากชื่อบัณฑิตนิพนธ์ หรือ ชื่อนักศึกษา" />
                    <i class="fas fa-search txt-i-search"></i>
                </div>
                <div class="form-control-search-left-bottom">
                    <select required name="status"  class="sel sel-filter">
                        <option value="">--- สถานะบัณฑิตนิพนธ์ ---</option>
                        <option value="1">สถานะผ่านหัวข้อบัณฑิตนิพนธ์</option>
                        <option value="2">สถานะผ่านก้าวหน้าบัณฑิตนิพนธ์</option>
                        <option value="3">สถานะผ่านป้องกันบัณฑิตนิพนธ์</option>
                        <option value="4">สถานะผ่านบัณฑิตนิพนธ์สมบูรณ์</option>
                    </select>
                    <select required name="personal"  class="sel sel-filter">
                        <option  value="">--- อาจารย์ที่ปรึกษา ---</option>
                        <?php 
                        $stmt = $pdo->query("select * from personal  ");
                        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                        ?>
                            <option value="<?php echo $row['personal_id'] ; ?>"><?php echo $row['tname'] ; ?><?php echo $row['fname'] ; ?> <?php echo $row['lname'] ; ?></option>
                        <?php 
                        }
                        ?>
                       
                    </select>
                </div>
            </div>
            <div class="form-control-search-right">
                <button class="btn btn-search">ค้นหา</button>
            </div>
        </form>

        <!-- table -->
        <div class="table-scroll">
            <table class="table table-research" id="myTable">
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
    $count  = 1 ;
    $stmt = $pdo->query("select * from research where personal_main = ".$_POST['personal']." or  personal_sup = ".$_POST['personal']."    ");
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        if($row['status'.$_POST['status']]==2){
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
                            <p class="p-td-center"><?php echo $row['update_up'] ; ?></p>
                        </td>
                        <td>
                    <?php 
                        if(isset($_REQUEST['student_id'])){
                    ?>
                        <a href="researchDetail.php?student_id=<?php echo $_REQUEST['student_id'] ; ?>&research_id=<?php echo $row['research_id'] ; ?>"  class="btn btn-primary">เพิ่มเติม</a>
                    <?php 
                        }
                        else if(isset($_REQUEST['personal_id'])){
                    ?>
                        <a href="researchDetail.php?personal_id=<?php echo $_REQUEST['personal_id'] ; ?>&research_id=<?php echo $row['research_id'] ; ?>"  class="btn btn-primary">เพิ่มเติม</a>
                    <?php 
                        }
                        else{
                    ?>
                        <a href="researchDetail.php?research_id=<?php echo $row['research_id'] ; ?>"  class="btn btn-primary">เพิ่มเติม</a>
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