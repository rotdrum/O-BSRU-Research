<?php include('./session.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มเอกสารนักศึกษา</title>

    <?php include('root.php'); ?>
    <?php include('import.php'); ?>

</head>
<body>
<?php include('navbar.php'); ?>

    

    <form action="postfile_add.php" method="post" class="main" enctype="multipart/form-data">
        <div class="btn btn-hamburger">
            <i class="fas fa-bars"></i>
        </div>
        
        <div class="sidebar">
            <?php include('sidebar.php'); ?>
        </div>
        <div class="dashboard">
            <h2 class="dashboard-title">เพิ่มเอกสารนักศึกษา</h2>
            <div class="form-control">
                <p>ชื่อไฟล์เอกสาร</p>
                <input type="text" name="title" required class="txt-input" placeholder="กรอกชื่อไฟล์เอกสาร">
                <input required type="hidden" id="date" name="create_up" value="<?php echo date("M j, Y"); ?>">
            </div>


            <div class="form-upload">
                <label for="file-upload-1">อัพโหลดไฟล์
                <input type="file" required name="name_file" id="file-upload-1" class="file-upload" accept=".pdf">
                </label>
                <p id="filename-1" class="filename">อัพโหลดไฟล์เอกสารสำหรับนักนักศึกษา (.PDF)</p>
            </div>

            <div class="btn-control mt-50">
                <button class="btn btn-success"><i class="fas fa-check-circle"></i>บันทึก</button>
                <a href="file_manage.php" class="btn btn-danger"><i class="fas fa-times-circle"></i>ยกเลิก</a>
            </div>

        </div>
    </form>
</body>
</html>