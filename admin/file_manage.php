<?php include('./session.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดการเอกสารนักศึกษา</title>
    <?php include('root.php'); ?>
    <?php include('import.php'); ?>
</head>
<body>

<?php include('navbar.php'); ?>
    

    <section class="main">
        <div class="btn btn-hamburger">
            <i class="fas fa-bars"></i>
        </div>
        
        <div class="sidebar">
            <?php include('sidebar.php'); ?>
        </div>
        <div class="dashboard">
            <h2 class="dashboard-title">จัดการเอกสารนักศึกษา</h2>

            <!-- search & filter -->
            <div class="form-control-search">
                <div class="form-control-search-left">
                    <div class="form-control-search-left-top">
                        <input id="myInput" onkeyup="myFunction()"  type="search" class="txt-search" placeholder="ค้นหาเอกสารนักศึกษา" />
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
                            <th>ชื่อเอกสาร</th>
                            <th class="w-200">วันที่อัพโหลด</th>
                            <th class="w-300">จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php 
            
            $count  = 1 ;
    $stmt = $pdo->query("select * from file_support ");
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

   
    ?>
                        <tr>
                            <td>
                                <p class="p-td-center"><?php echo $count ; ?></p>
                            </td>
                            <td>
                                <p><?php echo $row['title'] ; ?></p>
                            </td>
                            <td>
                                <p><?php echo $row['create_up'] ; ?></p>
                            </td>
                            <td class="btn-td-control">
                                <a href="../file_support/<?php echo $row['support_id'] ; ?>/<?php echo $row['address_file'] ; ?>" class="btn btn-info">ดาวน์โหลด</a>
                                <a href="file_edit.php?support_id=<?php echo $row['support_id'] ; ?>" class="btn btn-warning">แก้ไข</a>
                                <a href="postfile_delete.php?support_id=<?php echo $row['support_id'] ; ?>" class="btn btn-danger">ลบ</a>
                            </td>
                        </tr>
                        <?php 
                        $count++ ;
            }
    ?>    
                        </tr>

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
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
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