<?php include('./session.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดการระบบ</title>
    <?php include('root.php'); ?>

    <?php include('import.php'); ?>

</head>
<body>
<?php include('navbar.php'); ?>

<?php 
    $stmt = $pdo->query("select * from selection_sup where selection_sup_id = ".$_REQUEST['selection_sup_id']." ");
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
?>
    
    <form action="postmore_edit.php" method="post" class="main">
        <div class="btn btn-hamburger">
            <i class="fas fa-bars"></i>
        </div>
        
        <div class="sidebar">
            <?php include('sidebar.php'); ?>
        </div>
        <div class="dashboard">
            <h2 class="dashboard-title">แก้ไขสาขาวิชา
</h2>

            <div class="form-control">
                <p>คณะ</p>
                <select id="select_fac" class="txt-input">
                <?php 
    $stmt2 = $pdo->query("select * from selection where selection_id = ".$row['selection_id']." ");
    while($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
?>
                    <option value="<?php echo $row2['selection_id'] ; ?>"><?php echo $row2['data_select'] ; ?></option>
<?php 
    }
?>
                </select>
            </div>

            <div class="form-control">
   
                <p>
               สาขาวิชา
                </p>
                <input required type="hidden" name="selection_sup_id" value="<?php echo $_REQUEST['selection_sup_id']; ?>">
                <input required type="text" name="data_select" class="txt-input" value="<?php echo $row['data_select']; ?>">
                <input required type="hidden" name="type_select" value="3">
            </div>


            <div class="btn-control mt-50">
                <button class="btn btn-success"><i class="fas fa-check-circle"></i>บันทึก</button>
                        <a href="more_department.php" class="btn btn-danger"><i class="fas fa-times"></i>ยกเลิก</a>
            </div>

        </div>
    </form>
    <?php 
    }
            ?>
    
</body>
</html>