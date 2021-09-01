<?php include('./session.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขเอกสารนักศึกษา</title>
    <?php include('root.php'); ?>
    <?php include('import.php'); ?>

</head>
<body>
<?php include('navbar.php'); ?>

<?php 
    $stmt = $pdo->query("select * from file_support where support_id =".$_REQUEST['support_id']." ");
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    ?>

    <form action="postfile_edit.php" method="post" class="main" enctype="multipart/form-data">
        <div class="btn btn-hamburger">
            <i class="fas fa-bars"></i>
        </div>
        
        <div class="sidebar">
            <?php include('sidebar.php'); ?>
        </div>
        <div class="dashboard">
            <h2 class="dashboard-title">แก้ไขเอกสารนักศึกษา</h2>
            <div class="form-control">
                <p>ชื่อไฟล์เอกสาร</p>
                <input type="hidden" name="support_id"  value="<?php echo $row['support_id']; ?>"  class="txt-input" placeholder="กรอกชื่อไฟล์เอกสาร">
                <input type="text" name="title"  value="<?php echo $row['title']; ?>"  class="txt-input" placeholder="กรอกชื่อไฟล์เอกสาร">
            </div>

            <div class="form-upload">
                <label for="file-upload-1">อัพโหลดไฟล์
                <input type="file" name="name_file" id="file-upload-1" class="file-upload" accept=".pdf">
                </label>
                <p id="filename-1" class="filename"><?php echo $row['address_file']; ?></p>
            </div>

            <div class="btn-control mt-50">
                <button class="btn btn-success"><i class="fas fa-check-circle"></i>บันทึก</button>
                <a href="file_manage.php" class="btn btn-danger"><i class="fas fa-times-circle"></i>ยกเลิก</a>
            </div>

        </div>
    </form>
    <?php 
    }
    ?>

</body>
</html>