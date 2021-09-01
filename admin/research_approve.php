<?php include('./session.php'); ?>

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

<?php include('navbar.php'); ?>
    

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

    <?php 
    $flag = 0 ;
    $stmt = $pdo->query("select * from research where status1 = 1 ");
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){   
     $flag = 1 ;    
    }

    $stmt = $pdo->query("select * from research where status2 = 1 ");
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){   
     $flag = 1 ;    
    }

    $stmt = $pdo->query("select * from research where status3 = 1 ");
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){   
     $flag = 1 ;    
    }

    $stmt = $pdo->query("select * from research where status4 = 1 ");
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){   
     $flag = 1 ;    
    }
    ?>

    
<?php 
    if($flag == 0){
?>
<p style="width: 100%; text-align: center;">ไม่มีบัณฑิตนิพนธ์รอการอนุมัติ</p>
<?php 
    } else {
?>
    <div class="table-scroll">
            <table class="table table-research">
                <thead>
                    <tr>
                        <th>ลำดับ</th>
                        <th class="w-300">ชื่อบัณฑิตนิพนธ์</th>
                        <th class="w-200">นักศึกษา</th>
                        <th>ปีการศึกษา</th>
                        <th class="w-150">สถานะ</th>
                        <th class="w-250">อาจารย์ที่ปรึกษา</th>
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
                            <a href="research_approveDetail.php?research_id=<?php echo $row['research_id'] ; ?>&file=1" style="color: #3498db;">
                            <?php echo $row['name_th'] ; ?>
                            </a>
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
                        <?php 
                        $stmt2 = $pdo->query("select * from personal where personal_id = ".$row['personal_main']." ");
                        while($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
                        ?>
                            <p><?php echo $row2['tname'] ; ?><?php echo $row2['fname'] ; ?> <?php echo $row2['lname'] ; ?></p>
                        <?php 
                        }
                        ?>
                        <?php 
                        $stmt2 = $pdo->query("select * from personal where personal_id = ".$row['personal_sup']." ");
                        while($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
                        ?>
                            <p><?php echo $row2['tname'] ; ?><?php echo $row2['fname'] ; ?> <?php echo $row2['lname'] ; ?></p>
                        <?php 
                        }
                        ?>

                        </td>
                        <td>
                            <div style="display: flex;">
                                <a href="research_edit.php?research_id=<?php echo $row['research_id'] ; ?>" class="btn btn-warning">แก้ไข</a>
                                <a href="postresearch_notapprove.php?research_id=<?php echo $row['research_id']  ; ?>&file=1" class="btn btn-danger">ลบ</a>
                            </div>
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
                            <a href="research_approveDetail.php?research_id=<?php echo $row['research_id'] ; ?>&file=2" style="color: #3498db;">
                            <?php echo $row['name_th'] ; ?>
                            </a>
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
                        <?php 
                        $stmt2 = $pdo->query("select * from personal where personal_id = ".$row['personal_main']." ");
                        while($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
                        ?>
                            <p><?php echo $row2['tname'] ; ?><?php echo $row2['fname'] ; ?> <?php echo $row2['lname'] ; ?></p>
                        <?php 
                        }
                        ?>
                        <?php 
                        $stmt2 = $pdo->query("select * from personal where personal_id = ".$row['personal_sup']." ");
                        while($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
                        ?>
                            <p><?php echo $row2['tname'] ; ?><?php echo $row2['fname'] ; ?> <?php echo $row2['lname'] ; ?></p>
                        <?php 
                        }
                        ?>

                        </td>
                        <td>
                            <div style="display: flex;">
                                <a href="research_edit.php?research_id=<?php echo $row['research_id'] ; ?>" class="btn btn-warning">แก้ไข</a>
                                <a href="postresearch_notapprove.php?research_id=<?php echo $row['research_id']  ; ?>&file=2" class="btn btn-danger">ลบ</a>
                            </div>
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
                            <a href="research_approveDetail.php?research_id=<?php echo $row['research_id'] ; ?>&file=3" style="color: #3498db;">
                            <?php echo $row['name_th'] ; ?>
                            </a>
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
                        <?php 
                        $stmt2 = $pdo->query("select * from personal where personal_id = ".$row['personal_main']." ");
                        while($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
                        ?>
                            <p><?php echo $row2['tname'] ; ?><?php echo $row2['fname'] ; ?> <?php echo $row2['lname'] ; ?></p>
                        <?php 
                        }
                        ?>
                        <?php 
                        $stmt2 = $pdo->query("select * from personal where personal_id = ".$row['personal_sup']." ");
                        while($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
                        ?>
                            <p><?php echo $row2['tname'] ; ?><?php echo $row2['fname'] ; ?> <?php echo $row2['lname'] ; ?></p>
                        <?php 
                        }
                        ?>

                        </td>
                        <td>
                            <div style="display: flex;">
                                <a href="research_edit.php?research_id=<?php echo $row['research_id'] ; ?>" class="btn btn-warning">แก้ไข</a>
                                <a href="postresearch_notapprove.php?research_id=<?php echo $row['research_id']  ; ?>&file=2" class="btn btn-danger">ลบ</a>
                            </div>
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
                            <a href="research_approveDetail.php?research_id=<?php echo $row['research_id'] ; ?>&file=4" style="color: #3498db;">
                            <?php echo $row['name_th'] ; ?>
                            </a>
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
                        <?php 
                        $stmt2 = $pdo->query("select * from personal where personal_id = ".$row['personal_main']." ");
                        while($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
                        ?>
                            <p><?php echo $row2['tname'] ; ?><?php echo $row2['fname'] ; ?> <?php echo $row2['lname'] ; ?></p>
                        <?php 
                        }
                        ?>
                        <?php 
                        $stmt2 = $pdo->query("select * from personal where personal_id = ".$row['personal_sup']." ");
                        while($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
                        ?>
                            <p><?php echo $row2['tname'] ; ?><?php echo $row2['fname'] ; ?> <?php echo $row2['lname'] ; ?></p>
                        <?php 
                        }
                        ?>

                        </td>
                        <td>
                            <div style="display: flex;">
                                <a href="research_edit.php?research_id=<?php echo $row['research_id'] ; ?>" class="btn btn-warning">แก้ไข</a>
                                <a href="postresearch_notapprove.php?research_id=<?php echo $row['research_id']  ; ?>&file=4" class="btn btn-danger">ลบ</a>
                            </div>
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
</html>