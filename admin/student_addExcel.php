<?php include('./session.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มรายชื่อด้วย Excel</title>

    <?php include('root.php'); ?>
    <?php include('import.php'); ?>

</head>
<body>
<?php include('navbar.php'); ?>

    

    <form action="poststudent_addExcel.php" method="post" class="main" enctype="multipart/form-data">
        <div class="btn btn-hamburger">
            <i class="fas fa-bars"></i>
        </div>
        
        <div class="sidebar">
            <?php include('sidebar.php'); ?>
        </div>
        <div class="dashboard">
            <h2 class="dashboard-title">เพิ่มรายชื่อด้วย Excel <a href="../student_support/examplestudent.xlsx" class="filename"> (คลิกดู! ไฟล์ตัวอย่าง)</a></h2>

            <div class="form-upload">
                <label for="file-upload-1">อัพโหลดไฟล์
                <input type="file" name="excel" id="file-upload-1" class="file-upload" accept=".xlsx, .csv, .xls">
                </label>
                </label>
                <p id="filename-1" class="filename">อัพโหลดไฟล์รายชื่อนักศึกษา (Excel)</p>
            
            </div>

            <div class="btn-control mt-50">
                <button class="btn btn-success"><i class="fas fa-check-circle"></i>บันทึก</button>
            </div>

        </div>
    </form>
</body>
</html>