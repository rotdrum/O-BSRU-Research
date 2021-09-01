<?php include('./session.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขสาขาวิชา</title>
    <?php include('root.php'); ?>

    <?php include('import.php'); ?>

</head>
<body>
<?php include('navbar.php'); ?>

    
    <form action="#" method="post" class="main">
        <div class="btn btn-hamburger">
            <i class="fas fa-bars"></i>
        </div>
        
        <div class="sidebar">
            <?php include('sidebar.php'); ?>
        </div>
        <div class="dashboard">
            <h2 class="dashboard-title">แก้ไขห้องสอบ</h2>

            <div class="form-control">
                <p>ห้องสอบ</p>
                <input type="text" class="txt-input" placeholder="กรอกห้องสอบ">
            </div>
            

            <div class="btn-control mt-50">
                <button class="btn btn-success"><i class="fas fa-check-circle"></i>บันทึก</button>
                <a href="more_room.php" class="btn btn-danger"><i class="fas fa-times"></i>ยกเลิก</a>
            </div>

        </div>
    </form>
    
</body>
</html>