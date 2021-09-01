<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดการบัณฑิตนิพนธ์</title>

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
            <h2 class="dashboard-title">จัดการบัณฑิตนิพนธ์</h2>

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
                        <th class="w-150">อัพเดทล่าสุด</th>
                        <th class="w-200">รายละเอียด</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
      $count = 1 ;
    $stmt = $pdo->query("select * from research  ");
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        if($row['status1'] == 1){
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
                            <p class="color-danger p-td-center">
                                <i class="fas fa-circle"></i> รอการอนุมัติหัวข้อบัณฑิตนิพนธ์
                            </p>
                        </td>
                        <td>
                            <p class="p-td-center"><?php echo $row['update_up'] ; ?></p>
                        </td>
                        <td>
                        <a target="_blank"  href="../research/<?php echo $row['research_id'] ; ?>/<?php echo $row['file1'] ; ?>" class="btn btn-danger">PDF</a>

                            <a href="research_approveDetail.php?research_id=<?php echo $row['research_id'] ; ?>&file=1" class="btn btn-primary">ดูรายละเอียด</a>
                        </td>
                    </tr>
                    <?php 
                $count++;
          }
          if($row['status2'] == 1){
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
                            <p class="color-danger p-td-center">
                                <i class="fas fa-circle"></i> รอการอนุมัติก้าวหน้าบัณฑิตนิพนธ์
                            </p>
                        </td>
                        <td>
                            <p class="p-td-center"><?php echo $row['update_up'] ; ?></p>
                        </td>
                        <td>
                        <a target="_blank"  href="../research/<?php echo $row['research_id'] ; ?>/<?php echo $row['file2'] ; ?>" class="btn btn-danger">PDF</a>

                            <a href="research_approveDetail.php?research_id=<?php echo $row['research_id'] ; ?>&file=2" class="btn btn-primary">ดูรายละเอียด</a>
                        </td>
                    </tr>
            <?php 
                $count++;
          }
          if($row['status3'] == 1){
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
                            <p class="color-danger p-td-center">
                                <i class="fas fa-circle"></i> รอการอนุมัติป้องกันบัณฑิตนิพนธ์
                            </p>
                        </td>
                        <td>
                            <p class="p-td-center"><?php echo $row['update_up'] ; ?></p>
                        </td>
                        <td>
                        <a target="_blank"  href="../research/<?php echo $row['research_id'] ; ?>/<?php echo $row['file3'] ; ?>" class="btn btn-danger">PDF</a>

                            <a href="research_approveDetail.php?research_id=<?php echo $row['research_id'] ; ?>&file=3" class="btn btn-primary">ดูรายละเอียด</a>
                        </td>
                    </tr>
            <?php 
                $count++;
          }
          if($row['status4'] == 1){
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
                            <p class="color-danger p-td-center">
                                <i class="fas fa-circle"></i> รอการอนุมัติบัณฑิตนิพนธ์สมบูรณ์
                            </p>
                        </td>
                        <td>
                            <p class="p-td-center"><?php echo $row['update_up'] ; ?></p>
                        </td>
                        <td>
                            <a target="_blank"  href="../research/<?php echo $row['research_id'] ; ?>/<?php echo $row['file4'] ; ?>" class="btn btn-danger">PDF</a>
                            <a href="research_approveDetail.php?research_id=<?php echo $row['research_id'] ; ?>&file=4" class="btn btn-primary">ดูรายละเอียด</a>
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

        </div>
    </section>
</body>
</html>