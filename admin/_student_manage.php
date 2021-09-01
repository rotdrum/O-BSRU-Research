<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
            <h2 class="dashboard-title">จัดการรายชื่อนักศึกษา</h2>

            <!-- search & filter -->
            <div class="form-control-search">
                <div class="form-control-search-left">
                    <div class="form-control-search-left-top">
                        <input id="myInput" onkeyup="myFunction()"  type="search" class="txt-search" placeholder="ค้นหารหัสนักศึกษา หรือ ชื่อ-นามสกุล" />
                        <i class="fas fa-search txt-i-search"></i>
                    </div>
                </div>
                <!--
                <div class="form-control-search-right">
                    <button class="btn btn-search">ค้นหา</button>
                </div>
                -->
            </div>

            <!-- table -->
            <div class="table-scroll">
                <table class="table table-research" id="myTable">
                    <thead>
                        <tr>
                            <th class="w-50">ลำดับ</th>
                            <th class="w-150">รหัสนักศึกษา</th>
                            <th class="w-300">ชื่อ-สกุล</th>
                            <th class="w-150">ชั้นปี</th>
                            <th class="w-100">จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
             $count = 1 ;
    $stmt = $pdo->query("select * from student ");
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

   
    ?>
                        <tr>
                            <td>
                                <p class="p-td-center"><?php echo $count ; ?></p>
                            </td>
                            <td>
                                <p class="p-td-center"><?php echo $row['student_card'] ; ?></p>
                            </td>
                            <td>
                                <p><?php echo $row['tname'] ; ?><?php echo $row['fname'] ; ?> <?php echo $row['lname'] ; ?></p>
                            </td>
                            <td>
                                <p class="p-td-center"><?php echo $row['class'] ; ?></p>
                            </td>
                            <td class="btn-td-control">
                                <a href="student_edit.php?student_id=<?php echo $row['student_id'] ; ?>" class="btn btn-warning">แก้ไข</a>
                                <a href="poststudent_delete.php?student_id=<?php echo $row['student_id'] ; ?>" class="btn btn-danger">ลบ</a>
                            </td>
                        </tr>
                        <?php 
                        $count++ ;
            }
            ?>
                    

                    </tbody>
                </table>
            </div>

        </div>
    </section>
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
</body>
</html>