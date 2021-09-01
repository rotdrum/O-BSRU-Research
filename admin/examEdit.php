<?php include('./session.php'); ?>

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
<?php include('navbar.php'); ?>

    

    <section class="main">
        <div class="btn btn-hamburger">
            <i class="fas fa-bars"></i>
        </div>
        
        <div class="sidebar">
            <?php include('sidebar.php'); ?>
        </div>
        <div class="dashboard">
            <h2 class="dashboard-title">ตัดสินผลการสอบ</h2>

             <!-- table -->
        <div class="table-scroll">
            <table class="table table-research">
                <thead>
                    <tr>
                        <th>ลำดับ</th>
                        <th class="w-300">ชื่อบัณฑิตนิพนธ์</th>
                        <th class="w-200">นักศึกษา</th>
                        <th>ปีการศึกษา</th>
                        <th class="w-150">สถานะสอบ</th>
                        <th class="w-350" colspan="3" >เลือกผลการสอบ</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
    $count = 1 ;
    $stmt = $pdo->query("select * from exam where status_exam = 0  ");
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            ?>
                    <tr>
                        <td>
                            <p class="p-td-center"><?php echo $count ; ?></p>
                        </td>
                        <?php 
          $stmt2 = $pdo->query("select * from research where research_id = ".$row['research_id']."  ");
          while($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
            ?>
                        <td>
                            <p>
                            <?php echo $row2['name_th'] ; ?>
                            </p>
                        </td>
                        <td>
                            <p><?php echo $row2['student_one'] ; ?></p>
                            <p><?php echo $row2['student_two'] ; ?></p>
                        </td>
                        <td>
                            <p class="p-td-center"><?php echo $row2['year'] ; ?></p>
                        </td>
                        <?php 
          }
            ?>
                        <td>
                        <?php 
                            if($row['status_file'] == 4){
                        ?>
                            <p class="p-td-center">บัณฑิตนิพนธ์สมบูรณ์</p>
                        <?php 
                            }
                            else if ($row['status_file'] == 3){
                        ?>
                            <p class="p-td-center">ป้องกันบัณฑิตนิพนธ์</p>
                          
                        <?php 
                            }
                            else if ($row['status_file'] == 2){
                        ?>
                            <p class="p-td-center">ก้าวหน้าบัณฑิตนิพนธ์</p>
                     
                        <?php 
                            }
                            else if ($row['status_file'] == 1){
                        ?>
                            <p class="p-td-center">หัวข้อบัณฑิตนิพนธ์</p>
                        
                        <?php 
                            }
                        ?>
                        </td>
                        <td  class="w-100">
                           <a href="postexamEdit.php?exam_id=<?php echo $row['exam_id'] ; ?>&status_exam=1" class="btn btn-success ">ผ่าน</a>
                        </td>
                        <td  class="w-200">
                           <a href="postexamEdit.php?exam_id=<?php echo $row['exam_id'] ; ?>&status_exam=2" class="btn btn-warning ">ผ่านมีเงื่อนไข</a>
                        </td>
                        <td class="w-150">
                           <a href="postexamEdit.php?exam_id=<?php echo $row['exam_id'] ; ?>&status_exam=3" class="btn btn-danger ">ไม่ผ่าน</a>
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
</body>
</html>