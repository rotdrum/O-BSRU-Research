<?php include('./session.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iframe คืออะไร?</title>

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
            <h2 class="dashboard-title">iframe คืออะไร?</h2>

            <h4 class="title-main">1.ค้นหาสถานที่ และเลือกเมนู "แชร์"</h4>
            <div class="map-pic">
                <img src="../img/map1.png">
            </div>

            <h4 class="title-main">2.เลือกเมนู "Embed a map"</h4>
            <div class="map-pic">
                <img src="../img/map2.png">
            </div>

            <h4 class="title-main">3.ทำการคลิกปุ่ม "Copy HTML"</h4>
            <div class="map-pic">
                <img src="../img/map3.png">
            </div>

            <div class="btn-control mt-50">
                <a href="contact.php" class="btn btn-success">ใส่ลิงค์ iframe คลิกเลย</a>
            </div>

        </div>
    </section>
</body>
</html>