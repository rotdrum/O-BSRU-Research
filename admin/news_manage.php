<?php include('./session.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดการข่าวประชาสัมพันธ์</title>
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
            <h2 class="dashboard-title">จัดการข่าวประชาสัมพันธ์</h2>

            <!-- table -->
            <div class="table-scroll">
                <table class="table table-research" >
                    <thead>
                        <tr>
                            <th class="w-50">ลำดับ</th>
                            <th class="w-300">หัวข้อข่าว</th>
                            <th class="w-150">วันที่อัพโหลด</th>
                            <th class="w-100">จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
            
            $count  = 1 ;
    $stmt = $pdo->query("select * from news ");
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
                                <a href="news_edit.php?news_id=<?php echo $row['news_id'] ; ?>" class="btn btn-warning">แก้ไข</a>
                                <a href="postnews_delete.php?news_id=<?php echo $row['news_id'] ; ?>" class="btn btn-danger">ลบ</a>
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

  
</body>
</html>