<?php include('./session.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดการประเภทบัณฑิตนิพนธ์</title>
    <?php include('root.php'); ?>

    <?php include('import.php'); ?>

</head>
<body>
<?php include('navbar.php'); ?>

     <!-- status is 1 on database -->

    <section class="main">
        <div class="btn btn-hamburger">
            <i class="fas fa-bars"></i>
        </div>
        
        <div class="sidebar">
            <?php include('sidebar.php'); ?>
        </div>
        <div class="dashboard">
            <div class="moretype_title">
                <h2 class="dashboard-title">จัดการประเภทบัณฑิตนิพนธ์</h2>
                <a href="more_type_add.php" class="btn btn-addtype">
                    เพิ่มประเภท
                </a>
            </div>

            <!-- table -->
            <div class="table-scroll">
                <table class="table table-research" >
                    <thead>
                        <tr>
                            <th class="w-50">ลำดับ</th>
                            <th class="w-300">ประเภทบัณฑิตนิพนธ์</th>
                            <th class="w-100">จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
    $count = 1 ;
    $stmt = $pdo->query("select * from selection where type_select = 1 ");
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            ?>
                        <tr>
                            <td>
                                <p class="p-td-center"><?php echo $count  ; ?></p>
                            </td>
                            <td>
                                <p><?php echo $row['data_select']  ; ?></p>
                            </td>
                            
                            <td class="btn-td-control">
                                <a href="more_edit.php?selection_id=<?php echo $row['selection_id']  ; ?>&type_select=<?php echo $row['type_select']  ; ?>" class="btn btn-warning">แก้ไข</a>
                                <a href="postmore_delete.php?selection_id=<?php echo $row['selection_id']  ; ?>&type_select=<?php echo $row['type_select']  ; ?>" class="btn btn-danger">ลบ</a>
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