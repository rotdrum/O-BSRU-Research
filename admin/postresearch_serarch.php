<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ค้นหาบัณฑิตนิพนธ์</title>

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
            <h2 class="dashboard-title">ค้นหาบัณฑิตนิพนธ์แบบละเอียด</h2>
        
    <?php 
    $flag = 0 ;
    $stmt = $pdo->query("select * from research where name_th = '".$_GET['name_th']."' and  ".$_GET['status']." = 2  and  student_one = '".$_GET['student_one']."'  and  personal_main = '".$_GET['personal_main']."'  and  year = '".$_GET['year']."' ");
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){   
     $flag = 1 ;    
    }
    ?>

    
<?php 
    if($flag == 0){
?>
<p style="width: 100%; text-align: center;">ไม่มีบัณฑิตนิพนธ์</p>
<?php 
    } else {
?>


            <div class="table-scroll">
                <table class="table table-research" id="myTable">
                    <thead>
                        <tr>
                            <th class="w-50">ลำดับ</th>
                            <th class="w-300">ชื่อบัณฑิตนิพนธ์</th>
                            <th class="w-300">นักศึกษา</th>
                            <th class="w-300">อาจารย์</th>
                            <th class="w-100">ปีการศึกษา</th>
                            <th class="w-300">สถานะ</th>
                        </tr>
                    </thead>
                    <tbody>
    <?php 
    $count  = 1 ;
    $stmt = $pdo->query("select * from research where name_th = '".$_GET['name_th']."' and  ".$_GET['status']." = 2  and  student_one = '".$_GET['student_one']."'  and  personal_main = '".$_GET['personal_main']."'  and  year = '".$_GET['year']."' ");
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        if(($row['status1']==2) || ($row['status2']==2) || ($row['status3']==2) || ($row['status4']==2)  ){
        ?>
                   <tr>
                        <td>
                            <p class="p-td-center"><?php echo $count ; ?></p>
                        </td>
                        <td>
                        <a href="research_searchDetail.php?research_id=<?php echo $row['research_id'] ; ?>" style="color: #3498db; text-decoration: underline;">
                            <?php echo $row['name_th'] ; ?>
                            </a>
                        </td>
                        <td>
                            <p><?php echo $row['student_one'] ; ?></p>
                            <p><?php echo $row['student_two'] ; ?></p>
                        </td>
                        <td>
                        <?php 
    $stmt2 = $pdo->query("select * from personal where personal_id = ".$row['personal_main']."   ");
    while($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
        ?>
                            <p><?php echo $row2['tname'] ; ?><?php echo $row2['fname'] ; ?> <?php echo $row2['lname'] ; ?></p>
                            <?php 
    }
        ?>

<?php 
    $stmt2 = $pdo->query("select * from personal where personal_id = ".$row['personal_sup']."   ");
    while($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
        ?>
                            <p><?php echo $row2['tname'] ; ?><?php echo $row2['fname'] ; ?> <?php echo $row2['lname'] ; ?></p>
                            <?php 
    }
        ?>
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
</body>
<script>
var status_search = 'ชื่องานวิจัย';
    $("#sel_filter_status").change(function() {
        status_search = $("#sel_filter_status").val();
        console.log(status_search);
    });

    function search_system() {
        if(status_search == "ชื่องานวิจัย") {
            search_research();
        }
        else if(status_search == "นักศึกษา") {
           search_student();
        }
        else if(status_search == "ปีการศึกษา") {
          search_year();
        }
        else if(status_search == "อาจารย์ที่ปรึกษา") {
          search_personal();
        }
    }

    var condition = true;
    function search_condition() {
        condition = !condition;
        if(condition) {
            $("#search_main_control").slideDown();
            $("#search_condition_control").slideUp();
            $("#text_condition").text("ค้นหาแบบละเอียด");
        }
        else {
            $("#search_main_control").slideUp();
            $("#search_condition_control").slideDown();
            $("#text_condition").text("ค้นหาแบบปกติ");
        }
        
    }

    function search_research() {
       // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput_new");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[2];
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

    function search_student() {
       // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput_new");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[2];
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

    function search_personal() {
       // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput_new");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[3];
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

    function search_year() {
       // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput_new");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[4];
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
</html>